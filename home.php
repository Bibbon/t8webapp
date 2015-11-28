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
		
		<h4>Ajouter un livre</h4>
		<form action="searchBook.php" method="post">
		<p>ISBN : <input type="text" name="code"></p> <br>
		<input type="submit" value="Ajouter"> <br><br>
		</form>
		
		<form action="reserveBook.php" method="post">
		<h4>Rechercher un livre</h4>
		<p>ISBN : <input type="text" name="code"></p> <br>
		<input type="submit" value="Rechercher">
		</form>
		</center>
		
		<p>
		<a href="Logout.php"><b>Logout</b></a>
	    </p>
	</div>	
	</body>
</html>