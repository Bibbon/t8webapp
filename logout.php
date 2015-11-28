<?php
session_start();
$user = $_SESSION['login_user'];
if(session_destroy()) // Destroying All Sessions
{
echo "Logout succesful $user! Redirecting in 3 seconds.";
header("refresh:3; url = http://localhost/log210/Index.html"); // Redirecting To Home Page
}
?>