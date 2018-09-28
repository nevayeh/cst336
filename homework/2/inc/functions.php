<?php

function generate()
{
    $paintings = array("Campbell's Soup Cans", "Guernica", "Les Demoiselles d'Avignon", "Mona Lisa", "The Starry Night", "The Night Watch", "The Persistence of Memory", "The Potato Eaters", "The Sleeping Gypsy", "Water Lilies");
    shuffle($paintings);
    
    $randomPainting = rand(0, count($paintings) - 1);
    
    echo '<h1 align="center" sty;e="color:white"> Exhibit ID: ' . rand(1, 99999) . 0 . ($randomPainting + 1) . "</h1>";
    
    echo "<div>";
    
    echo '<img src="img/' . $paintings[$randomPainting] . '.png" alt="' . $paintings[$randomPainting] . '"/>';
    
    echo "</div>";
    
    echo "<div>";
    
    echo '<h2 align="center" style="color:white">' .  $paintings[$randomPainting] . "</h2>";
    
    echo "<p>";
    $blurbPath = "blurbs/" . $paintings[$randomPainting] . ".txt";
    echo file_get_contents($blurbPath);
    echo "</p>";
    echo "</div>";
}




?>