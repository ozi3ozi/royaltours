
//Inscription client
function inscrireClient(idAlertErr){
	var form = new FormData(document.getElementById('formInscriClt'));
	form.append('action','inscriptionClt');
	form.append('idAlertErr',idAlertErr);
	console.log(form);
	$.ajax({
		type : 'POST',
		url : 'MVC/Controleur.php',
		crossDomain: true,
		data : form, //$('#formEnreg').serialize();
		dataType : 'json', //text pour le voir en format de string
		//async : false,
		//cache : false,
		contentType : false,
		processData : false,
		success : function (reponse){
					console.log(reponse);
					afficherVue(reponse);
		},
		fail : function (err){
		   
		}
	});
}

//Connexion employe
function verifierConn(idAlertErr){
	var form = new FormData(document.getElementById('formConnex'));
	form.append('idAlertErr',idAlertErr);
	form.append('action','connexion');
	$.ajax({
		type : 'POST',
		url : 'MVC/Controleur.php',
		crossDomain: true,
		data : form, //$('#formEnreg').serialize();
		dataType : 'json', //text pour le voir en format de string
		//async : false,
		//cache : false,
		contentType : false,
		processData : false,
		success : function (reponse){
					afficherVue(reponse);
		},
		fail : function (err){
		   
		}
	});
}

//Remplir le formulaire pour Modifier circuit, etape, jour, hebergement, 
//activite, ou restaurant
function remplirFormAModif(nomTable,idElemAModifier){
	var form = new FormData();
	form.append('action','modifier');
	form.append('nomTable',nomTable);
	form.append('idElemAModifier',idElemAModifier);
	console.log(form);
	$.ajax({
		type : 'POST',
		url : 'MVC/Controleur.php',
		crossDomain: true,
		data : form, //$('#formEnreg').serialize();
		dataType : 'json', //text pour le voir en format de string
		//async : false,
		//cache : false,
		contentType : false,
		processData : false,
		success : function (reponse){
					afficherVue(reponse);
		},
		fail : function (err){
		   
		}
	});
}

//lister CEJ: circuits, etapes, ou jours
function lister(nomTableALister,conditionLister){
	var form = new FormData();
	form.append('action','lister');
	form.append('nomTableALister',nomTableALister);
	form.append('condition',conditionLister);
	$.ajax({
		type : 'POST',
		url : 'MVC/Controleur.php',
		data : form,//{action:'lister'}
		contentType : false,
		processData : false,
		dataType : 'json', //text pour le voir en format de string
		success : function (reponse){
					afficherVue(reponse);
		},
		fail : function (err){
		}
	});
}

//-------------------------------------------------
//------------------------Jour---------------------
//-------------------------------------------------

//Ajout d'un jour
function ajouterPanier(idCircuit){
	var form = new FormData();
	form.append('action','ajoutPanier');
	form.append('idClt',localStorage.getItem('idClt'));
	form.append('idCircuit',idCircuit);
	console.log(form);
	$.ajax({
		type : 'POST',
		url : 'MVC/Controleur.php',
		crossDomain: true,
		data : form, 
		dataType : 'json', 
		contentType : false,
		processData : false,
		success : function (reponse){
					afficherVue(reponse);
					//location.reload();
					//rendrevisible("ajoutJour");
		},
		fail : function (err){
		   
		}
	});
}

function listerPanier(){
	var form = new FormData();
	form.append('action','listerPanier');
	form.append('nomTableALister','panier');
	form.append('idClt',localStorage.getItem('idClt'));
	$.ajax({
		type : 'POST',
		url : 'MVC/Controleur.php',
		data : form,//{action:'lister'}
		contentType : false,
		processData : false,
		dataType : 'json', //text pour le voir en format de string
		success : function (reponse){
					console.log(reponse);
					afficherVue(reponse);
		},
		fail : function (err){
		}
	});
}

//function qui affiche la page de checkout seulement
function checkout(montant){
	var form = new FormData();
	form.append('action','afficherCheckout');
	form.append('nomTableALister','panier');
	form.append('idClt',localStorage.getItem('idClt'));
	$.ajax({
		type : 'POST',
		url : 'MVC/Controleur.php',
		data : form,//{action:'lister'}
		contentType : false,
		processData : false,
		dataType : 'json', //text pour le voir en format de string
		success : function (reponse){
			console.log(reponse);
			afficherVue(reponse);
		},
		fail : function (err){
		}
	});
}

//Affiche le choix du nombre de tranches de paiement possibles selon 
//le choix de l'administrateur
function listerTranchePmt(){
	var form = new FormData();
	form.append('action','listerTranchePmt');
	$.ajax({
		type : 'POST',
		url : 'MVC/Controleur.php',
		data : form,//{action:'lister'}
		contentType : false,
		processData : false,
		dataType : 'json', //text pour le voir en format de string
		success : function (reponse){
			console.log(reponse);
			afficherVue(reponse);
		},
		fail : function (err){
		}
	});
}


//enlever element du panier
function oterPanier(idCircuit){
	var form = new FormData();
	form.append('action','oterPanier');
	form.append('idCircuit',idCircuit);
	form.append('idClt',localStorage.getItem('idClt'));
	$.ajax({
		type : 'POST',
		url : 'MVC/Controleur.php',
		data : form,//{action:'lister'}
		contentType : false,
		processData : false,
		dataType : 'json', //text pour le voir en format de string
		success : function (reponse){
					console.log(reponse);
					afficherVue(reponse);
		},
		fail : function (err){
		}
	});
}

//collecte des info pour ajouter l'hebergement a la table hebergement
function ajouterHebergeDansBD(){
	var form = new FormData();
	var type =document.getElementById('typeHebergement').value;
	var nom =document.getElementById('nomHeberge').value;
	var adresse = document.getElementById('adresseHeberge').value;
	var siteweb =document.getElementById('sitewebHeberge').value;
	var description =document.getElementById('descriptionHeberge').value;
	form.append('type',type);
	form.append('nom',nom);
	form.append('adresse',adresse);
	form.append('siteweb',siteweb);
	form.append('description',description);
	form.append('action','ajoutHeberge');
	ajouterHebergeInList(adresse);
	console.log(listeHebergements);
	console.log(form);
	
	$.ajax({
		type : 'POST',
		url : 'MVC/Controleur.php',
		crossDomain: true,
		data : form, 
		dataType : 'json', 
		contentType : false,
		processData : false,
		success : function (reponse){
					afficherVue(reponse);
		},
		fail : function (err){
		   
		}
	});
}

//Sauvegarde hebergements jour dans array
var listeHebergements = [];

function ajouterHebergeInList(adresseHeberge)
{
	if(listeHebergements.length>0)
		listeHebergements.push("newHeberge"+adresseHeberge);
	else
		listeHebergements.push(adresseHeberge);
	console.log(listeHebergements);
}
function viderListHeberge()
{
	listeHebergements = [];
	console.log(listeHebergements);
}

//collecte des info pour ajouter le restaurant dans la table restaurant
function ajouterRestoDansBD(){
	var form = new FormData();
	var type =document.getElementById('typeRepas').value;
	var nom =document.getElementById('nomResto').value;
	var adresse = document.getElementById('adresseResto').value;
	var siteweb =document.getElementById('sitewebResto').value;
	form.append('type',type);
	form.append('nom',nom);
	form.append('adresse',adresse);
	form.append('siteweb',siteweb);
	form.append('action','ajoutResto');
	ajouterRestoInList(adresse);
	console.log(listeRestos);
	console.log(form);
	
	$.ajax({
		type : 'POST',
		url : 'MVC/Controleur.php',
		crossDomain: true,
		data : form, 
		dataType : 'json', 
		contentType : false,
		processData : false,
		success : function (reponse){
					afficherVue(reponse);
		},
		fail : function (err){
		   
		}
	});
}

//Sauvegarde restos jour dans array
var listeRestos = [];

function ajouterRestoInList(adresseResto)
{
	if(listeRestos.length>0)
		listeRestos.push("newResto"+adresseResto);
	else
		listeRestos.push(adresseResto);
	console.log(listeRestos);
}
function viderListResto()
{
	listeRestos = [];
	console.log(listeRestos);
}

//collecte des info pour ajouter le restaurant dans la table restaurant
function ajouterActiviteDansBD(){
	var form = new FormData();
	var nom =document.getElementById('nomActivite').value;
	var adresse = document.getElementById('adresseActivite').value;
	var heureDebut =document.getElementById('heureDebutActivite').value;
	var heureFin =document.getElementById('heureFinActivite').value;
	var siteweb =document.getElementById('sitewebActivite').value;
	var description =document.getElementById('descriptionActivite').value;
	form.append('nom',nom);
	form.append('adresse',adresse);
	form.append('heureDebut',heureDebut);
	form.append('heureFin',heureFin);
	form.append('siteweb',siteweb);
	form.append('description',description);
	form.append('action','ajoutActivite');
	ajouterActiviteInList(adresse);
	console.log(listeActivites);
	console.log(form);
	
	$.ajax({
		type : 'POST',
		url : 'MVC/Controleur.php',
		crossDomain: true,
		data : form, 
		dataType : 'json', 
		contentType : false,
		processData : false,
		success : function (reponse){
					afficherVue(reponse);
		},
		fail : function (err){
		   
		}
	});
}

//Sauvegarde activites jour dans array
var listeActivites = [];

function ajouterActiviteInList(adresseActivite)
{
	if(listeActivites.length>0)
		listeActivites.push("newActivite"+adresseActivite);
	else
		listeActivites.push(adresseActivite);
	console.log(listeActivites);
}
function viderListActivite()
{
	listeActivites = [];
	console.log(listeActivites);
}

//Lister les hebergements, restaurants, ou activites d'un jour donne
function listerDetailsJour(nomTableALister,conditionLister){
	var form = new FormData();
	form.append('action','listerDetailsJour');
	form.append('nomTableALister',nomTableALister);
	form.append('condition',conditionLister);
	$.ajax({
		type : 'POST',
		url : 'MVC/Controleur.php',
		data : form,//{action:'lister'}
		contentType : false,
		processData : false,
		dataType : 'json', //text pour le voir en format de string
		success : function (reponse){
					console.log(reponse);
					afficherVue(reponse);
		},
		fail : function (err){
		}
	});
}

//-------------------------------------------------
//------------------------Fin Jour-----------------
//-------------------------------------------------

//supprimer circuit, activite, jour, hebergement, restaurant, activite, ou image
function supprimer(nomTable, idASupprimer, conditionSuppl){
	var form = new FormData();
	form.append('action','supprimer');
	form.append('nomTable',nomTable);
	form.append('idASupprimer',idASupprimer);
	form.append('conditionSuppl',conditionSuppl);
	$.ajax({
		type : 'POST',
		url : 'MVC/Controleur.php',
		data : form,//{action:'lister'}
		contentType : false,
		processData : false,
		dataType : 'json', //text pour le voir en format de string
		success : function (reponse){
					console.log(reponse);
					afficherVue(reponse);
		},
		fail : function (err){
		}
	});
}

function enlever(){
	var leForm=document.getElementById('formEnlever');
	var formFilm = new FormData(leForm);
	formFilm.append('action','enlever');//alert(formFilm.get("action"));
	$.ajax({
		type : 'POST',
		url : 'Films/filmsControleur.php',
		data : formFilm,//leForm.serialize(),
		contentType : false, //Enlever ces deux directives si vous utilisez serialize()
		processData : false,
		dataType : 'json', //text pour le voir en format de string
		success : function (reponse){//alert(reponse);
					afficherVue(reponse);
		},
		fail : function (err){
		}
	});
}

function obtenirFiche(){
	$('#divFiche').hide();
	var leForm=document.getElementById('formFiche');
	var formFilm = new FormData(leForm);
	formFilm.append('action','fiche');
	$.ajax({
		type : 'POST',
		url : 'Films/filmsControleur.php',
		data : formFilm,
		contentType : false, 
		processData : false,
		dataType : 'json', 
		success : function (reponse){//alert(reponse);
					afficherVue(reponse);
		},
		fail : function (err){
		}
	});
}

function modifier(){
	var leForm=document.getElementById('formFicheF');
	var formFilm = new FormData(leForm);
	formFilm.append('action','modifier');
	$.ajax({
		type : 'POST',
		url : 'Films/filmsControleur.php',
		data : formFilm,
		contentType : false, 
		processData : false,
		dataType : 'json', 
		success : function (reponse){//alert(reponse);
					$('#divFormFiche').hide();
					afficherVue(reponse);
		},
		fail : function (err){
		}
	});
}