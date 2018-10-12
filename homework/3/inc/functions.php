<?php

session_start();

$_SESSION['numClasses'];
$_SESSION['totalUnits'];
$_SESSION['totalGradePoints'];

function displayForm()
{
    echo '<fieldset>';
        echo '<legend id="formLegend">GPA Calculator</legend>';
        echo '<form method="post">';
        
        for($i = 0; $i < $_SESSION['numClasses']; $i++)
        {
            //Class name text field and label
            //This information isn't processed, but is there for the users' own readability (to keep track of which courses they entered already)
            echo '<label for="className' . $i . '"> (' . ($i+1) . ') Class Name: </label>';
            $classNameVar = "className" . $i;
            $classValue = isset($_POST[$classNameVar]) ? $_POST[$classNameVar] : "";
            echo '<input type="text" name="className' . $i . '" value="' . $classValue .'"/>';

            //Units label and number entry
            echo '<label for="units' . $i . '" class="newSectionLabel">Units: </label>';
            $unitVar = "units" . $i;
            $unitValue = isset($_POST[$unitVar]) ? $_POST[$unitVar] : "";
            echo '<input type="number" pattern="[0-9]" name="units' . $i .'"/ id="units1" class="unitInput" size="2" min="1" max="9" value="' . $unitValue . '"/>';
                
            //Grade radio buttons
            echo '<label class="newSectionLabel">Grade: </label>';
            makeGradeRadioButton($i, "A");
            makeGradeRadioButton($i, "B");
            makeGradeRadioButton($i, "C");
            makeGradeRadioButton($i, "D");
            makeGradeRadioButton($i, "F");
  
            //Weighted checkbox and label
            //If box was checked, will remain checked
            echo '<label class="newSectionLabel"></label>';
            $weightedVar = "weighted" . $i;
            echo '<input type="checkbox" name="weighted' . $i .'" id="weighted' . $i . '"';
            if(isset($_POST[$weightedVar]))
                echo " checked";
            echo '/>';
            echo '<label for="weighted' . $i .'">Weighted?</label>';
            
            echo "<br/>";
        }
        
        echo '<br/>';
        
        //Button to add a class
        echo '<input type="submit"  name="whichButton" value="Add Class"/>';
        
        //Adds spacing between two buttons
        echo "&nbsp&nbsp";
        
        //Button to remove a class
        echo '<input type="submit"  name="whichButton" value="Remove Class"/>';
        
        echo '<br/><br/>';
        
        displayCalculateButton();
}

function makeGradeRadioButton($i, $gradeLetter)
{
    echo '<input type="radio" name="grade' . $i .'" id= "gradeRadio' . $i . $gradeLetter . '" class="radioButton" value="'. $gradeLetter .'"';

    $gradeVar = "grade" . $i;
    if((isset($_POST[$gradeVar])) && $_POST[$gradeVar] == $gradeLetter)

        echo " checked";
    echo '/>';
    echo '<label for="gradeRadio' . $i . $gradeLetter . '">' . $gradeLetter . '</label>';
}

function displayCalculateButton()
{
    echo '<input type="submit"  name="whichButton" value="Calculate!"/>';
        echo '</form>';
    echo '</fieldset>';
}

//Makes sure there are no empty fields
//If there is something missing from any of the required fields, (calculate) submit button will be disabled
function validateForm()
{
    //Resets to 0 every time for proper calculation
    $validClass = 0;
    
    for($l = 0; $l < $_SESSION['numClasses']; $l++)
    {
        $classNameVar = "className" . $l;
        $unitVar = "units" . $l;
        $gradeVar = "grade" . $l;
        
        //Checks to see if any information is missing from the class ("Weighted" option not included as it is optional)
        //Prints out an error message if aynthing is missing
        if((isset($_POST[$classNameVar]) && $_POST[$classNameVar] != "") && (isset($_POST[$unitVar]) && $_POST[$unitVar] != "")
                    && ( isset($_POST[$gradeVar]) && $_POST[$gradeVar] != ""))
        {
            ++$validClass;
        }
        //If not all three required fields are set
        else
        {
            echo '<br><div id="errorDiv">';
            echo '<span class="error-message">You are missing the following: <br/>';
            echo '&nbsp;&nbsp;&nbsp;&nbsp *Class ' . ($l+1) . ': ';
            
            if(!isset($_POST[$classNameVar]) || $_POST[$classNameVar] == "")
            {
    
                echo "Name ";
            }
            
            if(!isset($_POST[$unitVar]) || $_POST[$unitVar] == "")
            {
                echo "Units ";
            }
            
            if(!isset($_POST[$gradeVar]) || $_POST[$gradeVar] == "")
            {
                echo "Grade";
            }
            
            echo "</span></div>";
        }
        
    }
    
    echo "<br><br>";
    
    if($validClass == $_SESSION['numClasses'])
    {
        calculateGPA();
    }
}

function calculateGPA()
{
    //Resets to 0 and calculates accordingly every submission
    //Prevents continuous adding-on-to of the cumulative unit and grade point totals
    //(Allows user to keep hitting "Calculate" without calculation issues)
    $_SESSION['totalUnits'] = 0;
    $_SESSION['totalGradePoints'] = 0;
    
    for($k = 0; $k <$_SESSION['numClasses']; $k++)
    {
        $unitAccessor = "units" . $k;
        $gradeAccessor = "grade" . $k;
        $weightAccessor = "weighted" . $k;
        
        $postUnits = $_POST[$unitAccessor];
        $postGrade = $_POST[$gradeAccessor];
        
        $_SESSION['totalUnits'] += $postUnits;

        switch($postGrade)
        {
            case "A":
                $gradeValue = 4;
                break;
            case "B":
                $gradeValue = 3;
                break;
            case "C":
                $gradeValue = 2;
                break;
            case "D":
                $gradeValue = 1;
                break;
            case "F":
                $gradeValue = 0;
                break;
            default:
                break;
        }

        if(isset($_POST[$weightAccessor]))
        {
            ++$gradeValue;
        }
        
        $_SESSION['totalGradePoints'] += ($postUnits * $gradeValue);
        
    }

    $calculatedGPA = number_format(($_SESSION['totalGradePoints'] / $_SESSION['totalUnits']), 2);
    
    echo '<h1 id="gpaResult">GPA: ' . $calculatedGPA . '</h1>';
}

?>