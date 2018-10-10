<?php
    require "inc/functions.php";



?>

<!DOCTYPE html>
<html>
    <head>
        <title>Password Generator</title>
        
        <style>
            body
            {
                text-align: center;
            }
        </style>
    </head>
    <body>
        <h1>Custom Password Generator</h1>
        
        <form method="post">
        How many passwords?
        <input type="text" name="numPass" style="width: 30px"/>
        (No more than 8)
        
        <br/>
            
        <h3>Password Length</h3>
        <input type="radio" name="numChar" value="6"/>6 characters
        <input type="radio" name="numChar" value="8"/>8 characters
        <input type="radio" name="numChar" value="10"/>10 characters
        
        <br/><br/>
        
        <input type="checkbox" name="digitsWanted" value="digits"/>
        Include digits (up to 3 digits will be part of the password)
        
        <br/><br/>
        
        <input type="submit" value="Submit Passwords!"/>
        </form>
        
        <form action="passwordHistory.php">
        <br/><br/>
        
        <input type="submit" value="Display Password History"/>
        
        </form>
        
        <?php    
            if(isset($_POST['numPass']))
            {
                if(!validated())
                {
                    echo '<h2 style="color:red">Error! Cannot be over 8 passwords!</h2>';
                }
            }
            
            
            if(isset($_POST['numChar']) && validated())
            {
                $numberOfDigits = false;
                // echo validated() . "<br>";
                if(isset($_POST['digitsWanted']))
                {
                    $numberOfDigits = true;
                    generatePasswords($letters, $digits, $numberOfDigits);
                    unset($_POST['digitsWanted']);
                }
                else
                    generatePasswords($letters, $digits, $numberOfDigits);
            }

            

        
        ?>



    </body>
</html>