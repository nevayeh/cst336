<?php

function play($rowNum, $colNum)
{
    $deck = initDeck($deck);
    printArray($deck);
    displayTable($deck, $rowNum, $colNum);
}

function initDeck($deck)
{
    $deck = array();
    $cardCount = 52;
    //echo"initDeck() <br>";
    for($i = 0; $i < $cardCount; $i++)
    {
        $suitName = getSuitName($i);

        // echo"<br> AFter getsuitname <br>";
        $cardNumber = ($i % 13) + 1;
        $cardPath = "./cards/" . $suitName . "/" . "$cardNumber" . ".png"; //$cardNumber also = value of that card!

        $deck[$i]["cardPath"] = $cardPath;
        $deck[$i]["cardValue"] = $cardNumber;
        $deck[$i]["suit"] = $suitName;
    }
    // echo"AFTER FOR LOOP <br>";
    return $deck;
}
    
function getSuitName($suitCategory)
{
    // echo"getSuitName()<br>";
    if($suitCategory < 13)
        return $suitName = "clubs";
    else if($suitCategory > 12 && $suitCategory < 26)
        return $suitName = "diamonds";
    else if($suitCategory > 25 && $suitCategory < 39)
        return $suitName = "hearts";
    else
        return $suitName = "spades";
}


function displayTable($deck, $rowNum, $colNum)
{
    for($j = 0; $j < $rowNum; $j++)
    {
        echo "<tr>";
        
        for($k = 0; $k < $colNum; $k++)
        {
            echo "<td>";
            echo '<img src="' . $deck[$randomCard]["cardPath"] . '"/>';
            echo "</td>";
        }
        
        echo "</tr>";
    }
}



    
function printArray($deck)
{
    // echo"printArray()<br>";
    echo "<pre>";
    var_dump($deck);
    echo "</pre>";
}
?>
