<?php
    // Get the file to get acces to data base
    require_once '../http/Database.php';

    // Prepare the request to delete the line
    $updatedata = $db->prepare('DELETE FROM keyGenerator WHERE id=:urlId');
    // Set the value of the id to delete the right line
    $updatedata->bindValue(':urlId', $_GET['getUrlId'], PDO::PARAM_STR);
    // Execute the prepared request and get the user back to the page
    $updatedata->execute();
    header('location: ../../views/pages/converturl.php');

?>