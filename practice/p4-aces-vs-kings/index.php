<?php
    $_POST["input"];
    include "inc/functions.php";
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Aces vs Kings</title>
    </head>
    <body>
        
        <h1>Aces vs Kings</h1>
        
        <form action="index.php" method="POST">
            Number of rows:
            <input type="text" name="input[]"/>
            <br>
            
            Number of columns:
            <input type="text" name="input[]"/>
            <br>
            
            Suit to omit:
            <select>
              <option value="diamonds">Diamonds</option>
              <option value="clubs">Clubs</option>
              <option value="hearts">Hearts</option>
              <option value="spades">Spades</option>
            </select>
            
            <input type="submit" name="Submit"/>
            
        </form>
        
        <?php
            $rowNum = $_POST["input"][0];
            $colNum = $_POST["input"][1];
            
            play($rowNum, $colNum);
            // echo "Rows: $temp1 <br> Columns: $temp2 <br>";
        ?>
        
        
    </body>
</html>