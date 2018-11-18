<?php
// connect to our mysql database server

//ex: import 'secretfile.php' //but you would never commit secretfile to github

function getDatabaseConnection()
{
        if (strpos($_SERVER['SERVER_NAME'], "c9users") !== false)
        {
            // running on cloud9
            $host = "localhost";
            $username = "nyeh";
            $password = "Admin"; // best practice: define this in a separte file
            $dbname = "practice_midterm"; 
        }
        else
        {
            // running on Heroku
            $host = "us-cdbr-iron-east-01.cleardb.net";
            $username = "b5a706b2943846";
            $password = "6db517db"; 
            $dbname = "heroku_74832e9767c0d39"; 
        }
    
    
    
    
    
    // Create connection
    $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $dbConn; 
}


//temporary test code
$dbConn = getDatabaseConnection(); //blank is good; that means nothing crashed //if you type in pass wrong, for ex, will get error msg


?>
