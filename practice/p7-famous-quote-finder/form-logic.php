<?php

include_once "functions.php";
    
    // printArray($_POST);
    
    $sql = "SELECT * from p1_quotes WHERE 1";
    
    // if(!isset($_POST['submit']))
    // {
    //     displayQuotes($sql);
    // }

    if(isset($_POST['submit']) && isset($_POST['quoteKey']))
    {
        $sql .= " AND quote LIKE '%{$_POST['quoteKey']}%'";
    }
    if(isset($_POST['submit']) && !($_POST['category']== "Select One")){
        // $userCategory = $_POST['category'];
        // echo "<h1>CATEOGRY ONLY </h1>";
        $sql .= " AND category = '{$_POST['category']}'";
        
    }
    if(isset($_POST['submit']) && isset($_POST['quoteKey']) && !($_POST['category']=="Select One" ))
    {
        $sql .= "AND quote LIKE '%{$_POST['quoteKey']}%' AND category = '{$_POST['category']}' ";
    }
    if(isset($_POST['submit']) && isset($_POST['order']) )
    {
        $sql .= " ORDER BY quote";
        
        if(($_POST['order']) == 'ZA')
            $sql .= " DESC";
    }
    
    displayQuotes($sql);


?>