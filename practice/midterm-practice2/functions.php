<?php

function printReports()
{
    displayBetweenPopulation();
    displayPopulationGreatestToLeast();
    displayTownsStartingWithS();
}

function displayBetweenPopulation()
{

    echo "Cities and towns with a population between 50,000 and 80,000: <br/>";
    
    $dbConn = getDatabaseConnection();
    
    $sql = "SELECT * from mp_town WHERE (population > 49999 AND population < 80001 )";
    
    $statement = $dbConn->prepare($sql); 
    
    $statement->execute(); 
    $records = $statement->fetchAll(); 
    
    foreach($records as $record)
    {
        echo $record['town_name'] . " - " . $record['population'] . "<br/>";
    }

    
}

function displayPopulationGreatestToLeast()
{
    echo "<br/><br/>All cities from greatest to least population: <br/>";
    
    $dbConn = getDatabaseConnection();
    
    $sql = "SELECT * from mp_town WHERE 1 ORDER BY population DESC";
    
    $statement = $dbConn->prepare($sql); 
    
    $statement->execute(); 
    $records = $statement->fetchAll(); 
    
    foreach($records as $record)
    {
        echo $record['town_name'] . " - " . $record['population'] . "<br/>";
    }
    
    displayThreeLeastPopulated($records);
}

function displayThreeLeastPopulated($records)
{
    echo "<br/><br/>Three least populated cities: <br/>";
    
    for($i = (count($records) - 1); $i > (count($records) - 4); $i--)
    {
        echo $records[$i]['town_name'] . " - " . $records[$i]['population'] . "<br/>";
    }
}

function displayTownsStartingWithS()
{
    echo "<br/><br/>Counties that start with S:<br/>";
    
    $dbConn = getDatabaseConnection();
    
    $sql = "SELECT * from mp_county WHERE 1 AND county_name LIKE \"S%\"";
    
    $statement = $dbConn->prepare($sql); 
    
    $statement->execute(); 
    $records = $statement->fetchAll(); 
    
    foreach($records as $record)
    {
        echo $record['county_name'] . "<br/>";
    }
    
}

?>