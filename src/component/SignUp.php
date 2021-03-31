<?php 
// Start the session
session_start();
// Connect to the data base 
require_once '../http/Database.php';
// Delete the signup error message
unset($_SESSION['singup-error']);

// Get all our existing users in the data base
$loginInfo = $db->query('SELECT * FROM `user`') ;


// get the existing usernames
if(isset($loginInfo))
{

    $users =  $loginInfo->fetchAll();
}

// Prepare the request to add a user
$pdoStat = $db->prepare('INSERT INTO user VALUES (NULL, :username, :userpassword)');

//  check if the fields are filled or not 
if(empty($_POST['username']) || empty($_POST['userpassword']) || strlen($_POST['username']) < 8 || strlen($_POST['userpassword']) < 8 || !str_contains($_POST['userpassword'], ' ') || !str_contains($_POST['username'], ' '))
{
    // If not the user stay on the signup page and get a error message

    $_SESSION['singup-error'] = "Your sign in connexions are wrong. Be sure that your username and your passsword has no white-space and that it contains at least 8 characters";
    header('location: ../../views/pages/signup.php');
}
// If fields a complete we check if the username isn't already taken 
else{
    $usernameIsFree = true;
    //  If the fields are well filled, we check is the username is already taken or not 
    foreach($users as $user)
    {
        if($user['username'] == $_POST['username'])
        {
            $usernameIsFree = false;
        }
    }
    // If the username is free we insert the id informations in the db and connect the user
    if($usernameIsFree)
    {
        // Username is free so we set value to the prepared request
        $pdoStat->bindValue(':username', $_POST['username'], PDO::PARAM_STR);
        $pdoStat->bindValue(':userpassword', $_POST['userpassword'], PDO::PARAM_STR);
        //  finally execute the request and redirect to the login page to let the user connect
        $pdoStat->execute();
        header('location: ../../views/pages/login.php');
    }
    else{
        // If the username is already taken we redirected the user to the sign up page and displa an error message
        header('location: ../../views/pages/signup.php');
        $_SESSION['singup-error'] = "This username already exist";
    }
    
        
}

?>