<?php
	require_once("../database/modele.inc.php");
	$tabRes=array();
	
	//Inscrire client
	function inscrireClt(){
		global $tabRes;	
		$nom=$_POST['nom'];
		$prenom=$_POST['prenom'];
		$email=$_POST['email'];
		$mdp=$_POST['mdp'];
		$mdpVerif=$_POST['mdpVerif'];
		$ddn=$_POST['ddn'];
		$sexe=$_POST['sexe'];
		$idAlertErr=$_POST['idAlertErr'];
		$erreur="";
		try{
			$unModele=new royaltoursModele();
			//$pochete=$unModele->verserFichier("pochettes", "pochette", "avatar.jpg",$titre);
			$q="SELECT * FROM inscrit WHERE email=?";
			$tabRes['idAlertErr']=$idAlertErr;
			$unModele=new royaltoursModele($q,array($email));
			$stmt=$unModele->executer();
			if($mdp != $mdpVerif){
				$tabRes['action']="erreur";
				$erreur = " Les mots de passe ne sont pas identiques<br>";
			}
			if($ligne=$stmt->fetch(PDO::FETCH_OBJ)){
				$tabRes['action']="erreur";
				$erreur .="Cet email est deja utilise par une autre personne.";
			}
			if($erreur==""){
				$mdp=password_hash($mdp,PASSWORD_DEFAULT);
				$requete="INSERT INTO inscrit VALUES(0,?,?,?,?,?,?)";
				$unModele=new royaltoursModele($requete,array($nom,$prenom,$ddn,$sexe,$email,$mdp));
				$stmt=$unModele->executer();
				$tabRes['action']="succes";
			}
			$tabRes['msg']= $erreur;
		}catch(Exception $e){
			debug_to_console($e->getMessage());
		}finally{
			unset($unModele);
		}
	}
	
	function veriferConnexion(){
		global $tabRes;	
		$email=$_POST['email'];
		$mdp=$_POST['mdp'];
		$idAlertErr=$_POST['idAlertErr'];
		try{
			$unModele=new royaltoursModele();
			//$pochete=$unModele->verserFichier("pochettes", "pochette", "avatar.jpg",$titre);
			$tabRes['idAlertErr']=$idAlertErr;
			$q="SELECT * FROM inscrit WHERE email=?";
			$unModele=new royaltoursModele($q,array($email));
			$stmt=$unModele->executer();
			$tabRes['idAlertErr']=$idAlertErr;
			if($ligne=$stmt->fetch(PDO::FETCH_OBJ)){
				$tabRes['msg']=$ligne->motPasse." passe";
				if(password_verify($mdp,$ligne->motPasse)){
					$tabRes['action']="succes";
					$tabRes['msg']="passe correct";
					$tabRes['nomClt']=$ligne->nomInscrit;
					$tabRes['idClt']=$ligne->idInscrit;
				}
				else{
				$tabRes['action']="erreur";
				$tabRes['msg']="Le courriel ou le mot de passe est incorrect";
				}
			}
			else{
				$tabRes['action']="erreur";
				$tabRes['msg']="Le courriel ou le mot de passe est incorrect";
			}
		}catch(Exception $e){
			debug_to_console($e->getMessage());
		}finally{
			unset($unModele);
		}
	}
	
	//Verification de la connexion
	function verifInfoConnex(){
		global $tabRes;	
		$tabRes['action']="connexion";
		$numEmp=$_POST['numEmp'];
		$mdp=$_POST['mdp'];
		$tabRes['msg']=false;
		//debug_to_console($tabRes);
		try{
			$unModele=new royaltoursModele();
			$requete="SELECT * FROM employe WHERE 
				numEmploye LIKE ". $numEmp." AND motPasseEmploye LIKE ".$mdp;
			$unModele=new royaltoursModele($requete,array());
			$stmt=$unModele->executer();
			$tabRes['infoEmp'] = array();
			while($ligne=$stmt->fetch(PDO::FETCH_OBJ)){
				$tabRes['msg']=	true;
				$tabRes['infoEmp'][] = $ligne;
			}
		}catch(Exception $e){
		}finally{
			unset($unModele);
		}
	}
		
	//get id d'une table donnee
	function getTableId($nomTbale,$nomColonneId,$valeurAChercher,$nomColonneDeRecherche)
	{					
		global $tabRes;
		try{
			$unModele=new royaltoursModele();
			$requete="SELECT ".$nomColonneId." FROM ".$nomTbale." 
			WHERE ".$nomColonneDeRecherche." LIKE '".$valeurAChercher."'";
			$unModele=new royaltoursModele($requete,array());
			$stmt=$unModele->executer();
			$tableId = array();
			while($ligne=$stmt->fetch(PDO::FETCH_OBJ)){
				$tabRes['msg']=	true;
				$tableId[] = $ligne;
			}
			return intval($tableId[0]->$nomColonneId);
		}catch(Exception $e){
			debug_to_console($e->getMessage());
		}finally{
			unset($unModele);
		}
	}
	
	//Lister les circuits, etapes ou jours
	function listerBD(){
		global $tabRes;
		$nomTable=$_POST['nomTableALister'];
		$condition=$_POST['condition'];
		$tabRes['action']="lister".$nomTable;
		$requete="SELECT * FROM ".$nomTable." ".$condition;
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


	//Liste les circuit qui sont dans le panier
    function afficherCheckout(){
        global $tabRes;
        $nomTable=$_POST['nomTableALister'];
        $idClt=$_POST['idClt'];
        $tabRes['action']="afficherCheckout";
        $requete="SELECT * FROM circuit INNER JOIN panier 
				ON circuit.idCircuit = panier.idCircuit 
				WHERE idInscrit = ".$idClt;
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
	//Lister 
	function listerPanier(){
		global $tabRes;
		$nomTable=$_POST['nomTableALister'];
		$idClt=$_POST['idClt'];
		$tabRes['action']="listePanier";
		$requete="SELECT * FROM circuit INNER JOIN panier 
				ON circuit.idCircuit = panier.idCircuit 
				WHERE idInscrit = ".$idClt;
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
	
	//Remplir Select se trouvant dans page modale id=trancheModal 
	function listerTranche(){
		global $tabRes;
		$tabRes['action']="listerTranchePmt";
		$requete="SELECT * FROM tranchePmt";
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
	
	//oter du panier
	//Lister les circuits, etapes ou jours
	function oterPanier(){
		global $tabRes;
		$idCircuit=$_POST['idCircuit'];
		$idClt=$_POST['idClt'];
		$tabRes['action']="oterPanier";
		$requete="DELETE FROM panier WHERE idCircuit = ".$idCircuit.
			" AND idInscrit =".$idClt;
		try{
			 $unModele=new royaltoursModele($requete,array());
			 $stmt=$unModele->executer();
			 $tabRes['msg']= "element bien supprimer";
			
		}catch(Exception $e){
			debug_to_console($e->getMessage());
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
	
	function ajouterAuPanier(){
		global $tabRes;
		$idClt=intval($_POST['idClt']);
		$idCircuit=intval($_POST['idCircuit']);
		try{
			$unModele=new royaltoursModele();
			$requete="INSERT INTO `panier` (`idPanier`, `idInscrit`, `idCircuit`) 
				VALUES (NULL,?,?)";
			$unModele=new royaltoursModele($requete,
				array($idClt,$idCircuit));
			$stmt=$unModele->executer();
			$tabRes['action']="ajoutPanier";
			$tabRes['msg']= "element ajoute au panier";
			
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
        case "afficherCheckout":
            afficherCheckout();
            break;
		case "listerSelect" :
			remplirSelectDpt();
			break;
		case "inscriptionClt" :
			inscrireClt();
			break;
		case "connexion" :
			veriferConnexion();
			break;
		case "lister" :
			listerBD();
			break;
		case "listerPanier" :
			listerPanier();
			break;
		case "listerDetailsJour" :
			listerDetails();
			break;
		case "ajoutPanier" :
			ajouterAuPanier();
			break;
		case "oterPanier" :
			oterPanier();
			break;
		case "listerTranchePmt" :
			listerTranche();
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