<?php 

include "./inc/functions.php";

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Letter Search</title>
        <link rel="stylesheet" type="text/css" href="css/styles.css">
    </head>
    <body>

        <h1>Find the Letter</h1>

        <form method="post">
            
            <!--Find Letter: findLetter -->
            Find the letter: 
            <select name="findLetter">
            <?php 
                // $alphabet = getSelectMenuArray();
                // // printArray($alphabet);
                
                // foreach($alphabet as $letter)
                // {
                //     echo '<option value="' . $letter . '">' . $letter . '</option>';
                // }
                
                makeAlphaOptions();
                
                // $findFormName = "findLetter";
                // makeAlphaOptions($findFormName);
                // printArray($alphabetSelect);
                
                // echo "ECHOING POST OUTSIDE: " . $_POST[$findFormName] . "<br>";
            ?>
            </select>
            
            <br/>
            
            <!--Table Size: tableSize -->
            Table Size:
            <select name="tableSize">
                <option value="6">6x6</option>
                <option value="7">7x7</option>
                <option value="8">8x8</option>
                <option value="9">9x9</option>
                <option value="10">10x10</option>
            </select>
            
            <br/>
            
            <!--Letter Omission: omitLetter -->
            Omit the letter:
            <select name="omitLetter">
             <?php 
                // $alphabet = getSelectMenuArray();
                // // printArray($alphabet);
                
                // foreach($alphabet as $letter)
                // {
                //     echo '<option value="' . $letter . '">' . $letter . '</option>';
                // }
                
                makeAlphaOptions();
                
                // $omitFormName = "omitLetter";
                // makeAlphaOptions($omitFormName);
                
                // echo "ECHOING POST OUTSIDE: " . $_POST[$omitFormName] . "<br>";
                // printArray($alphabetSelect);
                
            ?>
            </select>
            
            <br/><br/>
            
            <input type="submit" name="submit" value="Find the Letter!"/>
                <br/><br/>
            <input type="submit" name="submit" value="(View with status checking)"/>
            
            
            
        </form>

    <?php
    
        // printArray($_POST);
        include "./inc/form-logic.php"
    
    ?>

    </body>
</html>