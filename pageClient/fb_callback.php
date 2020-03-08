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
$fb = new Facebook([
	"app_id"=>"604902943674483",
	"app_secret"=>"be981f675619bbcdf201302fab259683",
	"default_graph_version"=>"v5.0",
]);
$helper= $fb->getRedirectLoginHelper();
$accessToken=$helper->getAccessToken();
if(isset($accessToken)){
	$oAuth2Client=$fb->getOAuth2Client();
	$longLiveAccessToken=$oAuth2Client->getLongLivedAccessToken($accessToken);
	$fb->setDefaultAccessToken($longLiveAccessToken);
	
	
	$profile_req=$fb->get("/me?fields=name,email");
	$profile=$profile_req->getGraphNode()->asArray();
	
//	echo "<pre>";
//	print_r($profile);
//	echo "</pre>";
	
	
	if(!empty($profile)){
		$data=$user->getuser($profile['email']);
		if(!empty($data)){
			$_SESSION['user']=$data;
			 echo "
            <script type=\"text/javascript\">
				localStorage.setItem('statut','connecte');
				localStorage.setItem('nomCltConnecte',".$data->nomInscrit .");
				localStorage.setItem('idClt',".$data->idInscrit .");
				
				console.log('data');
            </script>
			";
			header("Location:index.php");
		}else{
			$user->social_register($profile['email'],$profile['name']);
		}
	}
}else{
	$_SESSION['error']="Access Cancelled";
	header("Location:index.php");
}


?>