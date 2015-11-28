<?php

header('Location: C:\Users\simongq\Desktop\TP LOG210\Index.html');

$username = $_POST['user'];
$password = $_POST['pass'];

echo file_get_contents("Index.html");

?>