<?php
session_start();
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=log210;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

$isbn = $_POST["code"];
$ean = $_POST["ean"];
$upc = $_POST["upc"];
$title = $_POST["title"];
$author = $_POST["author"];
$nb_pages = $_POST["pages"];
$price = $_POST["price"];
$condition = $_POST["condition"];
$owner = $_SESSION['login_user'];

$req = $bdd->prepare('INSERT INTO books(ISBN_code, EAN, UPC, title, author, nb_pages, price, book_condition, owner) VALUES(:ISBN_code, :EAN, :UPC, :title, :author, :nb_pages, :price, :book_condition, :owner)');
$req->execute(array(
      'ISBN_code' => $isbn,
	  'EAN' => $ean,
	  'UPC' => $upc,
	  'title' => $title,
	  'author' => $author,
	  'nb_pages' => $nb_pages,
	  'price' => $price,
	  'book_condition' => $condition,
	  'owner' => $owner,
	  ));

echo "Book Added! You will be redirected in 5 seconds";
header("refresh:5; url = http://localhost/log210/home.php");
exit();

	
?>