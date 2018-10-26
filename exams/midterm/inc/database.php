<?php
// connect to our mysql database server

//ex: import 'secretfile.php' //but you would never commit secretfile to github

function getDatabaseConnection() {
    $host = "localhost";
    $username = "nyeh";
    $password = "Admin"; //best practice: define this in a separate file, never commit that file to github
    $dbname = midterm;
    
    // Create connection
    $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $dbConn; 
}


//temporary test code
$dbConn = getDatabaseConnection(); //blank is good; that means nothing crashed //if you type in pass wrong, for ex, will get error msg


?>
