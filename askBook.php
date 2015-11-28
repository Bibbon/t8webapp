<?php
session_start();

try
{
	$bdd = new PDO('mysql:host=localhost;dbname=log210;charset=utf8', 'root', '');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

$id = $_POST["id"];


$req = $bdd->prepare('SELECT * FROM books WHERE id = ?');
$req->execute(array($id));
$donnees = $req->fetch();

$title = $donnees['title']; 
$owner = $donnees['owner'];
$price = $donnees['price'];
$condition = $donnees['book_condition'];

echo "Vous avez reserver: $title, au prix de $price dollars dans la condition: $condition a l'etudiant: $owner ";

$req = $bdd->prepare('INSERT INTO reservations(ISBN_code, EAN, UPC, title, author, nb_pages, price, book_condition, owner, reservation) VALUES(:ISBN_code, :EAN, :UPC, :title, :author, :nb_pages, :price, :book_condition, :owner, :reservation)');
$req->execute(array(
      'ISBN_code' => $donnees['ISBN_code'],
	  'EAN' => $donnees['EAN'],
	  'UPC' => $donnees['UPC'],
	  'title' => $donnees['title'],
	  'author' => $donnees['author'],
	  'nb_pages' => $donnees['nb_pages'],
	  'price' => $donnees['price'],
	  'book_condition' => $donnees['book_condition'],
	  'owner' => $donnees['owner'],
	  'reservation' => $_SESSION['login_user'],
	  ));

$req = $bdd->prepare('DELETE FROM books WHERE id = ?');
$req->execute(array($id));

$req->closeCursor();
header("refresh:5; url = http://localhost/log210/home.php");


?>
