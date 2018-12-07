<?php

    include '../inc/database.php'; 

    $dbConn = getDatabaseConnection(); 
    
    $sql = "SELECT * FROM `pets` WHERE name=:name"; 
    $statement = $dbConn->prepare($sql); 
    $statement->execute(array(':name' => $_GET['name']));

    $records = $statement->fetchAll(); 
    
    echo json_encode($records);
?>
