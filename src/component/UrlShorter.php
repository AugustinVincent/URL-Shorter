
<?php
session_start();

//Put the code into data base
//TODO
require_once '../http/Database.php';

$keyInfo = $db->query('SELECT * FROM `keyGenerator`') ;

if(isset($keyInfo))
{
        $keys =  $keyInfo->fetchAll();
}

$pdostat = $db -> prepare('INSERT INTO keyGenerator VALUES (NULL, :urls, :keys, :activated, :username, :stats, :urlName) ');

//check if field is empty

function keyGeneration()
{
    $possibilities = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $possibilities = str_shuffle($possibilities);
    $keyGenerated = substr($possibilities,0,4);

    $keyIsFree = true;
    foreach($keys as $key)
    {
        if($key['urlKey'] == $keyGenerated) 
        {
           $keyIsFree = false; 
           return keyGeneration();
        }
    }
    return $keyGenerated;
}

if(empty($_POST['urlToConvert']))
{
    header('location: ../../views/pages/404.php');
}

// If fields a complete we check if the key isn't already taken 

else
{
    //ajouter dans la base de donnée la clé
    //créer variable ex: url, key, status, stats, username
    $url = $_POST['urlToConvert'];
    $key = keyGeneration() ;
    $status = true;
    if(isset($_SESSION['username']))
    {
        $username = $_SESSION['username'];
    }
    else
    {
        $username = '';
    } 
    $stats = 0;
    $urlName = explode("://", $url);
    $urlName = explode(".", $urlName[1]);
    $urlName = $urlName[0];

    $pdostat->bindValue(':urls', $url, PDO::PARAM_STR); 
    $pdostat->bindValue(':keys', $key, PDO::PARAM_STR); 
    $pdostat->bindValue(':activated', $status, PDO::PARAM_BOOL); 
    $pdostat->bindValue(':username', $username, PDO::PARAM_STR); 
    $pdostat->bindValue(':stats', $stats, PDO::PARAM_INT);
    $pdostat->bindValue(':urlName', $urlName, PDO::PARAM_STR);
    
    $pdostat->execute();

    $_SESSION['returnUrl'] = 'localhost:8888/v.php?/=' . $key;

    var_dump($_SESSION['returnUrl']);
    header('location: ../../views/pages/' . $_GET['page'] . '.php');
}

    

// $keyinfo = $db->query('SELECT * FROM `keyGenerator`') ;

// $keys =  $keyinfo->fetchAll();


// 1. Create data base for keyGenerator
// # of columns : URL (var), key (var), status (bool)

//If code in data base, do it again (until key is unique)
//TODO

//New key has to bring us back to main URL(url in data base)
//TODO

?>