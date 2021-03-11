<?php 

$user = 'augustin';
$pass = 'admin';
$db = new PDO('mysql:host=localhost;dbname=login', $user, $pass);

$loginInfo = $db->query('SELECT * FROM `user`') ;

$users =  $loginInfo->fetchAll();
$usersUsername = [];
foreach($users as $user){
    array_push($usersUsername, $user['username']);
}




$userName = $_POST['username'];
$userPassword = $_POST['userpassword'];
$pdoStat = $db->prepare('INSERT INTO user VALUES (NULL, :username, :userpassword)');

if(empty($userName) || empty($userPassword))
{
    header('location: ../../views/base.php');
}
else{
    $pdoStat->bindValue(':username', $userName, PDO::PARAM_STR);
    $pdoStat->bindValue(':userpassword', $userPassword, PDO::PARAM_STR);
    
    if($pdoStat->execute())
    {
        echo 'You are enregistred in our data base';
    }
    else
    {
        echo 'Failed';
    }
}

?>