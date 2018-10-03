<?php
    $backgroundImage = "img/sea.jpg";
    
    //API call goes here
    if(isset($_GET['keyword']))
    {
        // echo "You searched for: " . $_GET['keyword'];
        include 'api/pixabayAPI.php';
        $imageURLS = getImageURLS($_GET['keyword']);
        // print_r($imageURLS);
        $backgroundImage = $imageURLS[array_rand($imageURLS)];
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Image Carousel</title>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
        <style>
            @import url("css/styles.css");
            
            body
            {
                background-image: url('<?=$backgroundImage ?>');
                background-repeat: no-repeat;
                background-size:cover;
            }
            
            #keywordWarning
            {
                background-color: black;
            }
            
            .radioButtonLabel
            {
                font-size: 30px;
            }
            
            input[type='radio']
            {
                transform: scale(2);
            }
            
            .radioBiggerButton + label::before {
                width: 0.75em;
                height: 0.75em;
            }
        </style>
    </head>
    <body>
        <br/><br/>
        
        <?php
            if(!isset($_GET['keyword']) || $_GET['keyword'] == "")
            {
                
                unset($_GET['keyword']);
                unset($imageURLS);
            }
            if(!isset($imageURLS))
            {
               echo '<h2 id="keywordWarning"> Type a keyword to display a slideshow <br/> with random images from Pixabay.com </h2>';
            }
            else
            {
                
        ?>
    
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!--Indicators Here-->
            <ol class="carousel-indicators">
                <?php
                    for($i = 0; $i < 7; $i++)
                    {
                        echo "<li data-target='#carousel-example-generic' data-slide-to='$i'";
                        echo ($i == 0) ? " class='active'" : "";
                        echo "></li>";
                    }
                ?>
            </ol>
            
            <!--Wrapper for Images-->
            <div class="carousel-inner" role="listbox">
                <?php
                        //Display Carousel Here
                        for($i = 0; $i < 7; $i++)
                        {
                            // echo "<img src='" . $imageURLS[$i] . "' width='200'>"; //always takes the first 5 from the array (same pics)
                            // echo "<img src='" . $imageURLS[rand(0, count($imageURLS))] . "' width='200'>"; //random pics, but duplicates possible
                            
                            //Random pics, no duplicates
                            do
                            {
                                $randomIndex = rand(0, count($imageURLS));
                            }
                            while(!isset($imageURLS[$randomIndex]));
                            
                            // echo "<img src='" . $imageURLS[$randomIndex] . "' width='200' >";
                            // unset($imageURLS[$randomIndex]);
                            
                            //Slide portion of the carousel
                            echo '<div class="carousel-item '; //was initially "item" but using "carousel-item" since it's [more recent than] the latest version [at the time] of Bootstrap (4.1.1)
                            echo ($i == 0) ? "active" : ""; //if $i is 0, it will add "active" to the list of classes for this div
                                                            //without this class, none of the slides would be active and visible to the user
                            echo '">';
                            echo '<img src="' . $imageURLS[$randomIndex] . '" height="500">';
                            echo '</div>';
                            unset($imageURLS[$randomIndex]);
                        }
                    } //End of "else" statement (from above) //Not in the example (?)
                ?>
        
            </div>
            
            <!--Controls Here-->
            <a class="left carousel-control" href="$carousel-example-generic" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="$carousel-example-generic" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
            
            
        </div>

        <!--HTML form goes here-->

        <form>
            <!--
            NOTE: I had a text field and select tag initially, but they were storing as two separate "keyword" values
            (In the URL, it would say "keyword=&keyword=&layout=")
            I decided to use datalist to keep it one value
            -->
        
            <!--<input type="text" name="keyword" placeholder="Keyword">-->
            <!--<select name ="keyword" id="selectMenu">-->
                <!--<option name ="keyword" value="dog">Dog</option>-->
                <!--<option name ="keyword" value="cat">Cat</option>-->
                <!--<option name ="keyword" value="otter">Otter</option>-->
                <!--<option name ="keyword" value="sky">Sky</option>-->
                <!--<option name ="keyword" value="aurora">Aurora</option>-->
            
            <input id="keywordList" list="sampleKeywords" name="keyword" placeholder="Keyword (Type or Select)" style="width:13em;"/>
            <datalist id="sampleKeywords">
                <option value="Dog">
                <option value="Cat">
                <option value="Otter">
                <option value="Sky">
                <option value="Aurora">
            </datalist>
            
            <input type="submit" value="Submit">
            
            <br/>
            
            <input type="radio" name="layout" value="horizontal" class="radioBiggerButton" checked="checked">
                <label for="horizontal" class="radioButtonLabel">Horizontal</label><br/>
                
            <input type="radio" name="layout" value="vertical" class="radioBiggerButton">
                <label class="radioButtonLabel">Vertical</label>
        </form>
    
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    </body>
</html>