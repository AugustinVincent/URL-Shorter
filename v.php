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
   
    if($redirectUrlKey === $url['urlKey'] && $url['status']=== true)
    {
        $newStats = $url['stats'] + 1;
        $id = $url['id'];
        $upDateStats = $db->query("UPDATE keyGenerator SET stats = $newStats WHERE id = $id");
        echo $newStats;
        echo '<br>';
        echo $id;

        header('location: ' . $url['url']);

    }

    else
    {
        header('location: views/pages/404.php');
    }
}
    
?>