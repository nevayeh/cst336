<?php

include_once "./inc/database.php";


function displayRandomQuote()
{
    $dbConn = getDatabaseConnection();
    
    $sql = "SELECT * from q_quotes WHERE 1";
    
    $statement = $dbConn->prepare($sql); 
    
    $statement->execute(); 
    $records = $statement->fetchAll(); 
    
    $record = $records[array_rand($records)];
    
    // printArray($record);
    
    echo "<h1>" . $record['quote'] . "</h1>";
    echo "<h2><em>-" . $record['author'] . "</em></h2>";
}

function displayErrorMessages()
{
    echo '<div id="errorMessageDiv">';
    
    if(isset($_POST['submit']) && $_POST['quote'] == "")
        echo '<span class="errorMessage">*Text must not be empty</span><br/>';
        
    if(isset($_POST['submit']) && $_POST['author'] == "")
    {
        echo '<span class="errorMessage">*Author must not be empty</span><br/>';
    }
 
    echo "</div>";
    
    return true;
        
}

function createQuote($quote, $author)
{
    $dbConn = getDatabaseConnection();
    
    $randLikes = rand(0, 999);
    $sql = "INSERT INTO q_quotes (`quoteId`,`quote`, `author`, `num_likes`) VALUES (NULL, '$quote', '$author', '$randLikes');";
    
    $statement = $dbConn->prepare($sql); 
    $result = $statement->execute(); 
    
    if (!$result) {
      return null; 
    }
    
    $last_id = $dbConn->lastInsertId();
    
    //Redirects back to midterm.php
    // echo "<form>";
    // echo '<INPUT TYPE="hidden" NAME="redirect" VALUE="midterm.php">';
    // echo "</form>";
}


function printArray($array)
{
    echo "<pre>";
    var_dump($array);
    echo "</pre>";
}

?>