<?php
    session_start();

    include 'inc/functions.php';

    //FORM LOGIC

    //Makes sure the number of classes never goes to 0 or into negatives
    //Makes sure there is 1 class available on first load (empty session)
    if($_SESSION['numClasses'] < 1)
    {
        $_SESSION['numClasses'] = 1;
    }

    //Handles button logic
    $button = $_POST['whichButton'];
    
    if(isset($button))
    {
        //Adding class
        if($button == "Add Class")
        {
            ++$_SESSION['numClasses'];
        }
        //Removing class
        elseif($button == "Remove Class" && $_SESSION['numClasses'] > 1)
        {
            --$_SESSION['numClasses'];
        }
        //Calculating GPA
        elseif($button == "Calculate!")
        {
            validateForm();
        }
    }
    
?>

<!DOCTYPE html>
<html>
    <head>
        <title>GPA Calculator</title>
        <link rel="stylesheet" type="text/css" href="styles.css">
    </head>
    <body>
        
        <h1 class="header">What's Your GPA?</h1>
        
        <!--<br/><br/>-->
        
        <div id="formDiv">
        <?php
            displayForm();
        ?>
        </div>
        
        <!--<br/><br/>-->
        
        <div id="footer">
            This GPA calculator is meant only to be a helpful tool. <br>
        </div>
        
    </body>
</html>