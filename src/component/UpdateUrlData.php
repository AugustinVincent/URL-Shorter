<?php
require_once '../http/Database.php';


   
    $updateData = $db->prepare('UPDATE keyGenerator SET urlName=:urlName, urlStatus=:urlStatus  WHERE id=:urlId');


    foreach ($_POST['urlId'] as  $index => $url) {
        $updateData->bindValue(':urlName', $_POST['urlName'][$index]);
        $updateData->bindValue(':urlId', $_POST['urlId'][$index]);
        $updateData->bindValue(':urlStatus', $_POST['urlStatus'][$index]);
        if($updateData->execute())
        {
            echo 'yes urlname';
        }
        else{
            echo 'fail urlname';
        }
    }
    

    header('location: ../../views/pages/converturl.php')

?>