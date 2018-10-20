<?php

// function makeAlphaOptions($formName)
function makeAlphaOptions()
{
    // echo "HELLO <br>";

    // echo "FORM NAME: $formName <br>";
    
    // echo "ACCESSING POST: " . $_POST[$formName] . "<br>";
    // $alphabetSelect = array();
    
    for($i = 65; $i < 91; $i++)
    {
        
        echo '<option value="' . $i . '">' . chr($i) . '</option>';
        
        // $value = $_POST[$formName] == $i ? $_POST[$formName] : $i;
        // echo '<option value="' . $i;
        
        // if($_POST[$formName] == $i)
        //     echo " selected";
        
        // echo '">' . chr($i) . '</option>';

    }
    
    // echo "array: <br>";
}

/*
function makeAlphaSelection()
{
    $alphabetSelect = getSelectMenuArray();
    // printArray($alphabet);
    
    foreach($alphabetSelect as $letter)
    {
        echo '<option value="' . $letter . '">' . $letter . '</option>';
    }
}

function getSelectMenuArray()
{
    $alphaArray = array();
    
    for($i = 65; $i < 91; $i++)
        $alphaArray[] = chr($i);
        
    return $alphaArray;
}
*/


function displayTable($tableSize, $find, $omit, $viewType)
{
    // echo "Table size: $tableSize <br/>";
    
    // $alphabet = createAlphabetArray();
    $found = 0;
    
    $tableTotalSize = $tableSize * $tableSize;
    $tableCounter = 0;
    
    echo '<br/><table align="center">';
    
    //<tr><th colspan="6">Find the A! You have chosen to omit any B's</th></tr>
    echo '<tr><th colspan="' . $tableSize .'">Find the ' . chr($find). '! You have chosen to omit any ' . chr($omit) .'\'s</th></tr>';
    
    for($j = 0; $j < $tableSize; $j++)
    {
        echo "<tr>";
        
        for($k = 0; $k < $tableSize; $k++)
        {
            echo "<td>";
            
            $tableCounter++;
            $randLetter = getRandomNumber($found, $find, $omit, $tableCounter, $tableTotalSize);
            
            if($randLetter > 64 && $randLetter < 73)
                $colorClass = "redLetter";
            elseif($randLetter > 72 && $randLetter < 81)
                $colorClass = "greenLetter";
            else
                $colorClass = "blueLetter";
            
            echo "<br>";
            
            echo '<span class="letter ' . $colorClass . '">' . chr($randLetter) . "</span>";
            
            // echo "tableCount: $tableCounter / $tableTotalSize <br>";
            // echo "$randLetter => " . chr($randLetter);
            if($viewType == "(View with status checking)")
                echo "<br/> $found";
            
            
            echo "</td>";
            
        }
        
        echo "</tr>";
    }
    
    echo "</table>";
    echo "<br/><br/>";
}

function getRandomNumber(&$found, $find, $omit, $tableCounter, $tableTotalSize)
{
    // echo "<br>found: $found";
    // echo "count: $tableCounter, size: $tableTotalSize";
    
    do
    {
        $randNum = rand(65, 90);
        // echo "<br>initial rand: $randNum";
        
    }while($randNum == $omit);
    
    //If the letter hasn't been generated by chance yet, this will make it the last one (so it's guaranteed to appear)
    if(!$found && ($tableCounter == $tableTotalSize))
    {
        // echo "<br>last one";
        $randNum = $find;
        $found = 1;
        return $randNum;
    }

    //10% chance for it to appear, if it gets randomly generated
    //(this hopefully keeps it so it doesn't generally only appear in the beginng (top) area of the table)
    if($randNum == $find && !$found)
    {
        // echo "<br>LUCKY SPOT";
        // $chance = rand(1, 3);
        
        // if($chance == 1)
        // {
            $found = 1; //Sets found to true so it shouldn't be selected again
            return $randNum;
        // }
        // $randNum = getRandomNumber($found, $find, $omit, $tableCounter, $tableTotalSize);
        // return $randNum;
    }
    
    //Prevents the letter from appearing more than once
    if($found && $randNum == $find)
    {
        // echo "<br> NEED NEW NUM!!!";
        $randNum = getRandomNumber($found, $find, $omit, $tableCounter, $tableTotalSize);
        // return $randNum;
    }
    

    
    return $randNum;
}

/*
function createAlphabetArray()
{
    $alphabet = array();
    
    for($l = 65; $l < 91; $l++)
    {
        $alphabet[] = chr($l);
    }
    
    return $alphabet;
}
*/

function printArray($array)
{
    echo "<pre>";
    var_dump($array);
    echo "</pre>";
}

?>