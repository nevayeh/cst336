<?php

// $destUSA = array("chicago", "hollywood", "las_vegas", "ny", "washington_dc", "yosemite");
// $destMexico = array("acapulco", "cabos", "cancun", "chichenitza", "huatulco", "mexico_city");
// $destFrance = array("bordeaux", "le_havre", "lyon", "montpellier", "paris", "strasbourg");

// var_dump($destUSA);

function createCalendar($month, $numLocations, $destination, $order)
{
    $destUSA = array("chicago", "hollywood", "las_vegas", "ny", "washington_dc", "yosemite");
    $destMexico = array("acapulco", "cabos", "cancun", "chichenitza", "huatulco", "mexico_city");
    $destFrance = array("bordeaux", "le_havre", "lyon", "montpellier", "paris", "strasbourg");
    
    // echo "month: $month <br/>";
    // echo "numLocations: $numLocations <br/>";
    // echo "destination: $destination <br/>";
    // echo "order: $order <br/>";
    
    echo "<h2>$month Itinerary</h2>";
    echo "<h3>Visiting $numLocations locations in $destination</h3>";
    
    $monthRows;
    
    switch($month)
    {
        case "February":
            $monthRows = 4;
            $monthDays = 28;
            break;
        case "November":
            $monthRows = 5;
            $monthDays = 30;
            break;
        case "December":
        case "January":
            $monthRows = 5;
            $monthDays = 31;
            break;
    }
    
    $destIndex;
    
    switch($order)
    {
        case "AtoZ":
            $destIndex = 0; //Go up, limit to numLocations (ex: 5 cities, 0 - 5)
            break;
        case "ZtoA":
            $destIndex = $numLocations; //Go down, limit to count(destArray) - numLocations (ex: 5 cities, (6-5) 1-6)
            break;  
            
        /*
            
            if order = AtoZ, numLocations = 5;
            $randNum = rand(0,1);
            echo $destArray[$randNum] . png
            //possible <br>
            echo $destArray[$randNum] //city name
            $destIndex++;
            
            if order = AtoZ, numLocations = 5;
            $randNum = rand(0,1);
            echo $destArray[$randNum] . png
            //possible <br>
            echo $destArray[$randNum] //city name
            $destIndex++;
        
        */
        
    }
    
    // echo "Rows: $monthRows <br>";
    // echo "Days: $monthDays <br><br><br>";
    
    $date = 0;
    // $destinationsLeft = $numLocations;
    
    $destinationDates = array();
    $destinationDates = pickDates(${"dest" . $destination}, $numLocations, $order);
    
    echo '<table align="center" border="1">';
    // echo '<table align="center">';
    echo "<tr><th colspan='7'>$month</th></tr>";
    for($i = 0; $i < $monthRows; $i++)
    {
        echo "<tr>";
        for($j = 0; $j < 7; $j++)
        {
            echo "<td>";
            if($date < $monthDays)
            {
                echo ++$date;
            }
            
            
            
            // if($destinationsLeft)
            // {
                // $cityOrNot = rand(0, 1);
                // if($cityOrNot)
                    // chooseDest($destinationsLeft, $destinationArray, $order);
            // }
            
            
            echo "</td>";
        }
        echo "<tr>";
    }
    
    echo "</table>";
    
}

function pickDates($array, $num, $order)
{
    
    
    switch($order)
    {
        case "AtoZ":
            // var_dump($array);
            
            $startingPoint = -1;
            for($k = 0; $k < $num; $k++)
            {
                // echo "startingPoint before: $startingPoint <br>";
                // echo "arrayCount: " . count($array) . "<br>";
                // echo "num: $num <br>";
                // echo "arrayCount - num: " . (count($array)-$num) . "<br>";
                $randNum = rand(++$startingPoint, (count($array) - $num));
                // echo "rand: $randNum : " . $array[$randNum] . "<br>";
                // echo "startingPoint after: $startingPoint <br><br>";
            }
            
            
            
        case "ZtoA":
            
            
            
            
        case "none":
    }
    
}

function chooseDest($numLeft, $array, $order)
{
    // echo "destArray received: $array <br>";

    --$numLeft;
    
}


function printArray($array)
{
    echo '<pre>';
    var_dump($array);
    echo '</pre>';
}

?>