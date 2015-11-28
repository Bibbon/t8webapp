<?php
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
	    <link rel="stylesheet" type="text/css" href="style.css">
		<meta http-equiv="Content-Type content=" text/html; charset=UTF-8">
		<title>LOG210 Team-08</title>
	</head>
	<body>
	<div id="main">
	    <center>
		<h2>Livre</h2>
		
		<h4>R&eacute;ception</h4>
		<form action="searchBook.php" method="post">
		<p>Recherche par ISBN, UPC, titre du livre ou nom de l&#39;&eacute;tudiant : <input type="text" name="code"></p> <br>
		<input type="submit" value="Trouver les r&eacute;ception"> <br><br>
		</form>
		
		<form action="searchBook.php" method="post">
		<h4>Livraison</h4>
		<input type="submit" value="Voir les livraisons">
		</form>
		</center>
		
		<p>
		<a href="Logout.php"><b>Logout</b></a>
	    </p>
	</div>	
	</body>
</html>