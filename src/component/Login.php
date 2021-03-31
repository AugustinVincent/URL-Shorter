<?php 
// Start the session for the login system
session_start();
// Delete the login error message
unset($_SESSION['login-error']);
// Connect to the data base to check the ids
require_once '../http/Database.php';
$loginInfo = $db->query('SELECT * FROM `user`') ;

// Get all the infos from the database of users accounts
if(isset($loginInfo))
    $users =  $loginInfo->fetchAll();

// If fields are empty, we get the user back to the login page
if(empty($_POST['username']) || empty($_POST['userpassword']))
{
    // Set the message error and redirect to the login page
    $_SESSION['login-error'] = "Your sign in connections are wrong. Be sure that your username and your passsword has no white-space and that it contains at least 8 charcters";
    header('location: ../../views/pages/login.php');
    
}
// If fiels are filled then we check if the username correspond with one stocked in the data abse
else{
    //  Map on the data base to check on each users acounts
    foreach($users as $user){
        if($user['username'] == $_POST['username'] && $user['userpassword'] == $_POST['userpassword'])
        {
            // If the id's informations matches, we start a session called 'username' and give the value username then redirect the user to the home page
            $_SESSION['username'] =  $_POST['username'];
            header('location: ../../views/pages/home.php');
        }
        // If the id's informations doesn't match with any id informations in the date base, we make the user stay on the login page
        else{
            $_SESSION['login-error'] = "You username or your password is wrong";
            header('location: ../../views/pages/login.php');
        }
    }
}

?>