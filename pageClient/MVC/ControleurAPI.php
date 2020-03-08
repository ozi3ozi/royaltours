<?php
	require_once("../database/modele.inc.php");
	$tabRes=array();
	
		
	//Lister les circuits, etapes ou jours
	function listerBD(){
		global $tabRes;
		$nomTable=$_POST['nomTableALister'];
		$condition=$_POST['condition'];
		$tabRes['action']="lister".$nomTable;
		$requete="SELECT * FROM ".$nomTable." ".$condition;
		$tabRes["code"] = "OK";
		try{
			 $unModele=new royaltoursModele($requete,array());
			 $stmt=$unModele->executer();
			 $tabRes['liste']=array();
			 while($ligne=$stmt->fetch(PDO::FETCH_OBJ)){
			    $tabRes['liste'][]=$ligne;
			}
		}catch(Exception $e){
			debug_to_console($e->getMessage());
			$tabRes["code"] = "NOK";
		}finally{
			unset($unModele);
		} 
	}
	
	//Lister les images des circuits ou etapes ou jour, 
	//hebergements, restaurants, ou activites
	function listerDetails(){
		global $tabRes;
		$nomTable=$_POST['nomTableALister'];
		$idTable='';
		//Pour pouvoir afficher les images du circuit car nom id dans BD est idImage
		if (strpos($nomTable, 'circuit') !== false)
			$idTable = str_replace('circuit', '', "id".ucfirst($nomTable));
		//Pour pouvoir afficher les images de l'etape 
		else if (strpos($nomTable, 'etape') !== false)
			$idTable = str_replace('etape', '', "id".ucfirst($nomTable));
		//Pour pouvoir afficher les images du jour 
		else if (strpos($nomTable, 'jour') !== false)
			$idTable = str_replace('jour', '', "id".ucfirst($nomTable));
		else $idTable = "id".ucfirst($nomTable);
		
		$condition=$_POST['condition'];
		$tabRes['action']="lister".$nomTable;
		$requete="SELECT * FROM ".$nomTable. 
			" INNER JOIN ligne".$nomTable.
			" ON ".$nomTable.".".$idTable." = ligne".$nomTable.".".$idTable
			.$condition;
		try{
			 $unModele=new royaltoursModele($requete,array());
			 $stmt=$unModele->executer();
			 $tabRes['liste']=array();
			 while($ligne=$stmt->fetch(PDO::FETCH_OBJ)){
			    $tabRes['liste'][]=$ligne;
			}
		}catch(Exception $e){
			debug_to_console($e->getMessage());
		}finally{
			unset($unModele);
		} 
	}
	
	//supprimer circuit, activite, jour, hebergement, restaurant, activite, ou image
	function supprimerElem(){
		global $tabRes;
		$nomTable=$_POST['nomTable'];
		$idASupprimer=$_POST['idASupprimer'];
		$conditionSuppl=$_POST['conditionSuppl'];
		$tabRes['action']="supprimer";
		$nomColonneId = "id".ucfirst($nomTable);
		
		if($nomTable == 'imagejour' || $nomTable == 'imageetape' || $nomTable == 'imagecircuit')
			$nomColonneId = 'idImage';
		else if($nomTable == 'ligneactivite' || $nomTable == 'lignerestaurant'
			|| $nomTable == 'lignehebergement' || $nomTable == 'ligneimagejour')
			$nomColonneId = 'idJour';
		else if($nomTable == 'ligneimageetape')
			$nomColonneId = 'idEtape';
		else if($nomTable == 'ligneimagecircuit')
			$nomColonneId = 'idCircuit';
		else if($nomTable == 'lignecircuit')
			$nomColonneId = 'idPanier';
		try{
			$unModele=new royaltoursModele();
			$requete="DELETE FROM ".$nomTable." WHERE ".$nomColonneId." = ? ".$conditionSuppl;
			$unModele=new royaltoursModele($requete,
				array(intval($idASupprimer)));
			$stmt=$unModele->executer();
			$tabRes['msg']= "element bien supprimer";
			
		}catch(Exception $e){
			debug_to_console($e->getMessage());
		}finally{
			unset($unModele);
		} 
	}
	
	
	
	//******************************************************
	//Contr�leur
	$action=$_POST['action'];
	switch($action){
		case "lister" :
			listerBD();
			break;
		case "listerDetailsJour" :
			listerDetails();
			break;
		case "supprimer" :
			supprimerElem();
			break;
	}
    echo json_encode($tabRes);
	
	function debug_to_console($data) {
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
	}
?>