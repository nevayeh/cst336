<?php

    $imageCount = 0;
    
    $images = array("alex", "bear", "carl", "charlie", "lion", "otter", "sally", "samantha", "ted", "tiger");
    shuffle($images);
    
    
    // print_r($images);
    
    foreach($images as $image)
    {
        // echo $image . "<br/>";
        
        // echo($count);
        
        echo '<div class="carousel-item';
        
        if($imageCount == 0)
            echo " active";
        
        echo '">';
            echo '<img src="img/' . $image . '.jpg" alt="' . $image . '">';
            echo '<div class="carousel-caption d-none d-md-block">';
              echo '<h3>' . ucfirst($image) . '</h3>';
            echo '</div>';
        echo '</div>';
        
        $imageCount++;
    }




?>
