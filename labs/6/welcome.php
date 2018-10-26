<?php
include_once "database.php";
    
function displayCoverMeme()
{
    $dbConn = getDatabaseConnection();
    
    $sql = "SELECT * from all_memes WHERE 1";  
    
    $statement = $dbConn->prepare($sql); 
    
    $statement->execute(); 
    $records = $statement->fetchAll(); 
    
    // echo "sql: $sql <br/>";
    
    // echo "<pre>";
    // var_dump($records);
    // echo "</pre>";
    
    $record = $records[array_rand($records)];
    
    // echo "<pre>";
    // var_dump($record);
    // echo "</pre>";
    
      // $memeURL = $record['meme_url']; 
      $memeURL = $record['meme_url'];
      // <!--<img height="100px" width="150px" src="https://www.publicdomainpictures.net/pictures/90000/velka/alpaca-chewing.jpg" alt="a-chewing-alpaca">-->
      // echo  '<img height="100px" width="150px" src="' . $memeURL . '" alt="' . $record['meme_type'] . '">';
      
       echo  '<div class="meme-div" style="background-image:url('. $memeURL .'); width:300px; height:350px;">'; 
       echo  '<h2 class="line1 meme-heading">' . $record["line1"] . '</h2>'; 
       echo  '<h2 class="line2 meme-heading">' . $record["line2"] . '</h2>'; 
       echo  '</div>'; 
    
}

?>


<!DOCTYPE html>
<html>
  <head>
    <title>Welcome</title>
    <style>
      .meme-div{
        width: 450px;
        height: 450px;
        background-size: cover;
        text-align: center;
        position: relative;
        font-size: 18px;
      }
            
      /*h2 {*/
      .meme-heading {
        position: absolute;
        left: 0;
        right: 0;
        margin: 15px 0;
        padding: 0 5px;
        font-family: impact;
        color: white;
        text-shadow: 1px 1px black;
      }
      
      /*#welcomeHeading*/
      /*{*/
      /*  font-family: arial;*/
      /*}*/
      
      .line1 {
         top: 0;
       }
      .line2 {
         bottom: 0;
       }
    </style>
  </head>
  <body>
    <h1>Meme Generator</h1>
    
    <!--<img height="100px" width="150px" src="https://www.publicdomainpictures.net/pictures/90000/velka/alpaca-chewing.jpg" alt="a-chewing-alpaca">-->
    <?php displayCoverMeme(); ?>
    
    <h2 id="welcomeHeading">Welcome to my Meme Generator!</h2>
    
    <form method="post" action="meme.php">
        Line 1: <input type="text" name="line1"></input> <br/>
        Line 2: <input type="text" name="line2"></input> <br/>
        Meme Type:
        <select name="meme-type">
          <option value="college-grad">Happy College Grad</option>
          <option value="thinking-ape">Deep Thought Monkey</option>
          <option value="coding">Learning to Code</option>
          <option value="old-class">Old Classroom</option>
        </select>

        <input type="submit"></input>
    </form>
    
    <a href="./meme.php">View all memes</a>
    
    <br/><br/><br/>
    
    
  </body>
</html>