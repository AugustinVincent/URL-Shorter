<?php
    //  Get the file to connect to the database
    require_once '../http/Database.php';


    // Prepare the request to update in the database the url infos
    $updateData = $db->prepare('UPDATE keyGenerator SET urlName=:urlName, urlStatus=:urlStatus  WHERE id=:urlId');

    // Map on every urls that exist in the user account and replace every url data to the data set in the page when the user click on save changes button
    foreach ($_POST['urlId'] as  $index => $url) {
        // Set all the value of the request
        $updateData->bindValue(':urlName', $_POST['urlName'][$index]);
        $updateData->bindValue(':urlId', $_POST['urlId'][$index]);
        $updateData->bindValue(':urlStatus', $_POST['urlStatus'][$index]);
        // Execute the prepared request
        $updateData->execute();
    }
    // Finally redirected the user to the url manager page when the update has been done
    header('location: ../../views/pages/converturl.php')

?>