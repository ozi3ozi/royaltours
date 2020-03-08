<?php
session_start();
$current_url=$_SERVER['SERVER_NAME'].''.$_SERVER['REQUEST_URI'];
// echo $current_url; test du lien courant

//include("includes/config.php");
include("autoload.php");
include("includes/user.php");
include("Google/vendor/autoload.php");

include("Facebook/autoload.php");

use \Facebook\Facebook;

$user=new User();
//include_once(includes/config.php);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Royal Tours</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Travello template project">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
    <link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
    <link rel="stylesheet" type="text/css" href="styles/main_styles.css">
    <link rel="stylesheet" type="text/css" href="styles/responsive.css">
    <link rel="stylesheet" type="text/css" href="styles/elements.css">
    <script type="text/javascript" src="checkout/jss/checkoutScript.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <script src="https://www.paypal.com/sdk/js?client-id=Ab3Hb6HhYGv-dnXWE2KrO8HeNqFX-dMu3WWLHO-AIDcMPNfsch3gb5I1_IWikz0tm6Rw0p8_PRINqGo8"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>
    <script language="javascript" src="js/jquery-3.3.1.min.js"></script>
    <script language="javascript" src="js/fonctionsMontrerCacher.js"></script>
    <script language="javascript" src="MVC/RequetesModele.js"></script>
    <script language="javascript" src="MVC/ControleurVue.js"></script>
    <title>Royaltours Genie Logiciel</title>

    <link rel="stylesheet" type="text/css" href="styles/css.css">
<?php
	if(isset($_SESSION['user'])){
        echo "
            <script type=\"text/javascript\">
				localStorage.setItem('statut','connecte');
				localStorage.setItem('nomCltConnecte','Ilyas');
				localStorage.setItem('idClt','2');
            </script>
        ";
     }
?>

</head>
<body onload="lister('circuit',' WHERE `publier` =1');montrerCircuit(); veriferSiConnecter();">
<?php
	$fb = new Facebook([
	"app_id"=>"604902943674483",
	"app_secret"=>"be981f675619bbcdf201302fab259683",
	"default_graph_version"=>"v5.0",
]);
$helper= $fb->getRedirectLoginHelper();

//"https://tpconnection.000webhostapp.com/fb_callback.php"
$redirectUrl="https://localhost/RoyalToursV2/royaltours/pageClient/fb_callback.php";
$permissions=['email'];
$loginUrl=$helper->getLoginUrl($redirectUrl,$permissions);
?>
<div class="super_container">

    <!-- Header-->

    <header class="header">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="header_content d-flex flex-row align-items-center justify-content-start">
                        <div class="header_content_inner d-flex flex-row align-items-end justify-content-start">
                            <div><a href="index.html"><img src="images/logo.png" alt=""
                                                           style="height: 120px; background-color: white; opacity: 0.3;"></a>
                            </div>
                            <nav class="main_nav">
                                <ul class="d-flex flex-row align-items-start justify-content-start">
                                    <li class="connecte" style="display:none;"><a id="nomClient"
                                                                                  target=_blank href="#"
                                                                                  data-toggle="modal"
                                                                                  data-target="#profileModal"><i
                                            class="fa fa-fw fa-user"></i></a></li>
                                    <li class="active" onclick="lister('circuit',' WHERE `publier` =1');montrerCircuit(); veriferSiConnecter();"><a class="text-white" ><i class="fa fa-home" ></i> Acceuil</a></li>
                                    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><i
                                            class="fa fa-globe"></i> Circuits<span class="caret"></span></a>

                                        <ul class="dropdown-menu" style="background-color:azure">
                                            <li><a href="about.html" style="color: black">circuit-1</a></li>
                                            <li><a href="#" style="color: black">circuit-2</a></li>
                                            <li><a href="#" style="color: black">circuit-3</a></li>
                                        </ul>
                                    </li>
                                    <li class="connecte" style="display:none;"><a href="" data-toggle="modal"
                                                                                  data-target="#panierModal"
                                                                                  onclick="listerPanier();">
                                        <i class='fas fa-cart-arrow-down'></i> PanierS</a></li>
                                    <li class="deconnecte"><a href="Connexion_Inscription.html" data-toggle="modal"
                                                              data-target="#connexModal"><i
                                            class="fa fa-fw fa-user"></i> Connexion</a></li>

                                    <li><a href="contact.html"><i class="fa fa-fw fa-envelope"></i> Contact</a></li>
                                    <li class="connecte float-sm-right" style="display:none; margin-left:auto;">
                                        <a onclick="deconnecteClt();" class=" float-sm-right" href="logOut.php"><i
                                                class="fas fa-sign-out-alt"> </i> Deconnexion</a></li>
                                 <li style="color: white">
                                        
                                           <a  target=_blank onclick="listerlangue()"> <i class="fa fa-globe"></i>Langues</a>
                                            
                                            <script>
                                                function listerlangue(){
                                                    var lang = document.getElementById("google_translate_element");
                                                    if(lang.style.display=="none"){
                                                     lang.style.display="block";}
                                                    else{
                                                        lang.style.display="none";
                                                    }
                                                }
                                                
                                           
                                            
                                            </script>
                                        
                                        
                                        
                                    
                                    </li>
                                    <li id="google_translate_element" style="display:none;">
<!--                                <div ></div>-->


                                    <script type="text/javascript" >
                                    function googleTranslateElementInit() {
                                      new google.translate.TranslateElement({pageLanguage: 'fr'}, 'google_translate_element');
                                    }
                                    </script>
									<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

                                    
                                    </li>
								</ul>
                            </nav>

                            <!-- Hamburger -->

                            <div class="hamburger ml-auto">
                                <i class="fa fa-bars" aria-hidden="true"></i>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header_social d-flex flex-row align-items-center justify-content-start">
            <ul class="d-flex flex-row align-items-start justify-content-start">
                <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-behance" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
            </ul>
        </div>
    </header>

    <!-- Menu -->

    <!--
        <div class="menu">
            <div class="menu_header d-flex flex-row align-items-center justify-content-start">
                <div class="menu_logo"><a href="index.html">Travello</a></div>
                <div class="menu_close_container ml-auto"><div class="menu_close"><div></div><div></div></div></div>
            </div>
            <div class="menu_content">
                <ul>
                    <li><a href="inex.html">Home</a></li>
                    <li><a href="about.html">About us</a></li>
                    <li><a href="#">Services</a></li>
                    <li><a href="news.html">News</a></li>
                    <li><a href="contact.html">Contact</a></li>
                </ul>
            </div>
    -->
    <!--
            <div class="menu_social">
                <div class="menu_phone ml-auto">Call us: 00-56 445 678 33</div>
                <ul class="d-flex flex-row align-items-start justify-content-start">
                    <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-behance" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                </ul>
            </div>
    -->
</div>

<!-- Home -->

<div class="home">

    <!-- Home Slider -->
    <div class="home_slider_container">
        <div class="owl-carousel owl-theme home_slider">

            <!-- Slide -->
            <div class="owl-item">
                <div class="background_image" style="background-image:url(images/mazagan.jpg)"></div>
                <div class="home_slider_content_container">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="home_slider_content">
                                    <div class="home_title"><h2>Créateur des rêves</h2></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide -->
            <div class="owl-item">
                <div class="background_image" style="background-image:url(images/home_slider.jpg)"></div>
                <div class="home_slider_content_container">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="home_slider_content">
                                    <div class="home_title"><h2>Créateur des rêves</h2></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide -->
            <div class="owl-item">
                <div class="background_image" style="background-image:url(images/marrakech.jpg)"></div>
                <div class="home_slider_content_container">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="home_slider_content">
                                    <div class="home_title"><h2>Créateur des rêves</h2></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!--
                    <div class="home_page_nav">
                        <ul class="d-flex flex-column align-items-end justify-content-end">
                            <li><a href="#" data-scroll-to="#destinations">Offres<span>01</span></a></li>
                            <li><a href="#" data-scroll-to="#testimonials">
        Témoignages<span>02</span></a></li>
                            <li><a href="#" data-scroll-to="#news">Dernière<span>03</span></a></li>
                        </ul>
                    </div>
        -->
    </div>
</div>


<!--
              -----------------------------
              -----------------------------
                Page modale inscription
              -----------------------------
              -----------------------------
-->
<div class="modal fade" id="inscriModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <div class="modal-title text-light">Inscription</div>
                <button type="button" class="close text-danger" data-dismiss="modal">X</button>
            </div>
            <div class="modal-body">
                <div id="alertInscrp" class="alert alert-danger" role="alert"
                     style="display:none;"></div>
                <form method="POST" id="formInscriClt" name="formInscriClt">
                    <select id="sexe" name="sexe" class="form-control mb-2 col-5">
                        <option>Homme</option>
                        <option>Femme</option>
                    </select>
                    <br>
                    <br> <input type="text" name="nom" value="" size="30" placeholder="Nom"
                                class="form-control" required/>
                    <br> <input type="text" name="prenom" value="" size="30" placeholder="Prenom"
                                class="form-control" required/>
                    <br><label form="date">Date de naissance</label>
                    <br><input type="date" href="" name="ddn" value="" size="30"
                               class="form-control text-secondary" required/>
                    <br> <input type="email" name="email" value="" size="30" placeholder="Email"
                                class="form-control" required/>
                    <br> <input type="password" name="mdp" value="" size="30" placeholder="Mot de passe"
                                class="form-control" required/>
                    <br> <input type="password" name="mdpVerif" value="" size="30" placeholder="Mot de passe"
                                class="form-control" required/>
                    <br>
                    <div align="center" style="position: relative; margin: auto;">
                        <input type="button" onclick="inscrireClient('alertInscrp');"
                               value="Ajouter" name="ajouterUser" class="btn-primary"/>
                    </div>

                </form>


            </div>
        </div>
    </div>
</div>

<!--
              -----------------------------
              -----------------------------
                Page modale connexion
              -----------------------------
              -----------------------------
-->
<div class="modal fade" id="connexModal" onload="actuJson()">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <div class="modal-title text-light">Connexion</div>
                <button type="button" class="close text-danger" data-dismiss="modal">X</button>
            </div>
            <div class="modal-body" id="connexion">
                <div id="alertConnex" class="alert alert-danger" role="alert"
                     style="display:none;"></div>
                <form id="formConnex" name="formConnex" method="POST">

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" placeholder="nom@exemple.com" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="mdp">Mot de passe</label>
                        <input type="password" id="mdp" name="mdp" placeholder="*********" class="form-control">
                    </div>

                    <div align="center" style="position: relative; margin: auto;">
                        <input type="button" value="Connecter" name="connexion" class="btn-primary"
                               onclick="verifierConn('alertConnex');"/>
                        <ul>
                            <li><a href="*" class="nav-link " data-toggle="modal" data-target="#inscriModal"
                                   align="center" data-dismiss="modal">S'inscrir</a></li>
                        </ul>


                    </div>
					<div class="form-group">
				<a style="display:block;  text-align:center " href="g_callback.php"><img class="img-fluid" style="width:210px;" src="g.png"> </a>
			</div>
			<div class="form-group">
				<a style="display:block;  text-align:center " href="<?php echo $loginUrl; ?>"><img class="img-fluid" style="width:210px;" src="fb.png"> </a>
			</div>

                </form>


            </div>
        </div>
    </div>
</div>

<!--
          -----------------------------
          -----------------------------
            Page modale panier
          -----------------------------
          -----------------------------
-->


<div class="modal fade" id="panierModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <div class="modal-title text-light">Mon panier</div>
                <button type="button" id="mybtn" class="close text-danger" data-dismiss="modal">X</button>
            </div>
            <div class="modal-body" id="listePanier">

            </div>
        </div>
    </div>
</div>

<!--
          -----------------------------
          -----------------------------
            Page modale choix nombre
			de tranche de paiement
          -----------------------------
          -----------------------------
-->
<div class="modal fade" id="trancheModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <div class="modal-title text-light">Choisissez en combien de
					tranches vous voulez payer</div>
                <button type="button" id="mybtn" class="close text-danger" data-dismiss="modal">X</button>
            </div>
            <div class="modal-body" id="listeTranche">
				<select id="nbrTranches" name="nbrTranches" class="form-control mb-2 col-5">
                    </select>
				<button class="btn btn-primary" onclick="appliquerTranche();"
					data-dismiss="modal">Appliquer</button>
            </div>
        </div>
    </div>
</div>

<!--
              -----------------------------
              -----------------------------
                Page modale mon profile
              -----------------------------
              -----------------------------
-->
<div class="modal fade" id="profileModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <div class="modal-title text-light">Mon profile</div>
                <button type="button" class="close text-danger" data-dismiss="modal">X</button>
            </div>
            <div class="modal-body">
                <div id="alertInscrp" class="alert alert-danger" role="alert"
                     style="display:none;"></div>
                <form method="POST" id="formInscriClt" name="formInscriClt">
                    
                    <br><label >Nom</label>
                    <br> <input type="text" name="nom" value="" size="30" 
                                class="form-control" required/>
    <br><label >Prenom</label>
                    <br> <input type="text" name="prenom" value="" size="30" 
                                class="form-control" required/>
                    <br><label form="date">Date de naissance</label>
                    <br><input type="date" target=_blank href="" name="ddn" value="" size="30"
                               class="form-control text-secondary" required/>
     <br><label >Email</label>
                    <br> <input type="email" name="email" value="" size="30" placeholder="Email"
                                class="form-control" required/>
  <br><label >Nouveau mot de passe</label>
                    <br> <input type="password" name="mdp" value="" size="30" placeholder="Nouveau Mot de passe"
                                class="form-control" required/>
  <br><label >Confirmer le nouveau mot de passe</label>
                    <br> <input type="password" name="mdpVerif" value="" size="30" placeholder="Confirmer le nouveau Mot de passe"
                                class="form-control" required/>
                    <br><label >Montant total payé</label>


<br> <input type="password" name="mdpVerif" value="" size="30" 
                                class="form-control" required/>
                    <br><label form="">Montant total restant</label>
<br> <input type="password" name="mdpVerif" value="" size="30" 
                                class="form-control" required/>
                    <br>
                    <div align="center" style="position: relative; margin: auto;">
                        <input type="button" c="#"
                               value="Enregistrer" name="#" class="btn-primary"/>
                    </div>


                </form>




            </div>
        </div>
    </div>
</div>



<!-- Checkout -->

<div class="modal fade" id="checkoutModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <div class="modal-title text-light">Checkout</div>
                <button type="button" id="btnCloseCheckout" class="close text-danger" data-dismiss="modal">X</button>
            </div>
            <div class="modal-body" id="listeCheckout">

            </div>

        </div>
    </div>
</div>

<!-- Destinations -->

<div class="destinations" id="divCircuit">
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <div class="section_subtitle">des endroits tout simplement incroyables</div>
                <div class="section_title"><h2>Nos circuits</h2></div>
            </div>
        </div>
        <div class="row destinations_row">
            <div class="col">
                <div id="listeTousCircuit" class="row mt-3 ml-5">


                </div>
            </div>
        </div>
    </div>
</div>
<div id="divPmt">
<div id="divPmtTable" class="p-5 m-5">
	<table class="table table-striped">
    <thead>
      <tr>
        <th></th>
        <th>Produit</th>
        <th>Prix</th>
      </tr>
    </thead>
	 <tbody id="bodyPmtTable">
	 </tbody>
  </table>
	
</div>
<div class="text-center mb-2">
<button class="btn btn-primary center"  data-toggle="modal"
  data-target="#trancheModal" onclick="listerTranchePmt();">
	 Appliquer le paiement par tranches</button>
</div>
<div class="text-center" id="paypal-button-container"></div>
</div>

<!--iframe google maps-->
<div id="maps">

</div>

<!-- Liste des etapes d'un circuit donne -->
<div class='news' id="divEtapes">
    <div class='container'>
        <div class='row'>
            <button type="button" class="float-left btn btn-dark" onclick="montrerCircuit();"
            >Retour aux circuits
            </button>
        </div>
        <div class='row'>
            <div class='col-xl-16'>
                <div class='news_container' id="listeEtapes" align='center' style='position: relative; margin: auto;'>";

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Liste des jours d'une etape donnee -->
<div class="destinations" id="divJour">
    <div class="container">
        <button type="button" class="float-left btn btn-dark" onclick="montrerEtape();"
        >Retour aux etapes
        </button>
        <div class="row">
            <div class="col text-center">
                <div class="section_subtitle">des endroits tout simplement incroyables</div>
                <div class="section_title"><h2>Nos Jours</h2></div>
            </div>
        </div>
        <div class="row destinations_row">
            <div class="col">
                <div id="listeJours" class="row mt-3">


                </div>
            </div>
        </div>
    </div>
</div>

<!--Details du jour: Hebergements, Restaurants, activites et images-->
<div id="divDetailsJours">
    <div class="container mt-5">
        <div type="button" class="row float-left btn btn-dark" onclick="montrerJour();">
            Retour au Jours
        </div>
        <div class="row">
            <div class="col text-center">
                <div class="section_subtitle">des endroits tout simplement incroyables</div>
                <div class="section_title"><h2>Details du jour</h2></div>

                <a class="mx-auto" data-toggle="collapse" href="#multiCollapseDetailsHeberg" role="button"
                   aria-expanded="true" aria-controls="multiCollapseDetailsHeberg">
                    <h5 class="text-dark">Details hebergements
                        <img src="../pageAdmin/icones/defiler.jpg" alt=""/></h5></a>
                <a class="mx-auto" data-toggle="collapse" href="#multiCollapseDetailsResto" role="button"
                   aria-expanded="true" aria-controls="multiCollapseDetailsResto">
                    <h5 class="text-dark">Details restaurants
                        <img src="../pageAdmin/icones/defiler.jpg" alt=""/></h5></a>
                <a class="mx-auto" data-toggle="collapse" href="#multiCollapseDetailsActivite" role="button"
                   aria-expanded="false" aria-controls="multiCollapseDetailsActivite">
                    <h5 class="text-dark">Details activites
                        <img src="../pageAdmin/icones/defiler.jpg" alt=""/></h5></a>
                <a class="mx-auto" data-toggle="collapse" href="#multiCollapseDetailsImg" role="button"
                   aria-expanded="false" aria-controls="multiCollapseDetailsImg">
                    <h5 class="text-dark">Details images
                        <img src="../pageAdmin/icones/defiler.jpg" alt=""/></h5></a>
            </div>
        </div>


        <!--Details hebergement-->
        <div class="collapse multi-collapse" id="multiCollapseDetailsHeberg">
            <!--Liste Hebergements-->
            <div id="listeHebergements" class="row mt-3">


            </div>

        </div>

        <!--Details Restaurants-->
        <div class="collapse multi-collapse" id="multiCollapseDetailsResto">
            <!--Liste Restaurants-->
            <div id="listeRestos" class="row mt-3">


            </div>

        </div>

        <!--Details Activites-->
        <div class="collapse multi-collapse" id="multiCollapseDetailsActivite">
            <!--Liste Activites-->
            <div id="listeActivites" class="row mt-3">


            </div>

        </div>

        <!--Details Images-->
        <div class="collapse multi-collapse" id="multiCollapseDetailsImg">
            <!--Liste Images-->
            <div id="listeImages" class="row mt-3">


            </div>

        </div>

    </div>
</div>
<!-- Testimonials

<div class="testimonials" id="testimonials">
    <div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="images/plage.jpg" data-speed="0.8"></div>
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <div class="section_subtitle">des endroits tout simplement incroyables</div>
                <div class="section_title"><h2>Témoignages</h2></div>
            </div>
        </div>
        <div class="row testimonials_row">
            <div class="col">-->

<!-- Testimonials Slider
<div class="testimonials_slider_container">
    <div class="owl-carousel owl-theme testimonials_slider">-->

<!-- Slide
<div class="owl-item text-center">
    <div class="testimonial" >Lorem ipsum dolor sit amet, consectetur adipiscing elit. lobortis dolor. Cras placerat lectus a posuere aliquet. Curabitur quis vehicula odio.</div>
    <div class="testimonial_author">
        <div class="testimonial_author_content d-flex flex-row align-items-end justify-content-start">
            <div>consectetur,</div>
            <div>client</div>
        </div>
    </div>
</div> -->

<!-- Slide
<div class="owl-item text-center">
    <div class="testimonial">Lorem ipsum dolor sit amet, consectetur adipiscing elit. lobortis dolor. Cras placerat lectus a posuere aliquet. Curabitur quis vehicula odio.</div>
    <div class="testimonial_author">
        <div class="testimonial_author_content d-flex flex-row align-items-end justify-content-start">
            <div>consectetur,</div>
            <div>client</div>
        </div>
    </div>
</div> -->

<!-- Slide
<div class="owl-item text-center">
    <div class="testimonial">Lorem ipsum dolor sit amet, consectetur adipiscing elit. lobortis dolor. Cras placerat lectus a posuere aliquet. Curabitur quis vehicula odio.</div>
    <div class="testimonial_author">
        <div class="testimonial_author_content d-flex flex-row align-items-end justify-content-start">
            <div>consectetur,</div>
            <div>client</div>
        </div>
    </div>
</div>

</div>
</div>
</div>
</div>
</div>
<div class="test_nav">
<ul class="d-flex flex-column align-items-end justify-content-end">
<li><a href="#">Séjours<span>01</span></a></li>
<li><a href="#">Circuits<span>02</span></a></li>
<li><a href="#">All Inclusive Clients<span>03</span></a></li>
</ul>
</div>
</div>-->

<!-- News

<div class="news" id="news">
    <div class="container">
        <div class="row">
            <div class="col-xl-8">
                <div class="news_container">-->

<!-- News Post
<div class="news_post d-flex flex-md-row flex-column align-items-start justify-content-start">
    <div class="news_post_image"><img src="images/news_1.jpg" alt=""></div>
    <div class="news_post_content">
        <div class="news_post_date d-flex flex-row align-items-end justify-content-start">
            <div>02</div>
            <div>juin</div>
        </div>
        <div class="news_post_title"><a href="#">Désert -10%</a></div>
        <div class="news_post_category">
            <ul>
                <li><a href="#">style de vie et voyage</a></li>
            </ul>
        </div>
        <div class="news_post_text">
            <p>Pellentesque sit amet elementum ccumsan sit amet mattis eget, tristique at leo. Vivamus massa.Tempor massa et laoreet.</p>
        </div>
    </div>
</div>-->

<!-- News Post
<div class="news_post d-flex flex-md-row flex-column align-items-start justify-content-start">
    <div class="news_post_image"><img src="images/news_2.jpg" alt=""></div>
    <div class="news_post_content">
        <div class="news_post_date d-flex flex-row align-items-end justify-content-start">
            <div>01</div>
            <div>juin</div>
        </div>
        <div class="news_post_title"><a href="#">Mille iles et ile -10%</a></div>
        <div class="news_post_category">
            <ul>
                <li><a href="#">style de vie et voyage</a></li>
            </ul>
        </div>
        <div class="news_post_text">
            <p>Tempor massa et laoreet malesuada. Pellentesque sit amet elementum ccumsan sit amet mattis eget, tristique at leo.</p>
        </div>
    </div>
</div>-->

<!-- News Post
<div class="news_post d-flex flex-md-row flex-column align-items-start justify-content-start">
    <div class="news_post_image"><img src="images/news_3.jpg" alt=""></div>
    <div class="news_post_content">
        <div class="news_post_date d-flex flex-row align-items-end justify-content-start">
            <div>29</div>
            <div>mai</div>
        </div>
        <div class="news_post_title"><a href="#">Luxury Yachts -15%</a></div>
        <div class="news_post_category">
            <ul>
                <li><a href="#">style de vie et voyage</a></li>
            </ul>
        </div>
        <div class="news_post_text">
            <p>Vivamus massa.Tempor massa et laoreet malesuada. Aliquam nulla nisl, accumsan sit amet mattis.</p>
        </div>
    </div>
</div>

</div>
</div>-->

<!-- News Sidebar
<div class="col-xl-4">
    <div class="travello">
        <div class="background_image" style="background-image:url(images/travello.jpg)"></div>
        <div class="travello_content">
            <div class="travello_content_inner">
                <div></div>
                <div></div>
            </div>
        </div>
        <div class="travello_container">
            <a href="#">
                <div class="d-flex flex-column align-items-center justify-content-end">
                    <span class="travello_title">Sunset rabais de 20%</span>
                    <span class="travello_subtitle">Promotion du mois </span>
                </div>
            </a>
        </div>
    </div>
</div>

</div>
</div>
</div>

<-- Footer -->

<br><br>
<footer class="page-footer font-small blue pt-4" style="background-color: black; opacity: 0.5">
    <!--        <div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="images/footer.jpg" ></div>-->


    <!-- Footer Links -->
    <div class="container-fluid text-center text-md-left">


        <!-- Grid row -->
        <div class="row">


            <!-- Grid column -->
            <div class="col-md-6 mt-md-0 mt-3">


                <!-- Content -->
                <h5 class="text-uppercase">Les spécialiste des circuits sur mesure</h5>


            </div>
            <!-- Grid column -->


            <hr class="clearfix w-100 d-md-none pb-3">


            <!-- Grid column -->
            <div class="col-md-3 mb-md-0 mb-3">


                <!-- Links -->
                <h5 class="text-uppercase">Links</h5>


                <ul class="list-unstyled">
                    <li>
                        <a target=_blank href="#!">Link 1</a>
                    </li>
                    <li>
                        <a target=_blank href="#!">Link 2</a>
                    </li>
                    <li>
                        <a target=_blank href="#!">Link 3</a>
                    </li>
                    <li>
                        <a target=_blank href="#!">Link 4</a>
                    </li>
                </ul>


            </div>
            <!-- Grid column -->


            <!-- Grid column -->
            <div class="col-md-3 mb-md-0 mb-3">


                <!-- Links -->
                <h5 class="text-uppercase">Links</h5>


                <ul class="list-unstyled">
                    <li>
                        <a target=_blank href="#!">Link 1</a>
                    </li>
                    <li>
                        <a target=_blank href="#!">Link 2</a>
                    </li>
                    <li>
                        <a target=_blank href="#!">Link 3</a>
                    </li>
                    <li>
                        <a target=_blank href="#!">Link 4</a>
                    </li>
                </ul>


            </div>
            <!-- Grid column -->


        </div>
        <!-- Grid row -->


    </div>
    <!-- Footer Links -->


    <!-- Copyright -->
    <div class="footer-copyright text-center py-3" style="color: black">© 2019 Copyright:
        <a target=_blank href="https://mdbootstrap.com/education/bootstrap/"> royalToursss.com</a>
    </div>
    <!-- Copyright -->


</footer>
</div>

<script src="js/jquery-3.2.1.min.js"></script>
<script src="styles/bootstrap4/popper.js"></script>
<script src="styles/bootstrap4/bootstrap.min.js"></script>
<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="plugins/Isotope/isotope.pkgd.min.js"></script>
<script src="plugins/scrollTo/jquery.scrollTo.min.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="plugins/parallax-js-master/parallax.min.js"></script>
<script src="js/custom.js"></script>
</body>
</html>