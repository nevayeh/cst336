<!DOCTYPE html>
<html>
    <head>
        <title> </title>
    </head>
    <body>


    </body>
    
    <?php
        /*
        $firstName = "John ";
        $lastName = "Doe";
        $fullName = $firstName.$lastName;
        echo "<div> $fullName </div>";
        */
        
        /*
        $n = 20943;
        $n = number_format($n,2); 
        echo $n  . "<br><br>";
        
        $n = rand(5,15);   
        echo $n  . "<br><br>";
        
        $n = "hElLo WoRlD!";
        echo strtoupper($n)  .  "<br><br>";
        */
        
        
        $numberAmount = 9;
        $totalSum = 0;
        
        for($i = 0; $i < $numberAmount; $i++)
        {
            $evenNum;
            
            $n = rand(1, 10); /* both insluvie */
            // $toalSum += $n;
            $totalSum = $totalSum + $n;
            echo "$n ";
            
            $evenNum = ($n % 2 == 0) ? "even" : "odd";
            
            echo "$evenNum <br/>";
            
            
        }
        
        echo "<br/> Total: $totalSum <br/>";
        
        $average = $totalSum / $numberAmount;
        $average = number_format ($average, 2); 
        
        echo "Average: $average"
        
    
    ?>
    
</html>