<?php
include 'database.php';
$dbConn = getDatabaseConnection();

// session_start(); 

//redirect user to login page if not logged in
// function checkLoggedIn() {
    // if (!isset($_SESSION['user_id'])) {
        // header("Location: login.php"); 
    // }
// }

$sql = "SELECT [COLUMN NAME(S)] FROM [TABLE NAME 1] INNER JOIN [TABLE NAME 2] ON [column name table1] = [column name table2] WHERE [condition]";




$statement = $dbConn->prepare($sql); 
$statement->execute(); 
$records = $statement->fetchAll(); 

    
return $records; 


/* //DELETE TO UNCOMMENT
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
    
    
    // return $records;  //DELETE TO UNCOMMENT
// }  //DELETE TO UNCOMMENT
