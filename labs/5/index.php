<?php
    include 'functions.php';
    
    //Start the session in any php files where you will be using sessions
    session_start();
    
    //Create an array in teh Session to hold our cart items
    if(!isset($_SESSION['cart']))
    {
        $_SESSION['cart'] = array();
    }
    
    //Checks to see if the form is submitted
    if(isset($_GET['query']))
    {
        //Get access to our API function
        include 'wmapi.php';
        $items = getProducts($_GET['query']);
        // print_r($items);
    }
    
    //Check to see if an item has been added to the cart
    //If the 'itemName' is set, put it in the session cart and direct the user to the shopping cart
    if(isset($_POST['itemName']))
    {
        // $_SESSION['cart'] = $_POST['itemName']; //(only one item at a time, new item overwrites)
        // array_push($_SESSION['cart'], $_POST['itemName']); //only stores name
        
        //Creating an associative array to hold an item's properties
        $newItem = array();
        $newItem['name'] = $_POST['itemName'];
        $newItem['id'] = $_POST['itemId'];
        $newItem['price'] = $_POST['itemPrice'];
        $newItem['image'] = $_POST['itemImage'];
        
        //Check to see if other items with this id are in the array
        //If so, this item isn't new. Only update quantity
        //Must be passed by reference so that each item can be updated!
        foreach($_SESSION['cart'] as &$item)
        {
            if($newItem['id'] == $item['id'])
            {
                $item['quantity'] += 1;
                $found = true;
            }
        }
        
        //else add it to the array
        if($found != true)
        {
            $newItem['quantity'] = 1;
            array_push($_SESSION['cart'], $newItem); //Storing the item array in the cart array
        }
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <title>Products Page</title>
    </head>
    <body>
    <div class='container'>
        <div class='text-center'>
            
            <!-- Bootstrap Navagation Bar -->
            <nav class='navbar navbar-default - navbar-fixed-top'>
                <div class='container-fluid'>
                    <div class='navbar-header'>
                        <a class='navbar-brand' href='#'>Shopping Land</a>
                    </div>
                    <ul class='nav navbar-nav'>
                        <li><a href='index.php'>Home</a></li>
                        <!--<li><a href='scart.php'>Cart</a></li>-->
                        <li><a href='scart.php'>
                            <span class='glyphicon glyphicon-shopping-cart' aria-hidden='true'>
                            </span> Cart: <?php displayCartCount(); ?> </a></li>
                    </ul>
                </div>
            </nav>
            <br /> <br /> <br />
            
            <!-- Search Form -->
            <form enctype="text/plain">
                <div class="form-group">
                    <label for="pName">Product Name</label>
                    <input type="text" class="form-control" name="query" id="pName" placeholder="Name">
                </div>
                <input type="submit" value="Submit" class="btn btn-default">
                <br /><br />
            </form>
            
            <!-- Display Search Results -->
            <?php displayResults(); ?>
            
        </div>
    </div>
    </body>
</html>