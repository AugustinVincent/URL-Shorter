
<?php
//Code created randomly

//Put the code into data base
//TODO
$host = 'localhost';
$dbname = 'login';
$user = 'root';
$pass = 'root';

$db = new PDO('mysql:host=localhost;dbname=login', $user, $pass);

$keyInfo = $db->query('SELECT * FROM `keyGenerator`') ;

if(isset($keyInfo))
{
        $keys =  $keyInfo->fetchAll();
}

$pdostat = $db -> prepare('INSERT INTO keyGenerator VALUES (NULL, :urls, :keys, :activated, :username, :stats) ');

//check if field is empty

function keyGeneration()
{
    $possibilities = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $possibilities = str_shuffle($possibilities);
    $keyGenerated = substr($possibilities,0,4);

    $keyIsFree = true;
    foreach($keys as $key)
    {
        if($key['key'] == $keyGenerated) 
        {
           $keyIsFree = false; 
           return keyGeneration();
        }
    }
    return $keyGenerated;
}

if(empty($_POST['urlToConvert']))
{
    header('location: ../../views/pages/home.php');
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

    $pdostat->bindValue(':urls', $url, PDO::PARAM_STR); 
    $pdostat->bindValue(':keys', $key, PDO::PARAM_STR); 
    $pdostat->bindValue(':activated', $status, PDO::PARAM_BOOL); 
    $pdostat->bindValue(':username', $username, PDO::PARAM_STR); 
    $pdostat->bindValue(':stats', $stats, PDO::PARAM_INT);
    
    $pdostat->execute();
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
<p><?=$possibilities?></p>