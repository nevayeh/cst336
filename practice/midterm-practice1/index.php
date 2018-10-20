<?php
    include "inc/functions.php";
    // printArray($_POST);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Winter Vacation Planner</title>
        <link rel="stylesheet" type="text/css" href="css/styles.css">
    </head>
    <body>
    
    <h1 id="header">Winter Vacation Planner!</h1>
    
    <!--<fieldset>-->
    <form method="post">
        
        Select Month:
        <select name="monthChoice">
            <option value="Select">Select</option>
            <!--<option value="November">November</option>-->
            <option value="November" selected>November</option>
            <option value="December">December</option>
            <option value="January">January</option>
            <option value="February">February</option>
        </select>
        
        <br/>
        
        Number of Locations:
        <!--<input type="radio" name="numLocations" id="3Locations" value="3"/>-->
        <input type="radio" name="numLocations" id="3Locations" value="3" checked/>
        <label for="3Locations">Three</label>
        
        <input type="radio" name="numLocations" id="4Locations" value="4"/>
        <label for="4Locations">Four</label>
        
        <input type="radio" name="numLocations" id="5Locations" value="5"/>
        <label for="5Locations">Five</label>
        
        <br/>
        
        Select Country:
        <select name="destChoice">
            <option value="USA">USA</option>
            <option value="Mexico">Mexico</option>
            <option value="France">France</option>
        </select>
        
        <br/>
        
        Visit locations in:
        <!--<input type="radio" name="locationOrder" id="locationsAtoZ" value="AtoZ"/>-->
        <input type="radio" name="locationOrder" id="locationsAtoZ" value="AtoZ" checked/>
        <label for="locationsAtoZ">A-Z</label>
        
        <input type="radio" name="locationOrder" id="locationsZtoA" value="ZtoA"/>
        <label for="locationsZtoA">Z-A</label>
        
        
        <br/>
        
        <input type="Submit" name="submit" value="Create Itinerary!"/>
        
    </form>
    <!--</fieldset>-->
    
    <hr>

    </body>
</html>


<?php
    
    if($_POST['submit']=="Create Itinerary!" && $_POST['monthChoice'] == "Select")
    {
        echo '<h2 class="errorMessage">You need to select a month.</h2>';
    }
    
    if($_POST['submit']=="Create Itinerary!" && !isset($_POST['numLocations']))
    {
        echo '<h2 class="errorMessage">You need to select a number of locations.</h2>';
    }
    
    // if( (isset($_POST['monthChoice']) && !($_POST['monthChoice'] == "Select")) && isset($_POST['numLocations']))
    if(!($_POST['monthChoice'] == "Select") && isset($_POST['numLocations']))
    {
        $orderChoice = isset($_POST['locationOrder']) ? $_POST['locationOrder'] : "none";
        createCalendar($_POST['monthChoice'], $_POST['numLocations'], $_POST['destChoice'], $orderChoice);
    }
?>
