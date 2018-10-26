<?php
include_once "./inc/database.php";
include_once "./inc/functions.php";
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Random Quote</title>
        <link rel="stylesheet" type="text/css" href="css/styles.css">
    </head>
    <body>
        
        <?php displayRandomQuote(); ?>
        
        <br/><br/>
        
        <a href="./create.php">Create Your Own</a>
        
        <!--
        
        NOTE: I created a form initially, but the example images on the midterm prompt look
        like it's using an a tag
        
        <form method="post" action="create.php">
            <input type="submit" name="submit" value="Creat Your Own"/>
        </form>
        
        -->

    </body>
</html>