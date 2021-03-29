<?php
require_once 'src/http/Database.php';
$redirectUrlKey = $_GET["/"];

$urls = $db->query('SELECT * FROM `keyGenerator`');

$urls = $urls->fetchAll();

foreach($urls as $url)
{
   var_dump($url['urlStatus']);
    if($redirectUrlKey === $url['urlKey'] && $url['urlStatus'] == 1)
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