<?php
session_start();
error_reporting(0);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$current_url=$_SERVER['SERVER_NAME'].''.$_SERVER['REQUEST_URI'];
// echo $current_url; test du lien courant


include("autoload.php");
include("includes/user.php");

 //google api
include("Google/vendor/autoload.php");
$user=new User();



// l'existance du cookie ou de la session 


$client= new Google_Client();
$client->setClientId("359374865059-kiamnv5mcq97dmh5v60si56r5mvpsck1.apps.googleusercontent.com");
$client->setClientSecret("MqPFeOuPQglynGxGQ57Ts01V");
$client->setRedirectUri("http://localhost/RoyalToursV2/royaltours/pageClient/g_callback.php");
$client->addScope("email");
$client->addScope("profile");

$service=new Google_Service_Oauth2($client);
if(!isset($_GET['code'])){
$url= $client->createAuthUrl();
//echo $url;
header("Location:".$url);
			
}else{
	$client->authenticate($_GET['code']);
	$_SESSION['access_token']=$client->getAccessToken($_GET['code']);
}


if(isset($_SESSION['access_token']) && $_SESSION['access_token']){
	$client->setAccessToken($_SESSION['access_token']);
}
else{
	
	$url=$client->createAuthUrl();
}


	$g=$service->userinfo->get();
	$data=$user->getuser($g->email);
	if(!empty($data)){
		$_SESSION['user']=$data;
		header("Location:index.php");
	}else{
		$user->social_register($g->email,$g->givenName);
	}



?>