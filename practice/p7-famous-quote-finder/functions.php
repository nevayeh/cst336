<?php

include_once "database.php";

function displayQuotes($sql)
{
    echo "<br/><hr><br/>";
    
    // echo $sql . "<br/>";
    
    $dbConn = getDatabaseConnection();

    $statement = $dbConn->prepare($sql); 
    
    $statement->execute(); 
    $quotes = $statement->fetchAll(); 
    
    // printArray($quotes);
    
    foreach($quotes as $quote)
    {
        echo $quote['quote'] . " (<em>" . $quote['author'] . "</em>)(" . $quote['category'] . ") <br/><br/>";
    }
    
}


function printArray($array)
{
    echo "<pre>";
    var_dump($array);
    echo "</pre>";
}

?>