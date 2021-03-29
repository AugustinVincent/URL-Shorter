<?php
require_once '../http/Database.php';


    $updatedata = $db->prepare('DELETE FROM keyGenerator WHERE id=:urlId');

    $updatedata->bindValue(':urlId', $_GET['getUrlId'], PDO::PARAM_STR);

    var_dump($_GET['getUrlId']);
    if($updatedata->execute())
    {
        echo 'deleted';
        var_dump($_GET['getUrlId'] );
    }
    else{
        echo 'fail delete';
    }

    header('location: ../../views/pages/converturl.php')

?>