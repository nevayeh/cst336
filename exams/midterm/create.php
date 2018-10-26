<?php
include_once "./inc/database.php";
include_once "./inc/functions.php";
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Create A Quote</title>
        <link rel="stylesheet" type="text/css" href="css/styles.css">
    </head>
    <body>
        
        <h1>Create A New Quote</h1>

        <?php /*printArray($_POST);*/ displayErrorMessages(); ?>

    
        <form method="post">
            
            
            Text: 
            <input type="text" name="quote"/>
            

            <br/><br/>
            
            Author: 
            <input type="text" name="author"/>
            
            <br/><br/>
            
            <input type="submit" name="submit" value="Submit"/>
            
        </form>
        
        <?php
            include "form-logic.php";
        ?>

    </body>
</html>