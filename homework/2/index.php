<?php
include "inc/functions.php";
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Random Museum</title>
        <meta charset="utf-8"/>
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <header>
            <h1>Exhibit of the Day!</h1>
        </header>
        
        <?php
            generate();
        ?>
        
        <footer>
            <p style="text-align: center">
                All images and information taken from Google and Wikipedia, respectively.
            </p>
        </footer>
        
    </body>
</html>