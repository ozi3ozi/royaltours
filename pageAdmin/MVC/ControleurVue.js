//vue films

//
function remplirSelectDpts(listeDepartements)
{
	var nbrDepartements = listeDepartements.length;
	var tagsOption;
	for(var ligne=0; ligne<nbrDepartements; ++ligne)
	{
		tagsOption+="<option>"+listeDepartements[ligne].idDepartement
				+"- "+listeDepartements[ligne].nomDepartement+"</option>";
	}
	document.getElementById('selectDepartement').innerHTML=tagsOption;
}

function verifConnexion(reponse){
	if(reponse.msg == false){
		alert("Le numero d'employe ou le mot de passe sont incorrects");
	}else{
		document.getElementById('dashboardCell').innerHTML += " de "+reponse.infoEmp[0].prenomEmploye;
		rendreInvisible("divConnexion");
		rendreVisible("navCote");
		localStorage.setItem("idEmploye",reponse.infoEmp[0].idEmploye);
		console.log(localStorage.getItem("idEmploye"));
	}
}

//Lister tous les circuits
function listerinscrit(listerinscrit){
	console.log(listerinscrit);
	var nbrDeCircuits = listerinscrit.length;
	var cardCircuit="";
	var conditionLister=' WHERE idCircuit =';
	document.getElementById('bodyListInscrits').innerHTML="";
	for(var ligne=0; ligne<nbrDeCircuits; ++ligne)
	{
		$id = listerinscrit[ligne].idInscrit;
		$nom = listerinscrit[ligne].nomInscrit;
		$prenom = listerinscrit[ligne].prenomInscrit
		$ddn = listerinscrit[ligne].date
		$email = listerinscrit[ligne].email
		$genre = listerinscrit[ligne].genre
		cardCircuit='<tr><td>'+$nom+'</td>';
		cardCircuit+='<td>'+$prenom+'</td>';
		cardCircuit+='<td>'+$ddn+'</td>';
		cardCircuit+='<td>'+$email+'</td>';
		cardCircuit+='<td>'+$genre+'</td>';
		cardCircuit+='<td><a href="#" class="card-link" '
			+'onclick="supprimer(\'inscrit\',\''+$id+'\',\'\'); lister(\'inscrit\',\' \');"'
			+'><img src="icones/supprimer.jpg" alt="supprimer"></a></td></tr>'
		  
		document.getElementById('bodyListInscrits').innerHTML+=cardCircuit;	
	}
}

//Lister tous les circuits
function listerCircuit(listeCircuits){
	console.log(listeCircuits);
	var nbrDeCircuits = listeCircuits.length;
	var cardCircuit="";
	var conditionLister=' WHERE idCircuit =';
	document.getElementById('listeCircuits').innerHTML="";
	for(var ligne=0; ligne<nbrDeCircuits; ++ligne)
	{
		$idCircuit = listeCircuits[ligne].idCircuit;
		$prixCircuit = listeCircuits[ligne].prixCircuit;
		if(listeCircuits[ligne].tauxPromo != null)
			$prixCircuit = $prixCircuit-
				(parseInt(listeCircuits[ligne].tauxPromo)
				*listeCircuits[ligne].prixCircuit)/100;
			
		cardCircuit='<div class="col-sm-4 mb-4">'
		   +'<div class="card" style="width: 22rem;">'
		  +'<img class="card-img-top" style="height: 15rem;" '
		  +'src="./images/'+listeCircuits[ligne].imgPrincipale+'" alt="Image circuit">'
		  +'<div class="card-body">'
			+'<h5 class="card-title">Circuit '+listeCircuits[ligne].nomCircuit+'</h5>'
		   +'</div>'
		  +'<ul class="list-group list-group-flush">'
			+'<li class="list-group-item">Date de debut: '+listeCircuits[ligne].dateDebutCircuit+'</li>'
			+'<li class="list-group-item">Duree: '+listeCircuits[ligne].duree+' jours</li>'
			+'<li class="list-group-item">Nombre de place disponibles: '+listeCircuits[ligne].quantiteCircuit+'</li>'
			+'<li class="list-group-item">Prix: $'+$prixCircuit+'</li>'
		  +'</ul>'
		  +'<button id="btnAjoutE" type="button" class="ajoutCircuit list-group-item bg-success btn btn-success"'
		  +' onclick="montrerAjoutEtape(); localStorage.setItem(\'idCircuit\',\''+$idCircuit+'\');'
		  +' afficherTitreCEJCourant(\'titreEtape\',\'Circuit: '+listeCircuits[ligne].nomCircuit+'\');'
		  +'lister(\'etape\',\''+conditionLister+$idCircuit+'\');"'
		  +'>Ajouter une etape</button>'
		  +'<button type="button" class="listeCircuit list-group-item bg-success btn btn-success"'
		  +' onclick="montrerAjoutEtape(); localStorage.setItem(\'idCircuit\',\''+$idCircuit+'\');'
		  +' afficherTitreCEJCourant(\'titreEtape\',\'Circuit: '+listeCircuits[ligne].nomCircuit+'\');'
		  +'lister(\'etape\',\''+conditionLister+$idCircuit+'\');'
		  +'listerDetailsJour(\'imagecircuit\',\''+conditionLister+$idCircuit+'\');"'
		  +'>Details</button>'
		  +'<button type="button" class=" list-group-item bg-success btn btn-success"'
		  +' id="publier'+$idCircuit+'" '
		  +' onclick="localStorage.setItem(\'idCircuit\',\''+$idCircuit+'\');'
		  +'publier(\''+$idCircuit+'\');lister(\'circuit\',\' \');">Publier</button>'
		  +'<button type="button" class="list-group-item '
		  +'bg-danger btn btn-danger" id="depublier'+$idCircuit+'"'
		  +' style="display: none;"'
		  +' onclick="localStorage.setItem(\'idCircuit\',\''+$idCircuit+'\');'
		  +'depublier(\''+$idCircuit+'\');lister(\'circuit\',\' \');">Depublier</button>'
		  +'<button type="button" class="list-group-item bg-success btn btn-success"'
		  +' id="promoAjoute'+$idCircuit+'"'
		  +' data-toggle="modal" data-target="#modalAjoutPromo"'
		  +' onclick="localStorage.setItem(\'idCircuit\',\''+$idCircuit+'\');"'
		  +' >Mettre en promotion</button>'
		  +'<button type="button" class="list-group-item bg-danger btn btn-danger"'
		  +' id="promoOte'+$idCircuit+'"'
		  +' style="display: none;" onclick="localStorage.setItem(\'idCircuit\',\''+$idCircuit+'\');'
		  +' otePromo()">Enlever promotion</button>'
		  +'<div class="card-body">'
			+'<a href="#" class="card-link" '
			+'onclick="supprimer(\'circuit\',\''+$idCircuit+'\',\'\'); lister(\'circuit\',\' \');"'
			+'><img src="icones/supprimer.jpg" alt="supprimer"></a>'
			+'<a href="#" type="button" id="btnShowFormModifCircuit" '
			+'data-toggle="modal" data-target="#modalModifierCircuit"class="card-link"'
			+' onclick="remplirFormAModif(\'circuit\',\''+$idCircuit+'\');"'
			+'><img src="icones/modifier.jpg" alt="modifier"></a>'
		  +'</div>'
			
		+'</div>'
		  +'</div>';
		  
		document.getElementById('listeCircuits').innerHTML+=cardCircuit;
		if(listeCircuits[ligne].tauxPromo != null){ 
			rendreVisible('promoOte'+$idCircuit);
			rendreInvisible('promoAjoute'+$idCircuit);
		}else{
			rendreInvisible('promoOte'+$idCircuit);
			rendreVisible('promoAjoute'+$idCircuit);
		}
		if(listeCircuits[ligne].publier != null){ 
			rendreVisible('depublier'+$idCircuit);
			rendreInvisible('publier'+$idCircuit);
		}else{
			rendreInvisible('depublier'+$idCircuit);
			rendreVisible('publier'+$idCircuit);
		}
	}
	montrerElemsAjoutOuList();	
	
}

//Lister les images d'un circuit donne
function listerImgsCircuit(listeImgs){
	var nbrImgs = listeImgs.length;
	var cardImg = '';
	for(var ligne=0;ligne<nbrImgs;++ligne)
	{
		cardImg += '<div class="col-sm-4 mb-4">'
			   +'<div class="card" style="width: 22rem;">'
			  +'<img class="card-img-top" style="height: 15rem;" src="'
			  +'./images/'+listeImgs[ligne].lienImage+'" alt="Card image cap">'
			  +'<div class="card-body">'
				+'<a href="#" class="card-link" '
				+'onclick="supprimer(\'ligneimagecircuit\',localStorage.getItem(\'idCircuit\'), \' AND idImage = '+listeImgs[ligne].idImage+'\');'
				+'listerDetailsJour(\'imagecircuit\',localStorage.getItem(\'idCircuit\'));"'
				+'><img src="icones/supprimer.jpg" alt="supprimer"></a>'
			  +'</div>'
				
			+'</div>'
			  +'</div>';
	}
	document.getElementById('listeImgsCircuit').innerHTML=cardImg;
}

//Remplir le formulaire de modification de circuit
function remplirFormModifCircuit(listeElemsCircuit){
	document.getElementById('modifIdCircuit').value=listeElemsCircuit.idCircuit;
	document.getElementById('modifNomCircuit').value=listeElemsCircuit.nomCircuit;
	document.getElementById('modifDebutCircuit').value=listeElemsCircuit.dateDebutCircuit;
	document.getElementById('modifDureeCircuit').value=listeElemsCircuit.duree;
	document.getElementById('modifPrixCircuit').value=listeElemsCircuit.prixCircuit;
	document.getElementById('modifQteCircuit').value=listeElemsCircuit.quantiteCircuit;
}

//Remplir le formulaire de modification d'une etape
function remplirFormModifEtape(listeElemsEtape){
	document.getElementById('idModifEtape').value=listeElemsEtape.idEtape;
	document.getElementById('nomModifEtape').value=listeElemsEtape.nomEtape;
	document.getElementById('debutModifEtape').value=listeElemsEtape.dateEtape;
	document.getElementById('descModifEtape').value=listeElemsEtape.description;
}

//Remplir le formulaire de modification d'un jour
function remplirFormModifJour(listeElemsJour){
	document.getElementById('idModifJour').value=listeElemsJour.idJour;
	document.getElementById('nomModifJour').value=listeElemsJour.nomJour;
	document.getElementById('dateModifJour').value=listeElemsJour.dateJour;
	document.getElementById('descModifJour').value=listeElemsJour.descriptionJour;
}

//Remplir le formulaire de modification d'un hebergement
function remplirFormModifHebergement(listeElemsHeberge){
	document.getElementById('idModifHeberge').value=listeElemsHeberge.idHebergement;
	document.getElementById('typeModifHebergement').value=listeElemsHeberge.typeHebergement;
	document.getElementById('nomModifHeberge').value=listeElemsHeberge.nomHebergement;
	document.getElementById('adresseModifHeberge').value=listeElemsHeberge.lieuHebergement;
	document.getElementById('sitewebModifHeberge').value=listeElemsHeberge.siteWebHebergement;
	document.getElementById('descriptionModifHeberge').value=listeElemsHeberge.descriptionHebergement;
}

//Remplir le formulaire de modification d'un restaurant
function remplirFormModifRestaurant(listeElemsResto){
	document.getElementById('idModifResto').value=listeElemsResto.idRestaurant;
	document.getElementById('typeModifRepas').value=listeElemsResto.typeRepas;
	document.getElementById('nomModifResto').value=listeElemsResto.nomRestaurant;
	document.getElementById('adresseModifResto').value=listeElemsResto.lieuRestaurant;
	document.getElementById('sitewebModifResto').value=listeElemsResto.sitewebRestaurant;
}

//Remplir le formulaire de modification d'une activite
function remplirFormModifActivite(listeElemsActivite){
	document.getElementById('idModifActivite').value=listeElemsActivite.idActivite;
	document.getElementById('nomModifActivite').value=listeElemsActivite.nomActivite;
	document.getElementById('adresseModifActivite').value=listeElemsActivite.lieuActivite;
	document.getElementById('heureDebutModifActivite').value=listeElemsActivite.heurDebut;
	document.getElementById('heureFinModifActivite').value=listeElemsActivite.heurFin;
	document.getElementById('sitewebModifActivite').value=listeElemsActivite.sitewebActivite;
	document.getElementById('descriptionModifActivite').value=listeElemsActivite.descriptionActivite;
}

//Lister les etapes d'un circuit donnee
function listerEtape(listeEtapes){
	var nbrEtapes = listeEtapes.length;
	var cardEtape="";
	var conditionLister=' WHERE idEtape =';
	for(var ligne=0; ligne<nbrEtapes; ++ligne)
	{
		var idEtape = listeEtapes[ligne].idEtape;
		cardEtape+='<div class="col-sm-4 mb-4">'
	   +'<div class="card" style="width: 22rem;">'
	  +'<img class="card-img-top" style="height: 15rem;" '
	  +'src="./images/'+listeEtapes[ligne].imgPrincipale+'" alt="Image circuit">'
	  +'<div class="card-body">'
		+'<h5 class="card-title">Etape: '+listeEtapes[ligne].nomEtape+'</h5>'
	   +'</div>'
	  +'<ul class="list-group list-group-flush">'
		+'<li class="list-group-item">Debut: '+listeEtapes[ligne].dateEtape+'</li>'
		+'<li class="list-group-item">Description: '+listeEtapes[ligne].description+'</li>'
	  +'</ul>'
	  +'<button type="button" class="ajoutCircuit list-group-item bg-success btn btn-success" '
	  +'onclick="montrerAjoutJour(); localStorage.setItem(\'idEtape\',\''+idEtape+'\');'
	  +' afficherTitreCEJCourant(\'titreJour\',\'Etape: '+listeEtapes[ligne].nomEtape+'\');'
	  +'lister(\'jour\',\''+conditionLister+idEtape+'\');">Ajouter un jour</button>'
	  +'<button type="button" class="listeCircuit list-group-item bg-success btn btn-success" '
	  +'onclick="montrerAjoutJour(); localStorage.setItem(\'idEtape\',\''+idEtape+'\');'
	  +' afficherTitreCEJCourant(\'titreJour\',\'Etape: '+listeEtapes[ligne].nomEtape+'\');'
	  +'lister(\'jour\',\''+conditionLister+idEtape+'\');'
	  +'listerDetailsJour(\'imageetape\',\''+conditionLister+idEtape+'\');"'
	  +'>Details</button>'
	  +'<div class="card-body">'
		+'<a href="#" class="card-link" '
		+'onclick="supprimer(\'etape\',\''+idEtape+'\',\'\');'
		+'lister(\'etape\',getConditionLister(\'idCircuit\'));"'
		+'><img src="icones/supprimer.jpg" alt="supprimer"></a>'
		+'<a href="#" class="card-link" data-toggle="modal" data-target="#modalModifEtape"'
			+' onclick="remplirFormAModif(\'etape\',\''+idEtape+'\');"'
		+'><img src="icones/modifier.jpg" alt="modifier"></a>'
	  +'</div>'
		
	+'</div>'
	  +'</div>';
	}
	document.getElementById('listeEtapes').innerHTML=cardEtape;
	montrerElemsAjoutOuList();
}

//Lister les images d'une etape donnee
function listerImgsEtape(listeImgs){
	var nbrImgs = listeImgs.length;
	var cardImg = '';
	for(var ligne=0;ligne<nbrImgs;++ligne)
	{
		cardImg += '<div class="col-sm-4 mb-4">'
			   +'<div class="card" style="width: 22rem;">'
			  +'<img class="card-img-top" style="height: 15rem;" src="'
			  +'./images/'+listeImgs[ligne].lienImage+'" alt="Card image cap">'
			  +'<div class="card-body">'
				+'<a href="#" class="card-link" '
				+'onclick="supprimer(\'ligneimageetape\',localStorage.getItem(\'idEtape\'), \' AND idImage = '+listeImgs[ligne].idImage+'\');'
				+'listerDetailsJour(\'imageetape\',localStorage.getItem(\'idEtape\'));"'
				+'><img src="icones/supprimer.jpg" alt="supprimer"></a>'
			  +'</div>'
				
			+'</div>'
			  +'</div>';
	}
	document.getElementById('listeImgsEtape').innerHTML=cardImg;
}

//Lister les jours d'une etape donnee
function listerJour(listeJours){
	var nbrJours = listeJours.length;
	var cardJour="";
	var conditionLister=' WHERE idJour =';
	for(var ligne=0; ligne<nbrJours; ++ligne)
	{
		conditionLister = conditionLister+listeJours[ligne].idJour;
		cardJour+='<div class="col-sm-4 mb-4">'
	   +'<div class="card" style="width: 22rem;">'
	  +'<img class="card-img-top" style="height: 15rem;" '
	  +'src="./images/'+listeJours[ligne].imgPrincipale+'" alt="Image circuit">'
	  +'<div class="card-body">'
		+'<h5 class="card-title">Etape: '+listeJours[ligne].nomJour+'</h5>'
	   +'</div>'
	  +'<ul class="list-group list-group-flush">'
		+'<li class="list-group-item">Debut: '+listeJours[ligne].dateJour+'</li>'
		+'<li class="list-group-item">Description: '+listeJours[ligne].descriptionJour+'</li>'
	  +'</ul>'
	  +'<button type="button" class="list-group-item bg-success btn btn-success" '
	  +'onclick="montrerDetailsJour(); localStorage.setItem(\'idJour\',\''+listeJours[ligne].idJour+'\');'
	  +' afficherTitreCEJCourant(\'titredetailsJour\',\'Jour: '+listeJours[ligne].nomJour+'\');'+' afficherTitreCEJCourant(\'titreJour\',\'Jour: '+listeJours[ligne].nomJour+'\');'
	  +'listerDetailsJour(\'hebergement\',\''+conditionLister+'\');'
	  +'listerDetailsJour(\'restaurant\',\''+conditionLister+'\');'
	  +'listerDetailsJour(\'activite\',\''+conditionLister+'\');'
	  +'listerDetailsJour(\'imagejour\',\''+conditionLister+'\');">Voir details</button>'
	  +'<div class="card-body">'
		+'<a href="#" class="card-link" '
		+'onclick="supprimer(\'jour\',\''+listeJours[ligne].idJour+'\',\'\');'
		+'lister(\'jour\',getConditionLister(\'idEtape\'));"'
		+'><img src="icones/supprimer.jpg" alt="supprimer"></a>'
		+'<a href="#" class="card-link" data-toggle="modal" data-target="#modalModifJour"'
		+' onclick="remplirFormAModif(\'jour\',\''+listeJours[ligne].idJour+'\');"' 
		+'><img src="icones/modifier.jpg" alt="modifier"></a>'
	  +'</div>'
		
	+'</div>'
	  +'</div>';
	}
	document.getElementById('listeJours').innerHTML=cardJour;
}

//Lister les hebergements d'un jour donnee
function listerHeberge(listeHeberges){
	var nbrHeberge = listeHeberges.length;
	var cardHeberge = "";
	for(var ligne=0; ligne<nbrHeberge;++ligne)
	{
		cardHeberge += '<div class="col-sm-4 mb-4">'
			   +'<div class="card" style="width: 22rem;">'
			   +'<div class="card-body">'
				+'<h5 class="card-title">'+listeHeberges[ligne].nomHebergement+'</h5>'
			   +'</div>'
			  +'<ul class="list-group list-group-flush">'
				+'<li class="list-group-item">Type: '+listeHeberges[ligne].typeHebergement+'</li>'
				+'<li class="list-group-item">Adresse: '+listeHeberges[ligne].lieuHebergement+'</li>'
				+'<li class="list-group-item">Description: '+listeHeberges[ligne].descriptionHebergement+'</li>'
			  +'</ul>'
			  +'<a href="'+listeHeberges[ligne].siteWebHebergement+'" class="list-group-item bg-info btn btn-info">Site web</a>'
			  +'<div class="card-body">'
				+'<p id="idHeberg" style="display: none;"></p>'
				+'<a href="#" class="card-link" '
				+'onclick="supprimer(\'lignehebergement\',localStorage.getItem(\'idJour\'), \' AND idHebergement = '+listeHeberges[ligne].idHebergement+'\');'
				+'listerDetailsJour(\'hebergement\',localStorage.getItem(\'idJour\'));"'
				+'><img src="icones/supprimer.jpg" alt="supprimer"></a>'
				+'<a href="#" class="card-link" data-toggle="modal" data-target="#modalModifHeberge"'
				+' onclick="remplirFormAModif(\'hebergement\',\''+listeHeberges[ligne].idHebergement+'\');"' 
				+'><img src="icones/modifier.jpg" alt="modifier"></a>'
			  +'</div>'
				
			+'</div>'
			  +'</div>';
	}
	document.getElementById('listeHebergements').innerHTML=cardHeberge;
}

//Lister les restaurants d'un jour donnee
function listerResto(listeRestos){
	var nbrResto = listeRestos.length;
	var cardResto = "";
	for(var ligne=0; ligne<nbrResto;++ligne)
	{
		cardResto += '<div class="col-sm-4 mb-4">'
			   +'<div class="card" style="width: 22rem;">'
			   +'<div class="card-body">'
				+'<h5 class="card-title">'+listeRestos[ligne].nomRestaurant+'</h5>'
			   +'</div>'
			  +'<ul class="list-group list-group-flush">'
				+'<li class="list-group-item">Type: '+listeRestos[ligne].typeRepas+'</li>'
				+'<li class="list-group-item">Adresse: '+listeRestos[ligne].lieuRestaurant+'</li>'
				+'</ul>'
			  +'<a href="'+listeRestos[ligne].sitewebRestaurant+'" class="list-group-item bg-info btn btn-info">Site web</a>'
			  +'<div class="card-body">'
				+'<p id="idResto" style="display: none;"></p>'
				+'<a href="#" class="card-link" '
				+'onclick="supprimer(\'lignerestaurant\',localStorage.getItem(\'idJour\'), \' AND idRestaurant = '+listeRestos[ligne].idRestaurant+'\');'
				+'listerDetailsJour(\'restaurant\',localStorage.getItem(\'idJour\'));"'
				+'><img src="icones/supprimer.jpg" alt="supprimer"></a>'
				+'<a href="#" class="card-link" data-toggle="modal" data-target="#modalModifResto"'
				+' onclick="remplirFormAModif(\'restaurant\',\''+listeRestos[ligne].idRestaurant+'\');"' 
				+'><img src="icones/modifier.jpg" alt="modifier"></a>'
			  +'</div>'
				
			+'</div>'
			  +'</div>';
	}
	document.getElementById('listeRestos').innerHTML=cardResto;
}

//Lister les hebergements d'un jour donnee
function listerActivite(listeActivites){
	var nbrActivite = listeActivites.length;
	var cardActivite = "";
	for(var ligne=0; ligne<nbrActivite;++ligne)
	{
		cardActivite += '<div class="col-sm-4 mb-4">'
			   +'<div class="card" style="width: 22rem;">'
			   +'<div class="card-body">'
				+'<h5 class="card-title">'+listeActivites[ligne].nomActivite+'</h5>'
			   +'</div>'
			  +'<ul class="list-group list-group-flush">'
				+'<li class="list-group-item">De: '+listeActivites[ligne].heurDebut
						+' a '+listeActivites[ligne].heurFin+'</li>'
				+'<li class="list-group-item">Adresse: '+listeActivites[ligne].lieuActivite+'</li>'
				+'<li class="list-group-item">Description: '+listeActivites[ligne].descriptionActivite+'</li>'
			  +'</ul>'
			  +'<a href="'+listeActivites[ligne].sitewebActivite+'" class="list-group-item bg-info btn btn-info">Site web</a>'
			  +'<div class="card-body">'
				+'<p id="idHeberg" style="display: none;"></p>'
				+'<a href="#" class="card-link" '
				+'onclick="supprimer(\'ligneactivite\',localStorage.getItem(\'idJour\'), \' AND idActivite = '+listeActivites[ligne].idActivite+'\');'
				+'listerDetailsJour(\'activite\',localStorage.getItem(\'idJour\'));"'
				+'><img src="icones/supprimer.jpg" alt="supprimer"></a>'
				+'<a href="#" class="card-link" data-toggle="modal" data-target="#modalModifActivite"'
				+' onclick="remplirFormAModif(\'activite\',\''+listeActivites[ligne].idActivite+'\');"' 
				+'><img src="icones/modifier.jpg" alt="modifier"></a>'
			  +'</div>'
				
			+'</div>'
			  +'</div>';
	}
	document.getElementById('listeActivites').innerHTML=cardActivite;
}

//Lister les images d'un jour donne
function listerImgsJour(listeImgs){
	var nbrImgs = listeImgs.length;
	var cardImg = '';
	for(var ligne=0;ligne<nbrImgs;++ligne)
	{
		cardImg += '<div class="col-sm-4 mb-4">'
			   +'<div class="card" style="width: 22rem;">'
			  +'<img class="card-img-top" style="height: 15rem;" src="'
			  +'./images/'+listeImgs[ligne].lienImage+'" alt="Card image cap">'
			  +'<div class="card-body">'
			  +'<p id="idImg" style="display: none;"></p>'
				+'<a href="#" class="card-link" '
				+'onclick="supprimer(\'ligneimagejour\',localStorage.getItem(\'idJour\'), \' AND idImage = '+listeImgs[ligne].idImage+'\');'
				+'listerDetailsJour(\'imagejour\',localStorage.getItem(\'idJour\'));"'
				+'><img src="icones/supprimer.jpg" alt="supprimer"></a>'
			  +'</div>'
				
			+'</div>'
			  +'</div>';
	}
	document.getElementById('listeImages').innerHTML=cardImg;
}

//afficher le titre du CEJ courant
function afficherTitreCEJCourant(idDivTitre,titreCEJ){
	var divTitre = document.getElementById(idDivTitre);
	divTitre.innerHTML = titreCEJ;
}

function afficherFiche(reponse){
  var uneFiche;
  if(reponse.OK){
	uneFiche=reponse.fiche;
	$('#formFicheF h3:first-child').html("Fiche du film numero "+uneFiche.idf);
	$('#idf').val(uneFiche.idf);
	$('#titreF').val(uneFiche.titre);
	$('#dureeF').val(uneFiche.duree);
	$('#resF').val(uneFiche.res);
	$('#divFormFiche').show();
	document.getElementById('divFormFiche').style.display='block';
  }else{
	$('#messages').html("Film "+$('#numF').val()+" introuvable");
	setTimeout(function(){ $('#messages').html(""); }, 5000);
  }

}

var afficherVue=function(reponse){
	var action=reponse.action; 
	switch(action){
		
		case "ajoutImgs" :
		case "enregistrer":
		case "supprimer" :
		case "modifier" :
		case "modifie" :
			console.log(reponse);
			alert(reponse.msg);
			/* document.getElementById(reponse.idMsg).innerHTML=reponse.msg;
			setTimeout(function(){ 
				document.getElementById(reponse.idMsg).innerHTML="" }, 5000); */
		break;
		case "inscription" :
			montrerConnexForm();
			break;
		case "connexSucces" :
			montrerDashboard();
			localStorage.setItem("idEmploye",1);
			verifConnexion(reponse);
			break;
		case "erreur":
			document.getElementById(reponse.idAlertErr).innerHTML=reponse.msg;
			rendreVisible(reponse.idAlertErr);
			break;
		case "listerSelect" :
			remplirSelectDpts(reponse.listeDepartement);
			break;
		case "connexion" :
			console.log(reponse);
			verifConnexion(reponse);
			break;
		case "listerinscrit" :
			listerinscrit(reponse.liste);
			break;
		case "listercircuit" :
			listerCircuit(reponse.liste);
			break;
		case "listerimagecircuit" :
			listerImgsCircuit(reponse.liste);
			break;
		case "listeretape" :
			listerEtape(reponse.liste);
			break;
		case "listerimageetape" :
			listerImgsEtape(reponse.liste);
			break;
		case "listerjour" :
			listerJour(reponse.liste);
			break;
		case "listerhebergement" :
			listerHeberge(reponse.liste);
			break;
		case "listerrestaurant" :
			listerResto(reponse.liste);
			break;
		case "listeractivite" :
			listerActivite(reponse.liste);
			break;
		case "listerimagejour" :
			listerImgsJour(reponse.liste);
			break;
		case "remplirFormModifCircuit" :
			remplirFormModifCircuit(reponse.liste);
			break;
		case "remplirFormModifEtape" :
			remplirFormModifEtape(reponse.liste);
			break;
		case "remplirFormModifJour" :
			remplirFormModifJour(reponse.liste);
			break;
		case "remplirFormModifHebergement" :
			remplirFormModifHebergement(reponse.liste);
			break;
		case "remplirFormModifRestaurant" :
			remplirFormModifRestaurant(reponse.liste);
			break;
		case "remplirFormModifActivite" :
			remplirFormModifActivite(reponse.liste);
			break;
		case "fiche" :
			afficherFiche(reponse);
		break;
		
	}
}

