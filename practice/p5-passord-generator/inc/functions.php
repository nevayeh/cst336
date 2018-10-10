<?php

$letters = array("A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z");
$digits = array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9");

/*
function init()
{
    $letters = array("A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z");
    $digits = array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9");
}
*/

function validated()
{
    if(isset($_POST['numPass']))
    {
        if($_POST['numPass'] > 8)
        {
            // echo "<h3>ERROR! No more than 8 passwords please.</h3>";
            return false;
            
        }
        else
        {
            // generatePasswords();
            return true;
        }
    }
}
function generatePasswords($letters, $digits, $digitsWanted)
{
    // echo "GENERATING <br><br>";
    $passwordArray = array();
    $numberOfPasswords = $_POST['numPass'];
    $numberOfCharacters = $_POST['numChar'];
    
    if($digitsWanted)
    {
        for($l = 0; $l < $numberOfPasswords; $l++)
        {
            $amountDigits = rand(1,3);
            $digitCount = $amountDigits;
            $charCount = $numberOfCharacters;
            
            $password = "";
            
            for($m = 0; $m < $charCount; $m++)
            {
                $digitOrNah = rand(0,1); 
                
                if($digitOrNah && $digitCount > 0) //Inserts a digit
                {
                    --$digitCount;
                    // --$charCount;
                    $randDigit = rand(0, 9);
                    $password = $password . $digits[$randDigit];
                }
                else //Inserts a letter
                {
                    $randLetter = rand(0, 25);
                    $password = $password . $letters[$randLetter];
                
                }
            }
            // echo "$password <br>";
            $passwordArray[] = $password;
        }
        
    }
    else
    {
        for($i = 0; $i < $numberOfPasswords; $i++)
        {
            // echo "IN FOR<br><br>";
            // $password = ";lkj;";
            $password = "";
            
            for($j = 0; $j < $numberOfCharacters; $j++)
            {
                // echo "in second for <br>";
                // echo "Password before : " . $password . " <--  <br>";
                $randLetter = rand(0,25);
                // echo "letter: " . $letters[$randLetter] . "<br>";
                $password = $password . $letters[$randLetter];
            }
            
            // echo "$password <br>";
            $passwordArray[] = $password;
            
        }
        
    }
    
    displayPasswords($passwordArray, $numberOfPasswords, $numberOfCharacters);
    
}

function displayPasswords($passwordArray, $numberOfPasswords, $numberOfCharacters)
{
    echo "<br/><br/>Creating $numberOfPasswords Passwords with $numberOfCharacters Characters.<br><br>";
    
    // for($k = 0; $k < $numberOfPasswords; $k++)
    // {
    //     echo $passwordArray[$k] . "<br>";
    // }
    
    foreach($passwordArray as $pass)
    {
        echo "$pass <br>";
    }
}


?>