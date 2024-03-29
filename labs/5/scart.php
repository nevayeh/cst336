<?php
    include 'functions.php';
    
    session_start();
    
    //If 'removeId' has been sent, search the cart for that itemID and unset it
    if(isset($_POST['removeId']))
    {
        foreach($_SESSION['cart'] as $itemKey => $item)
        {
            if($item['id'] == $_POST['removeId'])
            {
                unset($_SESSION['cart'][$itemKey]);
            }
        }
    }
    
    //If 'itemId' quantity has been sent, search for the item with that ID and update quantity
    if(isset($_POST['itemId']))
    {
        // echo "<br/><br/><br/><br/><br/>" . '<h1 style="background-color:green;">' . "HELLO</h1>";
        // echo "<br/><br/><br/><br/>" . '<h1 style="background-color:blue;">' . $_POST['itemId'] . "OWO</h1><br/>";
        // echo "<br/><br/><br/><br/><br/>" . '<h1 style="background-color:green;">' . "GOODBYE</h1>";
        
        foreach($_SESSION['cart'] as &$item)
        {
            // echo '<h1 style="background-color: pink;">Hey</h1><br>';
            // echo $_POST['itemId'];
            
            if($item['id'] == $_POST['itemId']) //Doesn't update quantities
            {
                $item['quantity'] = $_POST['update'];
            }
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
        <title>Shopping Cart</title>
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
                <h2>Shopping Cart</h2>
                
                <!-- Cart Items -->
                
                <!--</?php-->
                <!--
                    if(isset($_SESSION['cart']))
                    {
                        // echo $_SESSION['cart'];
                        displayCart();
                    }
                ?>
                -->
                
                <?php displayCart(); ?> <!-- Following format of example final code -->
                

            </div>
        </div>
    </body>
</html>