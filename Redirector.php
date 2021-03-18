<?php
$host = 'localhost';
$dbname = 'url-shortener';
$user = 'root';
$pass = 'root';

$db = new PDO('mysql:host=localhost;dbname=url-shortener', $user, $pass);


$redirectUrlKey = $_GET["/"];

$urls = $db->query('SELECT * FROM `keyGenerator`');

$urls = $urls->fetchAll();

foreach($urls as $url)
{
   
    if($redirectUrlKey === $url['urlKey'])
    {
        header('location: ' . $url['url']);

    }

    else
    {
        header('location: views/pages/home.php');
    }
}
    
?>