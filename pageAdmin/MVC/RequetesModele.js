//remplir select departement
function remplirSelectDpt(){
	var form = new FormData();
	form.append('action','listerSelect');//alert(formFilm.get("action"));
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
//Inscription employe
function inscrireEmploye(idAlertErr){
	var form = new FormData(document.getElementById('formInscription'));
	form.append('action','inscription');
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
					afficherVue(reponse);
		},
		fail : function (err){
		   
		}
	});
}

//Connexion employe
function verifInfoConnex(idAlertErr){
	var form = new FormData(document.getElementById('formConnexion'));
	form.append('action','connexion');
	form.append('idAlertErr',idAlertErr);
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

//Appliquer le nombre de tranche de paiement permises pour payer un achat en totalite
//Inscription employe
function appliquerModalitesPmt(){
	var form = new FormData();
	$tranchePmt = document.getElementById('tranchePmt').value;
	form.append('action','tranchePmt');
	form.append('tranchePmt',$tranchePmt);
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

//collecte des info pour ajouter l'image a la table imgcircuit ou imageetape
//ou imagejour et dans le dossier images du site
function ajouterImgDansBD(idTagInputImg){
	var imgInfos = document.getElementById(idTagInputImg).files[0];
	var nomImg = imgInfos.name;
	console.log(imgInfos);
	ajouterImgInList(nomImg);
	
	var form = new FormData();
	form.append('action',idTagInputImg);
	form.append('imgInfos',imgInfos);
	form.append('nomImg',nomImg);
	
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

//Sauvegarde images circuit dans array
var listeImgCEJ = [];

function ajouterImgInList(nomImg)
{
	if(listeImgCEJ.length>0)
		listeImgCEJ.push("newImg"+nomImg);
	else
		listeImgCEJ.push(nomImg);
	console.log(nomImg);
}
function viderListImg()
{
	listeImgCEJ = [];
	console.log(listeImgCEJ);
}

//Ajout d'un circuit
function ajoutCircuit(){
	var form = new FormData(document.getElementById('formAjoutCircuit'));
	form.append('action','ajoutCircuit');
	form.append('idAdmin',localStorage.getItem('idEmploye'));
	form.append('listImgs',listeImgCEJ);
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
					montrerAjoutCircuit();
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

//ajout promotion
function ajoutPromo(){
	var form = new FormData(document.getElementById('formAjoutPromo'));
	form.append('action','ajoutPromoCircuit');
	form.append('id',localStorage.getItem('idCircuit'))	;
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
					lister('circuit',' ');
					montrerAjoutCircuit();
		},
		fail : function (err){
		   
		}
	});
}

//Oter promotion
function otePromo(){
	var form = new FormData();
	form.append('action','otePromoCircuit');
	form.append('id',localStorage.getItem('idCircuit'))	;
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
					lister('circuit',' ');
					montrerAjoutCircuit();
		},
		fail : function (err){
		   
		}
	});
}

//publier Circuit
function publier(idCircuit){
	var form = new FormData();
	form.append('action','publierCircuit');
	form.append('id',idCircuit)	;
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
					lister('circuit',' ');
					montrerAjoutCircuit();
		},
		fail : function (err){
		   
		}
	});
}

//Depublier circuit	
function depublier(idCircuit){
	var form = new FormData();
	form.append('action','depublierCircuit');
	form.append('id',idCircuit)	;
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
					lister('circuit',' ');
					montrerAjoutCircuit();
		},
		fail : function (err){
		   
		}
	});
}

//Modifier circuit
function modifCircuit(){
	var form = new FormData(document.getElementById('formModifierCircuit'));
	form.append('action','modifierCircuit');
	form.append('listImgs',listeImgCEJ);
	//pour ajouter une table circuitmodifieAdmin avec idCircuit idAdmin et timeStamp
	//form.append('idAdmin',localStorage.getItem('idEmploye'));
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

//Modifier Jour
function modifJour(){
	var form = new FormData(document.getElementById('formModifJour'));
	form.append('action','modifierJour');
	//pour ajouter une table circuitmodifieAdmin avec idCircuit idAdmin et timeStamp
	//form.append('idAdmin',localStorage.getItem('idEmploye'));
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

//Modifier Hebergement
function modifHeberge(){
	var form = new FormData(document.getElementById('formModifHeberge'));
	form.append('action','modifierHeberge');
	//pour ajouter une table circuitmodifieAdmin avec idCircuit idAdmin et timeStamp
	//form.append('idAdmin',localStorage.getItem('idEmploye'));
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

//Modifier Restaurant
function modifResto(){
	var form = new FormData(document.getElementById('formModifResto'));
	form.append('action','modifierResto');
	//pour ajouter une table circuitmodifieAdmin avec idCircuit idAdmin et timeStamp
	//form.append('idAdmin',localStorage.getItem('idEmploye'));
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

//Modifier Activite
function modifActivite(){
	var form = new FormData(document.getElementById('formModifActivite'));
	form.append('action','modifierActivite');
	//pour ajouter une table circuitmodifieAdmin avec idCircuit idAdmin et timeStamp
	//form.append('idAdmin',localStorage.getItem('idEmploye'));
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

//Ajout d'une etape
function ajoutEtape(){
	var form = new FormData(document.getElementById('formAjoutEtape'));
	form.append('action','ajoutEtape');
	form.append('idCircuit',localStorage.getItem('idCircuit'));
	form.append('listImgs',listeImgCEJ);
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
					//location.reload();
					console.log(localStorage.getItem('idCircuit'));
					console.log('etape');
					lister('etape',getConditionLister('idCircuit'));
					montrerAjoutEtape();
		},
		fail : function (err){
		   
		}
	});
}

//Modifier etape
function modifEtape(){
	var form = new FormData(document.getElementById('formModifEtape'));
	form.append('action','modifierEtape');
	form.append('listImgs',listeImgCEJ);
	//pour ajouter une table circuitmodifieAdmin avec idCircuit idAdmin et timeStamp
	//form.append('idAdmin',localStorage.getItem('idEmploye'));
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


//lister CEJ: circuits, etapes, ou jours, ou inscrits
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
function ajoutJour(){
	var form = new FormData(document.getElementById('formAjoutJour'));
	form.append('action','ajoutJour');
	form.append('idEtape',localStorage.getItem('idEtape'));
	form.append('listImgs',listeImgCEJ);
	form.append('listeHebergements',listeHebergements);
	form.append('listeRestos',listeRestos);
	form.append('listeActivites',listeActivites);
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
					lister('jour',getConditionLister('idEtape'));
					montrerAjoutJour();
		},
		fail : function (err){
		   
		}
	});
}

//Modifier Jour
function modifJour(){
	var form = new FormData(document.getElementById('formModifJour'));
	form.append('action','modifierJour');
	form.append('listImgs',listeImgCEJ);
	form.append('listeHebergements',listeHebergements);
	form.append('listeRestos',listeRestos);
	form.append('listeActivites',listeActivites);
	//pour ajouter une table circuitmodifieAdmin avec idCircuit idAdmin et timeStamp
	//form.append('idAdmin',localStorage.getItem('idEmploye'));
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


//collecte des info pour ajouter l'hebergement a la table hebergement
function ajouterHebergeDansBD(modif){
	var form = new FormData();
	var type =document.getElementById('typeHebergement'+modif).value;
	var nom =document.getElementById('nomHeberge'+modif).value;
	var adresse = document.getElementById('adresseHeberge'+modif).value;
	var siteweb =document.getElementById('sitewebHeberge'+modif).value;
	var description =document.getElementById('descriptionHeberge'+modif).value;
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
function ajouterRestoDansBD(modif){
	var form = new FormData();
	var type =document.getElementById('typeRepas'+modif).value;
	var nom =document.getElementById('nomResto'+modif).value;
	var adresse = document.getElementById('adresseResto'+modif).value;
	var siteweb =document.getElementById('sitewebResto'+modif).value;
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
function ajouterActiviteDansBD(modif){
	var form = new FormData();
	var nom =document.getElementById('nomActivite'+modif).value;
	var adresse = document.getElementById('adresseActivite'+modif).value;
	var heureDebut =document.getElementById('heureDebutActivite'+modif).value;
	var heureFin =document.getElementById('heureFinActivite'+modif).value;
	var siteweb =document.getElementById('sitewebActivite'+modif).value;
	var description =document.getElementById('descriptionActivite'+modif).value;
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

//ajouter un image a partir de la page details
function ajoutImgsDetail(tableImg, idCEJ, tableLigneImg){
	var form = new FormData();
	form.append('action','ajoutImgs');
	form.append('tableImg',tableImg);
	form.append('idCEJ',idCEJ);
	form.append('tableLigneImg',tableLigneImg);
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

//supprimer inscrit, circuit, activite, jour, hebergement, restaurant, activite, ou image
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