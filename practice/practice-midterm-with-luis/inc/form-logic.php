<?php
    // include_once "./inc/functions.php"

    /*
    $_POST['findLetter']
    $_POST['tableSize']
    $_POST['omitLetter']
    */
    
    //Find and Omit letters not the same, won't display
    if(isset($_POST['submit']) && ($_POST['findLetter'] == $_POST['omitLetter']))
        echo '<h1 class="errorMessage">Letter to Find cannot be the same as Letter to Omit!</h1>';
    //Will display
    elseif(isset($_POST['submit']))
    {
        displayTable($_POST['tableSize'], $_POST['findLetter'], $_POST['omitLetter'], $_POST['submit']);
    }


?>