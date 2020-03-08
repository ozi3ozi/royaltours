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
		rendreInvisible("divConnexion");
		rendreInvisible("divInscription");
		rendreInvisible("navCote");
		rendreInvisible("ajoutCircuit");
		rendreInvisible("ajoutEtape");
		rendreInvisible("ajoutJour");
		rendreInvisible("detailsJour");
		rendreInvisible("listeInscrits");
		rendreInvisible("paiement");
}

function montrerConnexForm(){
	cacherTout();
	rendreVisible("divConnexion");
}

function montrerModalitesPmt(){
	cacherTout();
	rendreVisible("paiement");
}

function montrerListeInscrits(){
	cacherTout();
	rendreVisible("navCote");
	rendreVisible("listeInscrits");
}

function montrerDashboard(){
	cacherTout();
	rendreVisible("navCote");
}

function montrerAjoutCircuit(){
	cacherTout();
	rendreVisible("navCote");
	rendreVisible("ajoutCircuit");
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

function montrerAjoutEtape(){
	cacherTout();
	rendreVisible("navCote");
	rendreVisible("ajoutEtape");
}

function montrerAjoutJour(){
	cacherTout();
	rendreVisible("navCote");
	rendreVisible("ajoutJour");
}

function montrerDetailsJour(){
	cacherTout();
	rendreVisible("navCote");
	rendreVisible("detailsJour");
}

function veriferSiConnecter()
{
	if(localStorage.getItem("idEmploye") != 0)
	{
		cacherTout();
		rendreVisible("navCote");
	}
}

function deconnexion()
{
	localStorage.setItem("idEmploye",0);
	location.reload();
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