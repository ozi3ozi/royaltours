
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
function listerCircuit(listeCircuits){
	console.log(listeCircuits);
	var nbrDeCircuits = listeCircuits.length;
	var cardCircuit="";
	var conditionLister=' WHERE idCircuit =';
	document.getElementById('listeTousCircuit').innerHTML="";
	for(var ligne=0; ligne<nbrDeCircuits; ++ligne)
	{
		$idCircuit = listeCircuits[ligne].idCircuit;
		$img = listeCircuits[ligne].imgPrincipale;
		$nom = listeCircuits[ligne].nomCircuit;
		$debut = listeCircuits[ligne].dateDebutCircuit;
		$duree = listeCircuits[ligne].duree;
		$prix = listeCircuits[ligne].prixCircuit;
		$promo = listeCircuits[ligne].tauxPromo;
		$sourceMaps = listeCircuits[ligne].iframe;
		//onclick="lister(\'etape\',\' WHERE idCircuit ='+$idCircuit+');"
		cardCircuit = '<div class="destination item" style="width: 22em;">'
			+'<div class="destination_image">'
			+'<img type="button" style="height: 15em;" onclick="lister(\'etape\',\' WHERE idCircuit = '+$idCircuit+'\')"'
			+' src="../pageAdmin/images/'+$img+'" alt="">';
			if($promo != null){
				cardCircuit += '<div class="spec_offer text-center bg-info text-white">Promotion '+$promo+'%</div>';
			}
		
		cardCircuit += '</div><div class="destination_content caption">';
		cardCircuit += '<div class="destination_title">'
			+'<a onclick="lister(\'etape\',\' WHERE idCircuit = '+$idCircuit+'\')"'
			+'>'+$nom+'</a></div>';
		cardCircuit += '<div class="destination_subtitle"><p>Debute le: '+$debut
		+' pour une duree de '+$duree+' jours</p></div>';
		
		cardCircuit += '<button type="button" class="connecte btn btn-primary"'
			+' onclick="ajouterPanier('+$idCircuit+')"'
			+' style="display:none;">Ajouter au pannier</button>';
		cardCircuit += '<div class="destination_price">$'+$prix+'</div></div></div>';
		
		var maps = '<iframe id='+$idCircuit+' src="'+$sourceMaps+'" width="100%" height="450" frameborder="0" style="border:0; display:none;" allowfullscreen=""></iframe>';
		document.getElementById('maps').innerHTML = maps;
		document.getElementById('listeTousCircuit').innerHTML += cardCircuit
	}
	veriferSiConnecter();
}

//Lister les etapes d'un circuit donnee
function listerEtape(listeEtapes){
	var taille;
	var rep="";
	
	
	taille=listeEtapes.length;
	for(var i=0; i<taille; i++){
		$idEtape = listeEtapes[i].idEtape;
		rep+="<div class='news_post d-flex flex-md-row flex-column align-items-start justify-content-start'>";
		rep+="<div class='news_post_image'><img src=\"../pageAdmin/images/"+listeEtapes[i].imgPrincipale+"\" alt=''></div>";
		rep+="<div class='news_post_content'>";
		rep+="<div class='news_post_date d-flex flex-row align-items-end justify-content-start'>";
		rep+="<div>"+listeEtapes[i].dateEtape+"</div>";
		rep+="</div>";
		rep+="<div class='news_post_title'><a target=_blank href='#'>"+listeEtapes[i].nomEtape+"</a></div>";
		rep+="<div class'news_post_category'>";
		rep+="<ul><li><a type='button' class='btn' style='color: red' onclick=\"lister('jour',' WHERE idEtape = "+$idEtape+"');\">plus de détail</a></li></ul></div>";
		rep+="<div class='news_post_text'>"
		rep+="<h4 style='color: black'>Disrciption</h4>"
		rep+="<p>"+listeEtapes[i].description+"</p>"
		rep+="</div></div></div>";
	}
	montrerEtape();
	document.getElementById('listeEtapes').innerHTML=rep;
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
	  +'src="../pageAdmin/images/'+listeJours[ligne].imgPrincipale+'" alt="Image circuit">'
	  +'<div class="card-body">'
		+'<h5 class="card-title">Etape: '+listeJours[ligne].nomJour+'</h5>'
	   +'</div>'
	  +'<ul class="list-group list-group-flush">'
		+'<li class="list-group-item">Debut: '+listeJours[ligne].dateJour+'</li>'
		+'<li class="list-group-item">Description: '+listeJours[ligne].descriptionJour+'</li>'
	  +'</ul>'
	  +'<button type="button" class="list-group-item bg-success btn btn-success" '
	  +'onclick="localStorage.setItem(\'idJour\',\''+listeJours[ligne].idJour+'\');'
	  +'listerDetailsJour(\'hebergement\',\''+conditionLister+'\');'
	  +'listerDetailsJour(\'restaurant\',\''+conditionLister+'\');'
	  +'listerDetailsJour(\'activite\',\''+conditionLister+'\');'
	  +'listerDetailsJour(\'imagejour\',\''+conditionLister+'\');">Voir details</button>'
	+'</div>'
	  +'</div>';
	}
	montrerJour();
	document.getElementById('listeJours').innerHTML=cardJour;
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
			  +'../pageAdmin/images/'+listeImgs[ligne].lienImage+'" alt="Card image cap">'
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





//A developper
//-------------------------------------------------------------------------------------------------------------------------
function afficherCheckout(listeCircuits){
	{
		var taille;
		var rep="";
		taille=listeCircuits.length;
		var taxTotal =0;
		var cartTotal = 0;
		for(var i=0; i<taille; i++) {
			var idCircuit = listeCircuits[i].idCircuit;
			var $prixCircuit = Number(listeCircuits[i].prixCircuit);
			cartTotal += $prixCircuit;
			rep += '<tr><td><img class="img-rounded" '+
				'src="../pageAdmin/images/' + listeCircuits[i].imgPrincipale + '" /></td><td>';
			rep += listeCircuits[i].nomCircuit;
			rep += '</td>\n' +
				'<td>' + listeCircuits[i].prixCircuit +'$'+'</td>\n';
		}
		rep += '<tr><td colspan="2">Total</td>'
			+'<td id="totalAPayer">'+cartTotal+'</td></tr>';
		localStorage.setItem("mntTotal",cartTotal);
		document.getElementById('bodyPmtTable').innerHTML=rep;
	}
}


//----------------------------------------------------------------------------------------------------------------------------
//Lister les etapes d'un circuit donnee
function listePanier(listeCircuits){
	var taille;
	var rep="";
	taille=listeCircuits.length;
	for(var i=0; i<taille; i++){
		var idCircuit = listeCircuits[i].idCircuit;
		rep+='<div class="news_post d-flex flex-md-row flex-column align-items-start justify-content-start">';
		rep+='<div class="news_post_image"><img src="../pageAdmin/images/'+listeCircuits[i].imgPrincipale+'" alt=""></div>';
		rep+='<div class="news_post_content">';
		rep+='<div class="news_post_date d-flex flex-row align-items-end justify-content-start">';
		rep+='<div>$'+listeCircuits[i].prixCircuit+'</div></div>';
		rep+='<div class="news_post_title"><a href="#">'+listeCircuits[i].nomCircuit+'</a></div>';
		rep+='<div class="news_post_category"><p>'+listeCircuits[i].dateDebutCircuit+'</p></div>';
		rep+='<div>Nombre de personnes : <input type="number" id="myNumber" value="1" min="0" max="10" >';
		rep+='</div><div class="news_post_text">';
		rep+='<button type="button" class="btn btn-danger" id="oterPanier" onclick="oterPanier('+idCircuit+')">Supprimer</button>';
		rep+='</div></div></div>';
	}
	rep+='<button type="button" class="btn btn-primary" id="caisse" onclick="montrerPagePmt();checkout('+idCircuit+');" );">Passer a la caisse</button>';
	document.getElementById('listePanier').innerHTML=rep;
}

function listerTranchesPmts(listeCircuits){
	var taille;
	var rep="";
	nbrTranchesPermises=listeCircuits[0].nombreTranches;
	for(var i=1; i<=nbrTranchesPermises; i++){
		rep+='<option >'+i+'</option>';
	}
	document.getElementById('nbrTranches').innerHTML=rep;
}
//onclick="window.open('http://localhost/royaltours/pageClient/checkout.html','popUpWindow','height=500,width=400,left=100,top=100,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no, status=yes');"

//Applique le nouveau montant en divisant le montant totale defacon egale
//sur le nombre de tranches voulues
function appliquerTranche(){
	var $nbrTranches = document.getElementById("nbrTranches").value;
	var $mntTotal = localStorage.getItem("mntTotal");
	console.log($nbrTranches);
	console.log($mntTotal);
	var $mntParTranche = $mntTotal / $nbrTranches;
	localStorage.setItem("nbrTranches",$nbrTranches);
	localStorage.setItem("mntParTranche",$mntParTranche);
	document.getElementById("totalAPayer").innerHTML = $mntParTranche;
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
			+'</div>'
			  +'</div>';
	}
	montrerDetailsJour();
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
			  +'../pageAdmin/images/'+listeImgs[ligne].lienImage+'" alt="Card image cap">'
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
		case "afficherCheckout":
			$('#panierModal').modal('hide');
			afficherCheckout(reponse.liste);
			break;
		case "inscription" :
		case "ajoutImgs" :
		case "enregistrer":
		case "supprimer" :
		case "modifier" :
		case "modifie" :
		case "ajoutPanier" :
			console.log(reponse);
			/* document.getElementById(reponse.idMsg).innerHTML=reponse.msg;
			setTimeout(function(){ 
				document.getElementById(reponse.idMsg).innerHTML="" }, 5000); */
		break;
		case "oterPanier":
			console.log(reponse);
			listerPanier();
		case "erreur":
			document.getElementById(reponse.idAlertErr).innerHTML=reponse.msg;
			rendreVisible(reponse.idAlertErr);
			break;
		case "succes":
			location.reload();
			localStorage.setItem('statut','connecte');
			localStorage.setItem('nomCltConnecte',reponse.nomClt);
			localStorage.setItem('idClt',reponse.idClt);
			veriferSiConnecter();
			break;
		case "listerSelect" :
			remplirSelectDpts(reponse.listeDepartement);
			break;
		case "connexion" :
			console.log(reponse);
			verifConnexion(reponse);
			break;
		case "listePanier" :
			listePanier(reponse.liste);
			break;
		case "listerTranchePmt" :
			console.log(reponse.liste);
			listerTranchesPmts(reponse.liste);
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
	}
}

