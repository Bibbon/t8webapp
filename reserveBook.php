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

$code = $_POST["code"];


$req = $bdd->prepare('SELECT ISBN_code FROM books WHERE ISBN_code = ?');
$req->execute(array($code));
$donnees = $req->fetch();

if($donnees == null)
{
   echo "Il n'y aucun livre disponible sous ce code.";
   header("refresh:3; url = http://localhost/log210/home.php");
}

if($donnees != null)
{
	$code = $donnees['ISBN_code'];
	$req = $bdd->prepare('SELECT * FROM books WHERE ISBN_code = ?');
    $req->execute(array($code));
	
	while ($donnees = $req->fetch()){
	?>
	<form action="askBook.php" method="post">
	<p>
    <strong>Livre</strong> : <?php echo $donnees['title']; ?><br />
	L'auteur ce livre est : <?php echo $donnees['author']; ?> et il comporte <?php echo $donnees['nb_pages']; ?> pages.<br />
    Le proprietaire de ce livre est : <?php echo $donnees['owner']; ?>, et il le vend <?php echo $donnees['price']; ?> dollars dans la condition: <?php echo $donnees['book_condition']; ?> <br />
   </p>
   <input type="hidden" name="id" value="<?php echo $donnees['id']; ?>" />
   <input type="submit" value="Reserver" />
   </form>
   <?php
	}
}







$req->closeCursor();







?>