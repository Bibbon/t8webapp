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
$tel_num = $_POST["telephone"];



$req = $bdd->prepare('INSERT INTO students(email, tel_num, pass) VALUES(:email, :tel_num, :pass)');
$req->execute(array(
	'email' => $user,
	'tel_num' => $tel_num,
	'pass' => $pass,
	));

echo "Account Created! You will be redirected in 5 seconds";
header("refresh:5; url = http://localhost/log210/Login.html");
exit();

	
?>