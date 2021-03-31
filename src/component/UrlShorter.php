
<?php
session_start();

//Connect to the data base
require_once '../http/Database.php';

// |Get all the existing urls with their unique keys
$keyInfo = $db->query('SELECT * FROM `keyGenerator`') ;

if(isset($keyInfo))
{
        $keys =  $keyInfo->fetchAll();
}

//  Prepare the request to add URL in the database with all the infos
$pdostat = $db -> prepare('INSERT INTO keyGenerator VALUES (NULL, :urls, :keys, :activated, :username, :stats, :urlName) ');


//  Function to generate a unique key
function keyGeneration()
{
    // Set all the caracteres usable in the key
    $possibilities = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    // Shuffle the sttring to have a random key
    $possibilities = str_shuffle($possibilities);
    // Get the 4 first caractesrs to make the key
    $keyGenerated = substr($possibilities,0,4);

    // Finally check is this key is already taken or not
    $keyIsFree = true;
    foreach($keys as $key)
    {
        if($key['urlKey'] == $keyGenerated) 
        {
            $keyIsFree = false; 
            //  IF the key already exist we call again the keyGeneration function to create a new key and check once more if the key already exist. With recursive the key is gonna be 
            //  regenerated until the key is unique. In this case we have  $possibilities lenght (62) ^ key lenght (4) === 62^4 = 14 776 336. 14millions of possibles urls is from far enough in our case
           return keyGeneration();
        }
    }
    //  If the key is unique we return this key 
    return $keyGenerated;
}

//  If the field is empty redirecte the user to the home apge
if(empty($_POST['urlToConvert']))
{
    header('location: ../../views/pages/home.php');
}

// If fields a complete we check if the key isn't already taken 

else
{
    // Get the url to convert from the user
    $url = $_POST['urlToConvert'];
    // Generate the unique key
    $key = keyGeneration() ;
    // Set the status to true to activate the url by default
    $status = true;
    //  If the user is connected set an user to the url to get those urls in the url manager
    if(isset($_SESSION['username']))
    {
        $username = $_SESSION['username'];
    }
    //  If he's not connected we set a empty username
    else
    {
        $username = '';
    } 
    //  Stats of the link are set by default at 0
    $stats = 0;
    // Set a default name to the url by taking the site domain name
    $urlName = explode("://", $url);
    $urlName = explode(".", $urlName[1]);
    if($urlName[0] === 'www')
        $urlName = explode(".", $urlName[1]);
    $urlName = $urlName[0];

    //  Set all the values to the prepared request
    $pdostat->bindValue(':urls', $url, PDO::PARAM_STR); 
    $pdostat->bindValue(':keys', $key, PDO::PARAM_STR); 
    $pdostat->bindValue(':activated', $status, PDO::PARAM_BOOL); 
    $pdostat->bindValue(':username', $username, PDO::PARAM_STR); 
    $pdostat->bindValue(':stats', $stats, PDO::PARAM_INT);
    $pdostat->bindValue(':urlName', $urlName, PDO::PARAM_STR);
    // Execute the request to add the url in the data base
    $pdostat->execute();
    // Create a return url var in SESSIOn to display it under the url converter field and then redirect the user to the page he came from
    $_SESSION['returnUrl'] = $_SERVER['HTTP_HOST'] . '/v.php?/='. $key;
    header('location: ../../views/pages/' . $_GET['page'] . '.php');
}


?>