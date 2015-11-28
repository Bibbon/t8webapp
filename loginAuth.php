<?php

try
{
	$bdd = new PDO('mysql:host=localhost;dbname=log210;charset=utf8', 'root', '');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

$cond = TRUE;
$user = $_POST["username"];
$pass = $_POST["password"];

$req = $bdd->prepare('SELECT email, pass FROM students WHERE email = ?');
$req->execute(array($user));
$type = 0;


$donnees = $req->fetch();

if($donnees == null)
{
	$req = $bdd->prepare('SELECT email, tel_num, pass FROM students WHERE tel_num = ?');
    $req->execute(array($user));
    $donnees = $req->fetch();
	
	if($donnees == null){
	$req = $bdd->prepare('SELECT email, pass FROM coop WHERE email = ?');
    $req->execute(array($user));
    $donnees = $req->fetch();
		
       if($donnees == null)
	   {
	   //Account dosent exists
	   echo "Account does not exists! You will be redirected in 3 seconds.";
	   header("refresh:3; url = http://localhost/log210/Login.html");
	   $req->closeCursor();
       exit();
	   }
	   else{
		   $type = 1;
	   }
	}
}

//password verif
if($donnees['pass'] == $pass && $donnees != null && $type == 0)
{
    
	//aunthenticate student sucess
	session_start();
	$_SESSION['login_user']=$donnees['email'];
	echo "Login succesful! You will be redirected in 5 seconds.";
	header("refresh:3; url = http://localhost/log210/home.php");
	$req->closeCursor();
    exit();
}
else if($donnees['pass'] == $pass && $donnees != null && $type == 1)
{
	//aunthenticate Coop sucess
	session_start();
	$_SESSION['login_user']=$donnees['email'];
	echo "Login succesful! You will be redirected in 5 seconds.";
	header("refresh:3; url = http://localhost/log210/home_coop.php");
	$req->closeCursor();
    exit();
}
else if($donnees['pass'] != $pass && $donnees != null)
{
	//wrong password dawg
	echo "Wrong Password! You will be redirected in 3 seconds.";
	header("refresh:3; url = http://localhost/log210/Login.html");
	$req->closeCursor();
    exit();
}














?>