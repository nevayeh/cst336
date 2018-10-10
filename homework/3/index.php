<?php
// $_POST['className'] = array();

?>

<!--

Radio button at end: ask if this was helpful
    don't forget accessible label for radio button
And then a helpful counter: "-- people found this helpful"
    use sessions (don't forget to start session lol)
    
-->
<!DOCTYPE html>
<html>
    <head>
        <title>Semester GPA</title>
        <link rel="stylesheet" type="text/css" href="css/styles.css">
    </head>
    <body>
        <fieldset>
            <legend>Semester GPA Calculator</legend>
        <form method="post" action="results.php">
            <!----------Dividing Line for organization---------->
            
            <label for="className[]">Class Name: </label>
            <input type="text" name='className[]'/>
            
            <label for="units1">Units: </label>
            <input type="number" name="units[]"/ id="units1" class="unitInput"/>
            
            <input type="checkbox" name="weighted[]" id="weighted1"/>
            <label for="weighted1">Weighted?</label>
            
             <br/> <!----------Dividing Line for organization---------->
            
            <label for="className[]">Class Name: </label>
            <input type="text" name='className[]'/>
            
            <label for="units2">Units: </label>
            <input type="number" name="units[]"/ id="units2" class="unitInput"/>
            
            <input type="checkbox" name="weighted[]" id="weighted2"/> 
            <label for="weighted2">Weighted?</label>
            
            <br/> <!----------Dividing Line for organization---------->
            
            <label for="className[]">Class Name: </label>
            <input type="text" name='className[]'/>
            
            <label for="units3">Units: </label>
            <input type="number" name="units[]"/ id="units3" class="unitInput"/>
            
            <input type="checkbox" name="weighted[]" id="weighted3"/> 
            <label for="weighted3">Weighted?</label>
            
            <br/> <!----------Dividing Line for organization---------->
            
            <label for="className[]">Class Name: </label>
            <input type="text" name='className[]'/> 
            
            <label for="units4">Units: </label>
            <input type="number" name="units[]"/ id="units4" class="unitInput"/>
            
            <input type="checkbox" name="weighted[]" id="weighted4"/> 
            <label for="weighted4">Weighted?</label>
            
            <br/> <!----------Dividing Line for organization---------->
            
            <label for="className[]">Class Name: </label>
            <input type="text" name='className[]'/> 
            
            <label for="units4">Units: </label>
            <input type="number" name="units[]"/ id="units4" class="unitInput"/>
            
            <input type="checkbox" name="weighted[]" id="weighted4"/> 
            <label for="weighted4">Weighted?</label>
            
            <br/> <!----------Dividing Line for organization---------->
            
            <input type="submit" value="Calculate!"/>
            
        </form>
        </fieldset>
        
        
        <?php
        
        echo "class: ";
        echo "<pre>";
        // $numClasses = count($_POST['className']);
        // for($x = 0; $x < count($_POST['className']) - 1; $x++)
        
        // foreach($_POST as $className => $class)
            // echo $class;
            
        var_dump($_POST['className']);
            
        echo "</pre>";
        
        
        
        ?>
        
    </body>
</html>