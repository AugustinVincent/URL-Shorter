<?php 

session_start();
// Connect to the data base 
require_once '../http/Database.php';
unset($_SESSION['singup-error']);
$loginInfo = $db->query('SELECT * FROM `user`') ;

// get the existing usernames

if(isset($loginInfo))
{

    $users =  $loginInfo->fetchAll();
}

$pdoStat = $db->prepare('INSERT INTO user VALUES (NULL, :username, :userpassword)');

//  check if the fields are filled or not 
if(empty($_POST['username']) || empty($_POST['userpassword']) || strlen($_POST['username']) < 8 || strlen($_POST['userpassword']) < 8 || !str_contains($_POST['userpassword'], ' ') || !str_contains($_POST['username'], ' '))
{
    // If not the user stay on the signup page

    $_SESSION['singup-error'] = "Your sign in connections are wrong. Be sure that your username and your passsword has no white-space and that it contains at least 8 charcters";
    header('location: ../../views/pages/signup.php');
}
// If fields a complete we check if the username isn't already taken 
else{
    $usernameIsFree = true;
    foreach($users as $user)
    {
        if($user['username'] == $_POST['username'])
        {
            $usernameIsFree = false;
            var_dump($usernameIsFree);
        }
    }
    // If the username is free we insert the id informations in the db and connect the user
    if($usernameIsFree)
    {
        header('location: ../../views/pages/login.php');
        $pdoStat->bindValue(':username', $_POST['username'], PDO::PARAM_STR);
        $pdoStat->bindValue(':userpassword', $_POST['userpassword'], PDO::PARAM_STR);

        if($pdoStat->execute())
        {
            $_SESSION['username'] =  $_POST['username'];
            echo 'You are enregistred in our data base';
        }
        else
        {
            echo 'Failed';
        }
    }
    else{
        header('location: ../../views/pages/signup.php');
    }
    
        
}

?>