<?php
class User extends mysqli{
    function __construct()
    {
        Parent::__construct("localhost","root","","royaltours");
        if ($this->connect_error) {
            $_SESSION['error']="DB connection problem !!". $this->connect_error;
            return;
    }
}

public function getuser($email){
 $q="SELECT *FROM inscrit WHERE email='$email'" ;  
 $res=$this->query($q);
 $row=$res->fetch_object();
 return $row;
}

public function getuserById($id){
    $q="SELECT *FROM inscrit WHERE idInscrit='$id'" ;  
    $res=$this->query($q);
    $row=$res->fetch_object();
    return $row;
   }

		public function social_register($email,$name){
		$pass=password_hash($name,PASSWORD_DEFAULT);
		$q="INSERT INTO inscrit(nomInscrit,prenomInscrit,date,genre,email,motPasse) VALUES ('$name','$name','0','NA','$email','$pass')";
        $res=$this->query($q);
		echo "
            <script type=\"text/javascript\">
				localStorage.setItem('statut','connecte');
				localStorage.setItem('nomCltConnecte',".$name .");
				localStorage.setItem('idClt',".$email .");
				console.log('data');
            </script>
			";
         if($res){
             $user=$this->getuser($email);
             $_SESSION['user']=$user;
			 
         }else{
             $_SESSION['error']="Une erreur quelque part social Media";
         }
		 header("Location:index.php");
	}





}

?>