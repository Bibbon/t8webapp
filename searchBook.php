<?php
session_start();
include "apiGoogle.php";

try
{
	$bdd = new PDO('mysql:host=localhost;dbname=log210;charset=utf8', 'root', '');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

$code = $_POST["code"];


$req = $bdd->prepare('SELECT ISBN_code FROM books WHERE ISBN_code = ?');
$req->execute(array($code));
$donnees = $req->fetch();

if($donnees == null)
{
	$req = $bdd->prepare('SELECT ean FROM books WHERE ean = ?');
    $req->execute(array($code));
    $donnees = $req->fetch();
	
	if($donnees == null)
	{
		$req = $bdd->prepare('SELECT upc FROM books WHERE upc = ?');
        $req->execute(array($code));
        $donnees = $req->fetch();
		
		if($donnees == null)
	    {
		     //Book dosent exist in system
			 //Search Internet
			 $infos = rechercheLivre($code);
			 $_SESSION['isbn'] = $infos['isbn'];  
             $_SESSION['title'] = $infos['title'];  
             $_SESSION['author'] = $infos['author'];  
             $_SESSION['langue'] = $infos['langue'];  
             $_SESSION['publication'] = $infos['publication']; 
             $_SESSION['nb_pages'] = $infos['nb_pages'];
			 echo "Searching for your book on the internet...";
			 header("refresh:3; url = http://localhost/log210/comfirmBook.php");
			 exit();
	    }
	
	}

}


if($donnees != null)
{
	$code = $donnees['ISBN_code'];
	$req = $bdd->prepare('SELECT * FROM books WHERE ISBN_code = ?');
    $req->execute(array($code));
	$donnees = $req->fetch();
	
	$_SESSION['isbn'] = $donnees['ISBN_code'];  
    $_SESSION['title'] = $donnees['title'];  
    $_SESSION['author'] = $donnees['author'];   
    $_SESSION['nb_pages'] = $donnees['nb_pages'];
	echo "Someone already added this book before, retreiving information from data base...";
	header("refresh:3; url = http://localhost/log210/comfirmBook.php");
	exit();

}







$req->closeCursor();







?>