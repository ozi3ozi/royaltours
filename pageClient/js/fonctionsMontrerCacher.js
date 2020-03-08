function rendreVisible(elem){
	document.getElementById(elem).style.display='block';
}

function rendreInvisible(elem){
	document.getElementById(elem).style.display='none';
}

function rendreVisibleClass(nomClass){
	var elemsAMontrer = document.getElementsByClassName(nomClass);
	for(var count=0; count<elemsAMontrer.length; ++count){
		elemsAMontrer[count].style.display = "initial"; 
	}
}

function rendreInvisibleClass(nomClass){
	var elemsACacher = document.getElementsByClassName(nomClass);
	for(var count=0; count<elemsACacher.length; ++count){
		elemsACacher[count].style.display = "none"; 
	}
}

function cacherTout()
{
		rendreInvisible("divCircuit");
		rendreInvisible("divEtapes");
		rendreInvisible("divJour");
		rendreInvisible("divDetailsJours");
		rendreInvisible("divPmt");
}

function montrerPagePmt(){
	cacherTout();
	rendreVisible("divPmt");
}

function montrerCircuit(){
	cacherTout();
	rendreVisible("divCircuit");
}

function montrerEtape(){
	cacherTout();
	rendreVisible("divEtapes");
}

function montrerJour(){
	cacherTout();
	rendreVisible("divJour");
}

function montrerDetailsJour(){
	cacherTout();
	rendreVisible("divDetailsJours");
}

function setAjoutOurLister(elem){
	localStorage.setItem('ajoutOuList',elem);
}

function getAjoutOurLister(){
	return localStorage.getItem('ajoutOuList');
}

function montrerElemsAjoutOuList(){
	if(getAjoutOurLister() == 'ajout'){
		rendreVisibleClass('ajoutCircuit');
		rendreInvisibleClass('listeCircuit');
	}else if(getAjoutOurLister() == 'lister'){
		rendreVisibleClass('listeCircuit');
		rendreInvisibleClass('ajoutCircuit');
	}
}

function montrerElemsListeCircuit(){
	rendreVisibleClass('listeCircuit');
	rendreInvisibleClass('ajoutCircuit');
}

function getNomClt(){
	return localStorage.getItem('nomCltConnecte');
}

function veriferSiConnecter()
{
	var nomClt = getNomClt();
	if(localStorage.getItem("statut") == "connecte")
	{
		
		document.getElementById('nomClient').innerHTML='Bonjour '+nomClt;
		rendreInvisibleClass('deconnecte');
		rendreVisibleClass('connecte');
	}else{
		rendreInvisibleClass('connecte');
		rendreVisibleClass('deconnecte');
	}
}

function deconnecteClt(){
	localStorage.setItem("statut","deconnecte");
}

function deconnexion()
{
	localStorage.setItem("idEmploye",0);
}

function validerNum(elem){
	var num=document.getElementById(elem).value;
	var numRegExp=new RegExp("^[0-9]{1,4}$");
	if(num!="" && numRegExp.test(num))
		return true;
	return false;
}

function valider(){
	var num=document.getElementById('num').value;
	var titre=document.getElementById('titre').value;
	var duree=document.getElementById('duree').value;
	var res=document.getElementById('res').value;
	var numRegExp=new RegExp("^[0-9]{1,4}$");
	if(num!="" && titre!="" && duree!="" && res!="")
		if(numRegExp.test(num))
			return true;
	return false;
}

function getConditionLister(cle){
	$condition = ' WHERE '+cle+' =';
	$condition += localStorage.getItem(cle);
	return $condition;
}
//Cas d'un button
/*
function valider(){
	var formEnreg=document.getElementById('formEnreg');
	var num=document.getElementById('num').value;
	var titre=document.getElementById('titre').value;
	var duree=document.getElementById('duree').value;
	var res=document.getElementById('res').value;
	var numRegExp=new RegExp("^[0-9]{1,4}$");
	if(num!="" && titre!="" && duree!="" && res!="")
		if(numRegExp.test(num))
			formEnreg.submit();
}
*/