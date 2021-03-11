<?php 
// Start the session to let acces of the serveur session to the file
session_start();
// clera the session
$_SESSION = array();
// redirect the user to the home page
header('location: ../../views/pages/home.php')
?>