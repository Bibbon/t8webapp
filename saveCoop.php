<?php

try
{
	$bdd = new PDO('mysql:host=localhost;dbname=log210;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

$user = $_POST["user"];
$pass = $_POST["pass"];
$nomCoop = $_POST["nomCoop"];
$adresseCoop = $_POST["adresseCoop"];


$req = $bdd->prepare('INSERT INTO coop(email, coop_name, coop_address, pass) VALUES(:email, :coop_name, :coop_address, :pass)');
$req->execute(array(
	'email' => $user,
	'coop_name' => $nomCoop,
	'coop_address' => $adresseCoop,
	'pass' => $pass,
	));

echo "Account Created! You will be redirected in 5 seconds";
header("refresh:5; url = http://localhost/log210/Login.html");
exit();

	
?>