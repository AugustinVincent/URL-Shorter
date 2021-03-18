<?php 
// Connect to the data base 
$host = 'localhost';
$dbname = 'login';
$user = 'root';
$pass = 'root';

$db = new PDO('mysql:host=localhost;dbname=login', $user, $pass);

$loginInfo = $db->query('SELECT * FROM `user`') ;

// get the existing usernames

if(isset($loginInfo))
{

    $users =  $loginInfo->fetchAll();
}

$pdoStat = $db->prepare('INSERT INTO user VALUES (NULL, :username, :userpassword)');

//  check if the fields are filled or not 
if(empty($_POST['username']) || empty($_POST['userpassword']))
{
    // If not the user stay on the signup page
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