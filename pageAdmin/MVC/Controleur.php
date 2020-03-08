<?php
	require_once("../database/modele.inc.php");
	$tabRes=array();
	
	//Remplir select tag dans formulaire inscription
	function remplirSelectDpt(){
		global $tabRes;
		$tabRes['action']="listerSelect";
		$requete="SELECT * FROM departement";
		try{
			 $unModele=new royaltoursModele($requete,array());
			 $stmt=$unModele->executer();
			 $tabRes['listeDepartement']=array();
			 while($ligne=$stmt->fetch(PDO::FETCH_OBJ)){
			    $tabRes['listeDepartement'][]=$ligne;
			}
		}catch(Exception $e){
		}finally{
			unset($unModele);
		}
	}
	//Enregistrement d'un employe dans la BD
	function inscrireEmployes(){
		global $tabRes;	
		$nom=$_POST['nom'];
		$prenom=$_POST['prenom'];
		$numEmp=$_POST['numEmp'];
		$mdp=$_POST['mdp'];
		$mdpConf=$_POST['mdpConf'];
		$ddn=$_POST['ddn'];
		$sexe=$_POST['sexe'];
		$departement=$_POST['idDepartement'];
		$idDepartement = intval($departement[0]);
		$idAlertErr=$_POST['idAlertErr'];
		$erreur="";
		try{
			$q="SELECT * FROM employe WHERE numEmploye=?";
			$tabRes['idAlertErr']=$idAlertErr;
			$unModele=new royaltoursModele($q,array($numEmp));
			$stmt=$unModele->executer();
			if($mdp != $mdpConf){
				$tabRes['action']="erreur";
				$erreur = "Les mots de passe ne sont pas identiques<br>";
				$tabRes['msg']= $erreur;
			}
			if($ligne=$stmt->fetch(PDO::FETCH_OBJ)){
				$tabRes['action']="erreur";
				$erreur .="Ce numero d'employe est deja affecte.";
				$tabRes['msg']= $erreur;
			}
			if($erreur==""){
				$mdp=password_hash($mdp,PASSWORD_DEFAULT);
				$requete="INSERT INTO employe VALUES(0,?,?,?,?,?,?,?)";
				$unModele=new royaltoursModele($requete,array($nom,$prenom,intval($numEmp),$mdp,$ddn,$sexe,$idDepartement));
				$stmt=$unModele->executer();
				$tabRes['action']="inscription";
				$tabRes['msg']="Employe bien enregistre";
			}
			
		}catch(Exception $e){
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
		$idAlertErr=$_POST['idAlertErr'];
		$erreur="";
		try{
			$unModele=new royaltoursModele();
			$tabRes['idAlertErr']=$idAlertErr;
			$q="SELECT * FROM employe WHERE numEmploye=?";
			$unModele=new royaltoursModele($q,array($numEmp));
			$stmt=$unModele->executer();
			$tabRes['idAlertErr']=$idAlertErr;
			if($ligne=$stmt->fetch(PDO::FETCH_OBJ)){
				$tabRes['msg']=$ligne->motPasseEmploye." passe";
				if(password_verify($mdp,$ligne->motPasseEmploye)){
					$tabRes['msg']=	true;
					$tabRes['infoEmp'][] = $ligne;
					$tabRes['action']="connexSucces";
				}
				else{
				$tabRes['action']="erreur";
				$tabRes['msg']="Le numero d'employe ou le mot de passe sont incorrect";
				}
			}
			else{
				$tabRes['action']="erreur";
				$tabRes['msg']="Le numero d'employe ou le mot de passe sont incorrect";
			}
		}catch(Exception $e){
		}finally{
			unset($unModele);
		}
	}
	
	//Appliquer le nombre de tranches de paiment permises pour un achat
	function appliquerModalitesPmt(){
		global $tabRes;	
		
		$nombreTranchesPmt= $_POST['tranchePmt'];
		//debug_to_console($tabRes);
		try{
			$unModele=new royaltoursModele();
			//$pochete=$unModele->verserFichier("pochettes", "pochette", "avatar.jpg",$titre);
			$requete="UPDATE tranchepmt SET nombreTranches = ? WHERE id=1";
			$unModele=new royaltoursModele($requete,
				array($nombreTranchesPmt));
			$stmt=$unModele->executer();
			$tabRes['action']="enregistrer";
			$tabRes['msg']=" Changement applique aux modalites de paiement.";
		}catch(Exception $e){
		}finally{
			unset($unModele);
		}
	}
	
	//Sauvegarde de l'image dans le fichiers images du site et du lien de 
	//l'image dans la BD
	function ajoutDansImgCircuitOuEtapeOuJour($table){
		global $tabRes;	
		$imgInfos= $_FILES['imgInfos'];
		$nomImg = $_POST['nomImg'];
		$tmpName = $_FILES['imgInfos']['tmp_name'];
		$destination = '../images/'.$nomImg;
		move_uploaded_file($tmpName,$destination);
		try{
			$unModele=new royaltoursModele();		
			$requete="INSERT INTO ".$table." VALUES(0,?)";
			$unModele=new royaltoursModele($requete,array($nomImg));
			$stmt=$unModele->executer();
			
			$tabRes['action'] = "ajoutImgs";
			$tabRes['idMsg'] = $table;
			$tabRes['msg']= 'Image enregistree avec succes';
		}catch(Exception $e){
			debug_to_console($e->getMessage());
		}finally{
			unset($unModele);
		}
	}
	
	//Ajout d'un circuit
	function ajoutCircuit(){
		global $tabRes;	
		$idAdmin = intval($_POST['idAdmin']);
		$nom= $_POST['nom'];
		$dateDebut=$_POST['dateDebut'];
		$duree=$_POST['duree'];
		$prix=$_POST['prix'];
		$quantite=$_POST['quantite'];
		$listLienImg= explode(',newImg', $_POST['listImgs']);
		//debug_to_console($tabRes);
		try{
			$unModele=new royaltoursModele();
			//$pochete=$unModele->verserFichier("pochettes", "pochette", "avatar.jpg",$titre);
			$requete="INSERT INTO circuit VALUES(0,?,?,?,?,?,?,?,NULL,NULL,NULL)";
			$unModele=new royaltoursModele($requete,
				array($idAdmin,$nom,$dateDebut,intval($duree),floatval($prix),
					intval($quantite),$listLienImg[0]));
			$stmt=$unModele->executer();
			$tabRes['action']="enregistrer";
			$tabRes['msg']=" Circuit bien enregistre";
			if(count($listLienImg)>0)
			{
				$idTable = getTableId('circuit','idCircuit',$nom,'nomCircuit');
				ajoutImgs('imagecircuit', $idTable, 'ligneimagecircuit');
			}
		}catch(Exception $e){
		}finally{
			unset($unModele);
		}
	}
	
	//Modification du circuit
	function modifierCircuit(){
		global $tabRes;	
		$id = intval($_POST['id']);
		$nom= $_POST['nom'];
		$dateDebut=$_POST['dateDebut'];
		$duree=$_POST['duree'];
		$prix=$_POST['prix'];
		$quantite=$_POST['quantite'];
		$listLienImg= explode(',newImg', $_POST['listImgs']);
		try{
			$unModele=new royaltoursModele();
			//$pochete=$unModele->verserFichier("pochettes", "pochette", "avatar.jpg",$titre);
			$requete="UPDATE `circuit` SET `nomCircuit` = '".$nom."', 
				`dateDebutCircuit` = '".$dateDebut."', `duree` = '".$duree."', 
				`prixCircuit` = '".$prix."', `quantiteCircuit` = '".$quantite."' 
				WHERE `circuit`.`idCircuit` = ".$id;
			$unModele=new royaltoursModele($requete,array());
			$stmt=$unModele->executer();
			$tabRes['action']="modifie";
			$tabRes['msg']=" Circuit bien modifie";
			if(count($listLienImg)>0)
			{
				ajoutImgs('imagecircuit', $id, 'ligneimagecircuit');
			}
		}catch(Exception $e){
		}finally{
			unset($unModele);
		}
	}
	
	//Publier circuit
	function publierCircuit(){
		global $tabRes;	
		$id = intval($_POST['id']);
		$txt= 1;
		
		try{
			$unModele=new royaltoursModele();
			//$pochete=$unModele->verserFichier("pochettes", "pochette", "avatar.jpg",$titre);
			$requete="UPDATE `circuit` SET `publier` = ".$txt."
					 WHERE `circuit`.`idCircuit` = ".$id;
			$unModele=new royaltoursModele($requete,array());
			$stmt=$unModele->executer();
			$tabRes['action']="modifie";
			$tabRes['msg']=" Circuit publie";
			$tabRes['id']=$id;
		}catch(Exception $e){
		}finally{
			unset($unModele);
		}
	}
	
	//Publier circuit
	function depublierCircuit(){
		global $tabRes;	
		$id = intval($_POST['id']);
		
		try{
			$unModele=new royaltoursModele();
			//$pochete=$unModele->verserFichier("pochettes", "pochette", "avatar.jpg",$titre);
			$requete="UPDATE `circuit` SET `publier` = NULL
					 WHERE `circuit`.`idCircuit` = ".$id;
			$unModele=new royaltoursModele($requete,array());
			$stmt=$unModele->executer();
			$tabRes['action']="modifie";
			$tabRes['msg']=" Circuit depublie";
			$tabRes['id']=$id;
		}catch(Exception $e){
		}finally{
			unset($unModele);
		}
	}
	
	//Ajouter promotion au circuit
	function ajoutPromoCircuit(){
		global $tabRes;	
		$id = intval($_POST['id']);
		$txPromoStr = str_replace("%","",$_POST['promoTxt']);
		$txPromo= floatval($txPromoStr);
		
		try{
			$unModele=new royaltoursModele();
			//$pochete=$unModele->verserFichier("pochettes", "pochette", "avatar.jpg",$titre);
			$requete="UPDATE `circuit` SET `tauxPromo` = ".$txPromo."
					 WHERE `circuit`.`idCircuit` = ".$id;
			$unModele=new royaltoursModele($requete,array());
			$stmt=$unModele->executer();
			$tabRes['action']="modifie";
			$tabRes['msg']=" Promotion Appliquee";
			$tabRes['id']=$id;
		}catch(Exception $e){
		}finally{
			unset($unModele);
		}
	}
	
	//Oter promotion du circuit
	function otePromoCircuit(){
		global $tabRes;	
		$id = intval($_POST['id']);
		
		try{
			$unModele=new royaltoursModele();
			//$pochete=$unModele->verserFichier("pochettes", "pochette", "avatar.jpg",$titre);
			$requete="UPDATE `circuit` SET `tauxPromo` = NULL
					 WHERE `circuit`.`idCircuit` = ".$id;
			$unModele=new royaltoursModele($requete,array());
			$stmt=$unModele->executer();
			$tabRes['action']="modifie";
			$tabRes['msg']=" Promotion enlevee";
			$tabRes['id']=$id;
		}catch(Exception $e){
		}finally{
			unset($unModele);
		}
	}
	
	//remplir formulaire modification circuits, etapes, jours, hebergement,
	//activite, ou restaurant
	function remplirFormModifier(){
		global $tabRes;
		$idElemAModifier=$_POST['idElemAModifier'];
		$nomTable=$_POST['nomTable'];
		$tabRes['action']="remplirFormModif".ucfirst($nomTable);
		$nomColonneId = "id".ucfirst($nomTable);
		$requete="SELECT * FROM ".$nomTable
			." WHERE ".$nomColonneId." = ".$idElemAModifier;
		try{
			 $unModele=new royaltoursModele($requete,array());
			 $stmt=$unModele->executer();
			 $tabRes['liste']=array();
			 if($ligne=$stmt->fetch(PDO::FETCH_OBJ)){
			    $tabRes['liste']=$ligne;
			}
		}catch(Exception $e){
			debug_to_console($e->getMessage());
		}finally{
			unset($unModele);
		} 
	}
	
	//Modification hebergement
	function modifierHeberge(){
		global $tabRes;	
		$id = intval($_POST['id']);
		$type= $_POST['type'];
		$nom= $_POST['nom'];
		$adresse=$_POST['adresse'];
		$siteweb= $_POST['siteweb'];
		$description=$_POST['description'];
		
		try{
			$unModele=new royaltoursModele();
			//$pochete=$unModele->verserFichier("pochettes", "pochette", "avatar.jpg",$titre);
			$requete="UPDATE `hebergement` SET `typeHebergement` = '".$type."', 
				`nomHebergement` = '".$nom."', `lieuHebergement` = '".$adresse."', 
				`siteWebHebergement` = '".$siteweb."', 
				`descriptionHebergement` = '".$description."' 
				WHERE `hebergement`.`idHebergement` = ".$id;
			$unModele=new royaltoursModele($requete,array());
			$stmt=$unModele->executer();
			$tabRes['action']="modifie";
			$tabRes['msg']=" Hebergement bien modifie";
		}catch(Exception $e){
			debug_to_console($e->getMessage());
		}finally{
			unset($unModele);
		}
	}
	
	//Modification Restaurant
	function modifierResto(){
		global $tabRes;	
		$id = intval($_POST['id']);
		$type= $_POST['type'];
		$nom= $_POST['nom'];
		$adresse=$_POST['adresse'];
		$siteweb= $_POST['siteweb'];
		
		try{
			$unModele=new royaltoursModele();
			//$pochete=$unModele->verserFichier("pochettes", "pochette", "avatar.jpg",$titre);
			$requete="UPDATE `restaurant` SET `typeRepas` = '".$type."', 
				`nomRestaurant` = '".$nom."', `lieuRestaurant` = '".$adresse."', 
				`sitewebRestaurant` = '".$siteweb."' 
				WHERE `restaurant`.`idRestaurant` = ".$id;
			$unModele=new royaltoursModele($requete,array());
			$stmt=$unModele->executer();
			$tabRes['action']="modifie";
			$tabRes['msg']=" Restaurant bien modifie";
		}catch(Exception $e){
			debug_to_console($e->getMessage());
		}finally{
			unset($unModele);
		}
	}
	
	//Modification activite
	function modifierActivite(){
		global $tabRes;	
		$id = intval($_POST['id']);
		$nom= $_POST['nom'];
		$adresse=$_POST['adresse'];
		$heureDebut= $_POST['heureDebut'];
		$heureFin= $_POST['heureFin'];
		$siteweb= $_POST['siteweb'];
		$description=$_POST['description'];
		
		try{
			$unModele=new royaltoursModele();
			//$pochete=$unModele->verserFichier("pochettes", "pochette", "avatar.jpg",$titre);
			$requete="UPDATE `activite` SET `nomActivite` = '".$nom."', 
				`lieuActivite` = '".$adresse."', 
				`heurDebut` = '".$heureDebut."', `heurFin` = '".$heureFin."',
				`sitewebActivite` = '".$siteweb."', 
				`descriptionActivite` = '".$description."' 
				WHERE `activite`.`idActivite` = ".$id;
			$unModele=new royaltoursModele($requete,array());
			$stmt=$unModele->executer();
			$tabRes['action']="modifie";
			$tabRes['msg']=" Activite bien modifie";
		}catch(Exception $e){
			debug_to_console($e->getMessage());
		}finally{
			unset($unModele);
		}
	}
	
	//Ajout d'une etape
	function ajoutEtape(){
		global $tabRes;	
		$idCircuit = intval($_POST['idCircuit']);
		$nom= $_POST['nom'];
		$dateDebut=$_POST['dateDebut'];
		$description=$_POST['description'];
		$listLienImg= explode(',newImg', $_POST['listImgs']);
		try{
			$unModele=new royaltoursModele();
			$requete="INSERT INTO etape VALUES(0,?,?,?,?,?)";
			$unModele=new royaltoursModele($requete,
				array($idCircuit,$nom,$dateDebut,$description,$listLienImg[0]));
			$stmt=$unModele->executer();
			$tabRes['action']="enregistrer";
			
			if(count($listLienImg)>0)
			{
				$idTable = getTableId('etape','idetape',$nom,'nomEtape');
				ajoutImgs('imageetape', $idTable, 'ligneimageetape');
			}
			$tabRes['msg']=" etape bien enregistre";
		}catch(Exception $e){
		}finally{
			unset($unModele);
		}
	}
	
	//Modification etape
	function modifierEtape(){
		global $tabRes;	
		$id = intval($_POST['id']);
		$nom= $_POST['nom'];
		$dateDebut=$_POST['dateDebut'];
		$description=$_POST['description'];
		$listLienImg= explode(',newImg', $_POST['listImgs']);
		try{
			$unModele=new royaltoursModele();
			$requete="UPDATE `etape` SET `nomEtape` = '".$nom."', 
				`dateEtape` = '".$dateDebut."', `description` = '".$description."' 
				WHERE `etape`.`idEtape` = ".$id;
			$unModele=new royaltoursModele($requete,array());
			$stmt=$unModele->executer();
			$tabRes['action']="modifie";
			$tabRes['msg']=" Etape bien modifiee";
			if(count($listLienImg)>0)
			{
				ajoutImgs('imageetape', $id, 'ligneimageetape');
			}
		}catch(Exception $e){
			debug_to_console($e->getMessage());
		}finally{
			unset($unModele);
		}
	}
	
	//Ajout d'une image a ligneimagecircuit ou ligneimageetape ou ligneimagejour selon $nomTableBD
	function ajoutImgs($nomTableImg, $idCircEtapJour, $nomTableLigneImg){
		global $tabRes;	
		$listLienImg= explode(',newImg', $_POST['listImgs']);
		try{
			$unModele=new royaltoursModele();
			$nbrImageAjoute=0;
			for($i=0; $i<count($listLienImg); ++$i)
			{
				$idImg = getTableId($nomTableImg,'idImage',$listLienImg[$i],'lienImage');
				$requete="INSERT INTO ".$nomTableLigneImg." VALUES(0,?,?)";
				$unModele=new royaltoursModele($requete,array($idCircEtapJour,$idImg));
				$stmt=$unModele->executer();
			}
			//$tabRes['msg'].=$nbrImageAjoute." Image(s) bien enregistre";
		}catch(Exception $e){
			debug_to_console($e->getMessage());
		}finally{
			unset($unModele);
		}
	}
	
	//Ajout d'un jour
	function ajouterJour(){
		global $tabRes;	
		$idEtape = intval($_POST['idEtape']);
		$nom= $_POST['nom'];
		$date= $_POST['date'];
		$description=$_POST['description'];
		$listLienImg= explode(',newImg', $_POST['listImgs']);
		$listHeberges= explode(',newHeberge', $_POST['listeHebergements']);
		$listRestos= explode(',newResto', $_POST['listeRestos']);
		$listActivites= explode(',newActivite', $_POST['listeActivites']);
		//debug_to_console($tabRes);
		try{
			$unModele=new royaltoursModele();
			//$pochete=$unModele->verserFichier("pochettes", "pochette", "avatar.jpg",$titre);
			$requete="INSERT INTO jour VALUES(0,?,?,?,?,?)";
			$unModele=new royaltoursModele($requete,
				array($idEtape,$nom,$date,$description,$listLienImg[0]));
			$stmt=$unModele->executer();
			$tabRes['action']="enregistrer";
			$tabRes['msg']=" Jour bien enregistre";
			$idTable = getTableId('jour','idJour',$nom,'nomJour');
			if(count($listLienImg)>0)
			{
				ajoutImgs('imagejour', $idTable, 'ligneimagejour');
			}
			if(count($listHeberges)>0)
			{
				ajoutLigneHeberge($idTable);
			}
			if(count($listRestos)>0)
			{
				ajoutLigneResto($idTable);
			}
			if(count($listActivites)>0)
			{
				ajoutLigneActivite($idTable);
			}
		}catch(Exception $e){
			debug_to_console($e->getMessage());
		}finally{
			unset($unModele);
		}
	}
	
	//Modification jour
	function modifierJour(){
		global $tabRes;	
		$id = intval($_POST['id']);
		$nom= $_POST['nom'];
		$date=$_POST['date'];
		$description=$_POST['description'];
		$listLienImg= explode(',newImg', $_POST['listImgs']);
		$listHeberges= explode(',newHeberge', $_POST['listeHebergements']);
		$listRestos= explode(',newResto', $_POST['listeRestos']);
		$listActivites= explode(',newActivite', $_POST['listeActivites']);
		try{
			$unModele=new royaltoursModele();
			//$pochete=$unModele->verserFichier("pochettes", "pochette", "avatar.jpg",$titre);
			$requete="UPDATE `jour` SET `nomJour` = '".$nom."', 
				`dateJour` = '".$date."', `descriptionJour` = '".$description."' 
				WHERE `jour`.`idJour` = ".$id;
			$unModele=new royaltoursModele($requete,array());
			$stmt=$unModele->executer();
			$tabRes['action']="modifie";
			$tabRes['msg']=" Jour bien modifie";
			if(count($listLienImg)>0)
			{
				ajoutImgs('imagejour', $id, 'ligneimagejour');
			}
			if(count($listHeberges)>0)
			{
				ajoutLigneHeberge($id);
			}
			if(count($listRestos)>0)
			{
				ajoutLigneResto($id);
			}
			if(count($listActivites)>0)
			{
				ajoutLigneActivite($id);
			}
		}catch(Exception $e){
			debug_to_console($e->getMessage());
		}finally{
			unset($unModele);
		}
	}
	
	//Ajout d'un hebergement a lignehebergement
	function ajoutLigneHeberge($idJour){
		global $tabRes;	
		$listHeberges= explode(',newHeberge', $_POST['listeHebergements']);
		try{
			$unModele=new royaltoursModele();
			$nbrHebergeAjoute=0;
			for($i=0; $i<count($listHeberges); ++$i)
			{
				$idHeberge = getTableId('hebergement','idHebergement',
									$listHeberges[$i],'lieuHebergement');
				$requete="INSERT INTO lignehebergement VALUES(0,?,?)";
				$unModele=new royaltoursModele($requete,array($idHeberge,$idJour));
				$stmt=$unModele->executer();
				$nbrHebergeAjoute = $i;
			}
			$tabRes['msg'].=$nbrHebergeAjoute." Hebergement(s) bien enregistre(s)";
		}catch(Exception $e){
			debug_to_console($e->getMessage());
		}finally{
			unset($unModele);
		}
	}
	
	//Ajout d'un resto a lignerestaurant
	 function ajoutLigneResto($idJour){
		global $tabRes;	
		$listRestos= explode(',newResto', $_POST['listeRestos']);
		try{
			$unModele=new royaltoursModele();
			$nbrRestosAjoute=0;
			for($i=0; $i<count($listRestos); ++$i)
			{
				$idResto = getTableId('restaurant','idRestaurant',
									$listRestos[$i],'lieuRestaurant');
				$requete="INSERT INTO lignerestaurant VALUES(0,?,?)";
				$unModele=new royaltoursModele($requete,array($idResto,$idJour));
				$stmt=$unModele->executer();
				$nbrRestosAjoute = $i;
			}
			$tabRes['msg'].=$nbrRestosAjoute." Restaurant(s) bien enregistre(s)";
		}catch(Exception $e){
			debug_to_console($e->getMessage());
		}finally{
			unset($unModele);
		}
	} 
	
	//Ajout d'une activite a ligneactivite
	 function ajoutLigneActivite($idJour){
		global $tabRes;	
		$listActivites= explode(',newActivite', $_POST['listeActivites']);
		try{
			$unModele=new royaltoursModele();
			$nbrActivitesAjoute=0;
			for($i=0; $i<count($listActivites); ++$i)
			{
				$idActivite = getTableId('activite','idActivite',
									$listActivites[$i],'lieuActivite');
				$requete="INSERT INTO ligneactivite VALUES(0,?,?)";
				$unModele=new royaltoursModele($requete,array($idActivite,$idJour));
				$stmt=$unModele->executer();
				$nbrActivitesAjoute = $i;
			}
			$tabRes['msg'].=$nbrActivitesAjoute." Activite(s) bien enregistree(s)";
		}catch(Exception $e){
			debug_to_console($e->getMessage());
		}finally{
			unset($unModele);
		}
	} 
	
	//Ajout d'un hebergement dans la table hebergement
	function ajouterHeberge(){
		global $tabRes;	
		$type = $_POST['type'];
		$nom = $_POST['nom'];
		$adresse = $_POST['adresse'];
		$siteweb = $_POST['siteweb'];
		$description = $_POST['description'];
		
		try{
			$unModele=new royaltoursModele();
			$requete="INSERT INTO hebergement VALUES(0,?,?,?,?,?)";
			$unModele=new royaltoursModele($requete,
				array($type,$nom,$adresse,$siteweb,$description));
			$stmt=$unModele->executer();
			$tabRes['action']="enregistrer";
			$tabRes['msg']=" hebergement bien enregistre";
		}catch(Exception $e){
		}finally{
			unset($unModele);
		}
	}
	
	//Ajout d'un restaurant dans la table restaurant
	function ajouterResto(){
		global $tabRes;	
		$type = $_POST['type'];
		$nom = $_POST['nom'];
		$adresse = $_POST['adresse'];
		$siteweb = $_POST['siteweb'];
		
		try{
			$unModele=new royaltoursModele();
			$requete="INSERT INTO restaurant VALUES(0,?,?,?,?)";
			$unModele=new royaltoursModele($requete,
				array($type,$nom,$adresse,$siteweb));
			$stmt=$unModele->executer();
			$tabRes['action']="enregistrer";
			$tabRes['msg']=" Restaurant bien enregistre";
		}catch(Exception $e){
		}finally{
			unset($unModele);
		}
	}
	
	//Ajout d'un hebergement dans la table hebergement
	function ajouterActivite(){
		global $tabRes;	
		$nom = $_POST['nom'];
		$adresse = $_POST['adresse'];
		$heureDebut = $_POST['heureDebut'];
		$heureFin = $_POST['heureFin'];
		$siteweb = $_POST['siteweb'];
		$description = $_POST['description'];
		
		try{
			$unModele=new royaltoursModele();
			$requete="INSERT INTO activite VALUES(0,?,?,?,?,?,?)";
			$unModele=new royaltoursModele($requete,
				array($nom,$adresse,$heureDebut,$heureFin,$siteweb,$description));
			$stmt=$unModele->executer();
			$tabRes['action']="enregistrer";
			$tabRes['msg']=" Activite bien enregistree";
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
	
	//supprimer inscrit, circuit, activite, jour, hebergement, restaurant, activite, ou image
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
	//Contrôleur
	$action=$_POST['action'];
	switch($action){
		case "listerSelect" :
			remplirSelectDpt();
			break;
		case "inscription" :
			inscrireEmployes();
			break;
		case "connexion" :
			verifInfoConnex();
			break;
		case "tranchePmt" :
			appliquerModalitesPmt();
			break;
		case "lienImgCircuit" :
		case "lienImgCircuitModif":
			ajoutDansImgCircuitOuEtapeOuJour('imagecircuit');
			break;
		case "ajoutCircuit" :
			ajoutCircuit();
			break;
		case "ajoutPromoCircuit" :
			ajoutPromoCircuit();
			break;
		case "otePromoCircuit" :
			otePromoCircuit();
			break;
		case "publierCircuit" :
			publierCircuit();
			break;
		case "depublierCircuit" :
			depublierCircuit();
			break;
		case "lienImgEtape" :
		case "lienImgEtapeModif" :
			ajoutDansImgCircuitOuEtapeOuJour('imageetape');
			break;
		case "ajoutEtape" :
			ajoutEtape();
			break;
		case "ajoutImgs" :
			$idCEJ = intval($_POST['idCEJ']);
			$tableImg= $_POST['tableImg'];
			$tableLigneImg=$_POST['tableLigneImg'];
			ajoutImgs($tableImg,$idCEJ,$tableLigneImg);
			break;
		case "lienImgJour" :
		case "lienImgJourModif" :
			ajoutDansImgCircuitOuEtapeOuJour('imagejour');
			break;
		case "ajoutHeberge" :
			ajouterHeberge();
			break;
		case "ajoutResto" :
			ajouterResto();
			break;
		case "ajoutActivite" :
			ajouterActivite();
			break;
		case "ajoutJour" :
			ajouterJour();
			break;
		case "lister" :
			listerBD();
			break;
		case "listerDetailsJour" :
			listerDetails();
			break;
		case "supprimer" :
			supprimerElem();
			break;
		case "modifier" :
			remplirFormModifier();
			break;
		case "modifierCircuit" :
			modifierCircuit();
			break;
		case "modifierEtape" :
			modifierEtape();
			break;
		case "modifierJour" :
			modifierJour();
			break;
		case "modifierHeberge" :
			modifierHeberge();
			break;
		case "modifierResto" :
			modifierResto();
			break;
		case "modifierActivite" :
			modifierActivite();
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