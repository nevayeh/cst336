<?php
//include 'database.php';
include_once 'database.php';
$dbConn = getDatabaseConnection();

session_start(); 

//redirect user to login page if not logged in
function checkLoggedIn() {
    if (!isset($_SESSION['user_id'])) {
        header("Location: login.php"); 
    }
}


function searchForMemes($userID = '') {
    global $dbConn; 
    
    $sql = "SELECT 
            all_memes_pt_2.id,
            all_memes_pt_2.line1, 
            all_memes_pt_2.line2, 
            categories.meme_url 
            FROM all_memes_pt_2 INNER JOIN categories 
            ON all_memes_pt_2.category_id = categories.category_id 
            WHERE 1"; 
    
    if (!empty($userID)) {
      $sql .= " AND user_id = '$userID'"; 
    }

    
    if(isset($_POST['search'])) {
      // query the databse for any records that match this search
      $sql .= " AND (line1 LIKE '%{$_POST['search']}%' OR line2 LIKE '%{$_POST['search']}%')";
    } 
    
    //if(isset($_POST['meme-type-search']) && !empty($_POST['meme-type-search'])) {
      //$sql .= " AND meme_type = '{$_POST['meme-type-search']}'"; 
    //}
    
    if(isset($_POST['meme-type']) && !empty($_POST['meme-type']))
    {
      $sql .= " AND meme_type = '{$_POST['meme-type']}'"; 
    }
    
    if(isset($_POST['order-by-date']))
    {
      $sql .= " ORDER BY create_date"; 
    
      if ($_POST['order-by-date'] == 'newest-first')
      {
        $sql .= " DESC"; 
      }
    }
    
    $statement = $dbConn->prepare($sql); 
    $statement->execute(); 
    $records = $statement->fetchAll(); 
    
    
    /*
    // ------- TRYING SQL INJECTION PREVENTION -------
    //DOESN'T WORK
    
    if(isset($_POST['search']))
    {
        //query the database for any records that match this search
        $sql .= "AND (line1 LIKE '%:search%' OR line2 LIKE '%:search%')";
    }
    
    //if(isset($_POST['meme-type-search']) && !empty($_POST['meme-type-search']))
    if(isset($_POST['meme-type']) && !empty($_POST['meme-type'])) {
    {
        $sql .= " AND meme_type = '%:meme_type_search%'"; 
    }
    
    $statement = $dbConn->prepare($sql);
    $statement->execute(array(':search' => $_POST['search'], ':meme_type_search' => $_POST['meme-type-search']));
    

    $records = $statement->fetchAll(); 
    
    */
    
    
    return $records; 
} 

function displayMemes($records, $editable=false) {
  echo '<div class="memes-container">'; 
    
      
  foreach ($records as $record) {
       $memeURL = $record['meme_url']; 
       echo  '<div class="meme-div" style="background-image:url('. $memeURL .')">'; 
       echo  '<h2 class="line1">' . $record["line1"] . '</h2>'; 
       echo  '<h2 class="line2">' . $record["line2"] . '</h2>'; 
       
        if ($editable) {
            echo '<div class="edit-menu">'; 
            echo '<a href="edit.php?id='. $record['id'].'">Edit</a>'; 
            echo ' <a href="delete.php?id='. $record['id'].'">Delete</a>'; 
            echo '</div>'; 
        }
        
       echo  '</div>'; 
  }
  
  echo '<div style="clear:both"></div>'; 
  echo '</div>'; 
}

// Fetch the category_id from the categories table for the chosen meme type

function getCategoryID($memeType) {
  global $dbConn; 
  
  $sql = "SELECT category_id from categories WHERE meme_type = '$memeType'";
     
  $statement = $dbConn->prepare($sql); 
  
  $statement->execute(); 
  $records = $statement->fetchAll(); 
  $categoryID = $records[0]['category_id']; 
  
  //Prints categoryID at top of page
  //echo "categoryID: $categoryID <br/>"; 
  
  return $categoryID; 
}

// fetch the newly created meme object from database JOINED with the
// the appropriate category information (meme url)
    
function fetchMemeFromDB($memeID) {
  global $dbConn; 
    
  
  $sql = "SELECT 
        all_memes_pt_2.id,
        all_memes_pt_2.line1, 
        all_memes_pt_2.line2, 
        categories.meme_url,
        categories.meme_type 

        FROM all_memes_pt_2 INNER JOIN categories 
        ON all_memes_pt_2.category_id = categories.category_id 
        WHERE all_memes_pt_2.id = $memeID"; 
  
  
  $statement = $dbConn->prepare($sql); 
  
  $statement->execute(); 
  $records = $statement->fetchAll(); 
  $newMeme = $records[0]; 
  
  return $newMeme; 
}


function createMeme($line1, $line2, $memeType) {
    global $dbConn; 
    
    //Step 1: Get the category ID for the selected meme type
    $categoryID = getCategoryID($memeType); 
    
    //Step 2: Insert the meme information (along with the category ID) into the
    // all_memes_pt_2 table
    $result = insertMeme($line1, $line2, $categoryID); 
    
    //Step 3: Fetch the new meme joined with the meme_url information
    $last_id = $dbConn->lastInsertId();
    $newMeme = fetchMemeFromDB($last_id); 
    return $newMeme; 


}


// INSERT the new meme into the all_memes_pt_2 table

function insertMeme($line1, $line2, $categoryID) {
    global $dbConn; 
    
    /*
    $sql = "INSERT INTO `all_memes_pt_2` 
      (`id`, `line1`, `line2`, `category_id`, `create_date`) 
      VALUES 
      (NULL, '$line1', '$line2', '$categoryID', NOW());"; 
    */
      
    $sql = "INSERT INTO `all_memes_pt_2` 
    (`id`, `line1`, `line2`, `category_id`, `create_date`, `user_id`) 
    VALUES 
    (NULL, '$line1', '$line2', '$categoryID', NOW(), '{$_SESSION['user_id']}');"; 

    
    $statement = $dbConn->prepare($sql); 
    $result = $statement->execute(); 
    
    return $result; 
    
}

function generateOptions($selectedType) {
    $memeTypes = array(
        "college-grad" => "Happy College Grad", 
        "thinking-ape" => "Deep Thought Monkey", 
        "coding" => "Learning to Code", 
        "old-class" => "Old Classroom"); 
    
    foreach ($memeTypes as $memeType => $description) {
        //echo "<option value='$memeType'>$description</option>"; 
        echo "<option "; //updated to show values that are already there
        
        if ($selectedType == $memeType)
          echo "selected='selected' "; 
            
        echo "value='$memeType'>$description</option>"; 

    }
}

function editMeme($id, $line1, $line2, $memeType) {
  global $dbConn; 
  
  
  //Step 1: Get the category ID for the selected meme type
  $categoryID = getCategoryID($memeType); 
  
  
  //Step 2: Update the meme record in the all_memes table

  $sql = "UPDATE `all_memes_pt_2` 
            SET 
              line1 = :line1, 
              line2 = :line2, 
              category_id = :category_id
            WHERE 
              id = :id"; 

  
  $statement = $dbConn->prepare($sql); 
  $statement->execute(array(
      ':line1' => $line1, 
      ':line2' => $line2, 
      ':category_id' => $categoryID, 
      ':id' => $id
      ));
}


function deleteMemeFromDB($memeID) {
  global $dbConn; 
  
  $sql = "DELETE  
    FROM all_memes_pt_2 
    WHERE all_memes_pt_2.id = $memeID"; 
  
  
  $statement = $dbConn->prepare($sql); 
  
  $statement->execute(); 
}


?>