<?php 

$host = 'localhost';
$dbname = 'login';
$user = 'augustin';
$pass = 'admin';




$db = new PDO('mysql:host=localhost;dbname=login', $user, $pass);


// $loginInfo = $db->query('SELECT * FROM `connexion`') ;


// $pdoStat = $db->prepare('INSERT INTO contact VALUES (NULL, :ID, :username, :userpassword)');

// $userID = 3;
// $userName = 'Testinsert';
// $userUserpassword = 'mdpinsert';


// $pdoStat->bindValue(':ID', $userID, PDO::PARAM_INT);
// $pdoStat->bindValue(':username', $userName, PDO::PARAM_INT);
// $pdoStat->bindValue(':userpassword', $userPassword, PDO::PARAM_INT);

// $inserIsOk = $pdoStat->execute();


// if($inserIsOk)
// {
//     echo 'Ajouuté dans la bdd';
// }
// else
// {
//     echo 'fail';
// }
// ?>


