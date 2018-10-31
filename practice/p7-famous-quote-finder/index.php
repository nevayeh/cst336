<!DOCTYPE html>
<html>
    <head>
        <title>Famous Quote Finder</title>
        <link rel="stylesheet" type="text/css" href="css/styles.css">
    </head>
    <body>

    <h1 id="header">Famous Quote Finder</h1>
    
    <br/><br/>
    
    
    <?php
    
    // $categoriesArray = array("Select One", "Humor", "Life", "Motivation", "Philosophy", "Reflection");
    
    // foreach($categoriesArray as $cat2)
    // {
    //     echo "$cat2 <br>";
    // }
    
    echo '<form method="post">';
        
        echo 'Enter Quote Keyword:';
            
        $quoteText = isset($_POST['quoteKey']) ? $_POST['quoteKey'] : "";
        
        echo '<input type="text" name="quoteKey" id="quoteKeyText" value="'. $quoteText .'"/>';
        
        echo '<br/><br/>';
        
        echo 'Category:';
        echo '<select name="category">';
        
        $categoriesArray = array("Select One", "Humor", "Life", "Motivation", "Philosophy", "Reflection");
        
        // foreach($categoriesArray as $cat)
        // {
        //     echo $cat . "<br/>";
            
        //     //<option value="Life" checked>Life</option>
        //     echo '<option value="' . $cat . '"';
            
        //     if($_POST['category'] == $cat)
        //         echo " checked";
            
        //     echo '>' . $cat . '</option>';
        // }
        
        foreach($categoriesArray as $cat)
            echo "$cat <br>";
        
        echo '</select>';
        
        /*
        echo 'Category:';
        echo '<select name="category">';
            echo '<option value="Select One">Select One</option>
            <option value="Humor">Humor</option>
            <option value="Life">Life</option>
            <option value="Motivation">Motivation</option>
            <option value="Philosophy">Philosophy</option>
            <option value="Reflection">Reflection</option>
        </select>';
        */
        
        echo '<br/><br/>';
        
        echo 'Order: <br/>';
        echo '<input type="radio" name="order" value="AZ" id="orderByAZ"/>';
        echo '<label for="orderByAZ">A-Z</label>';
        
        echo '<br/>';
        
        echo '<input type="radio" name="order" value="ZA" id="orderByZA"/>';
        echo '<label for="orderByZA">Z-A</label>';
        
        echo '<br/><br/>';
        
        echo '<input type="submit" name="submit" value="Display Quotes!"/>';
        
    echo '</form>';

    include "form-logic.php";
    
    ?>

    </body>
</html>