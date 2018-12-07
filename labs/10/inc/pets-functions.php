<?php

include "database.php";
    
function getPets()
{
    global $dbConn; 
    
    $dbConn = getDatabaseConnection();
    
    $sql = "SELECT * FROM pets WHERE 1 ORDER BY rand()";

    $statement = $dbConn->prepare($sql); 
    $statement->execute(); 
    $records = $statement->fetchAll(); 
    
    return $records; 
} 

?>