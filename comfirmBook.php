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
		<h2>Veuillez comfirmer votre livre</h2>
		
		
		<form action="saveLivre.php" method="post">
		<p>ISBN : <input type="text" name="code" value="<?php echo $_SESSION['isbn']?>"></p> <br>
		<p>EAN : <input type="text" name="ean" value="ean"></p> <br>
		<p>UPC : <input type="text" name="upc" value="upc"></p> <br>
		<p>TITLE : <input type="text" name="title" value="<?php echo $_SESSION['title']?>"></p> <br>
		<p>AUTHOR : <input type="text" name="author" value="<?php echo $_SESSION['author']?>"></p> <br>
		<p>PAGES : <input type="number" name="pages" value="<?php echo $_SESSION['nb_pages']?>"></p> <br>
		<p>PRICE : <input type="number" name="price" placeholder="$$$"></p> <br>
		CONDITION : <select name="condition">		
		<option value="Like new">Like New</option>
		<option value="Good">Good</option>
		<option value="Acceptable">Acceptable</option>
		</select>
		<input type="submit" value="Comfirmer"> <br><br>
		</form>
		</center>
		
		<p>
		<a href="home.php"><b>Cancel</b></a>
	    </p>
	</div>	
	</body>
</html>