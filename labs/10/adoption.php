<!DOCTYPE html>
<html>
    <head>
        <title> CSUMB: Pet Shelter </title>
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="css/styles.css">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>   

    </head>
    <body onload="setActiveNav('adoption')">
            
        <?php
            include "inc/navigation.php";
            include "inc/header.php";
            include "inc/pets-functions.php";
            
            $pets = getPets();
    
            foreach($pets as $pet)
            {
                echo '<div class="petInfo">';
                
                    echo "Name: ";
                
                    echo '<button type="button" class="petModalButton" data-toggle="modal" data-target="#petModal" onclick="createModal(this.innerText)">';
                        echo $pet['name'];
                    echo '</button>';
                
                    echo '<button type="button" class="adoptButton btn btn-secondary" id="' . $pet['name'] . '" data-toggle="modal" data-target="#petModal" onclick="adopt(this.id)">';
                        echo "Adopt Me!";
                    echo '</button> <br/>';
                
                    echo "Type: " . $pet['type'] . "<br/>";
                
                echo "</div>";
                
                echo "<br/><br/>";
            }
            
            echo '<div class="modal fade" id="petModal" tabindex="-1" role="dialog" aria-labelledby="petModalLabel" aria-hidden="true">';
                echo '<div class="modal-dialog modal-lg" role="document">';
                    echo '<div class="modal-content">';
                        echo '<div class="modal-header">';
                            echo '<h5 class="modal-title" id="petModalLabel"></h5>'; //PET NAME GOES IN HERE
                            echo '<button type="button" class="close" data-dismiss="modal" aria-label="Close">';
                                echo '<span aria-hidden="true">&times;</span>';
                            echo '</button>';
                        echo '</div>';
                        echo '<div class="modal-body">';
                            echo '<div style="inline-block" id="petImgDiv"></div>'; //PET IMAGE URL GOES HERE
                            echo '<div style="inline-block" id="petInfoDiv" ></div>'; //PET INFO GOES HERE
                        echo '</div>';
                        echo '<div class="modal-footer">';
                            echo '<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>';
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            echo '</div> <br/>';
        ?>
        
        <script src="js/functions.js"></script>
        <script src="js/pets.js"></script>    

    </body>
</html>