<?php 
// Start the session for the login system
session_start();
// Connect to the data base to check the ids
$host = 'localhost';
$dbname = 'login';
$user = 'root';
$pass = 'root';

// TEST

$db = new PDO('mysql:host=localhost;dbname=login', $user, $pass);

$loginInfo = $db->query('SELECT * FROM `user`') ;

if(isset($loginInfo))
    $users =  $loginInfo->fetchAll();
// If fields are empty, we get the user back to the login page
if(empty($_POST['username']) || empty($_POST['userpassword']))
{
    header('location: ../../views/pages/login.php');
    
}
// If fiels are filled then we check if the username correspond with one stocked in the data abse
else{
    foreach($users as $user){
        if($user['username'] == $_POST['username'] && $user['userpassword'] == $_POST['userpassword'])
        {
            // If the id's informations matches, we start a session called 'username' and give the value username then redirect the user to the home page
            $_SESSION['username'] =  $_POST['username'];
            header('location: ../../views/pages/home.php');
        }
        // If the id's informations doesn't match with any id informations in the date base, we make the user stay on the login page
        else{
            header('location: ../../views/pages/login.php');
        }
    }
}

?>