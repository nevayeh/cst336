<?php
//PLAN
//1. Generate a random number ==> store it in a session
//2. Have a form where user can enter their guess
//3. form validation logic ==> determine whether the guess is too high / low
//4. store the history in the session
//5. clear the session when the user clicks "start over"

session_start(); //always need this when you're using sessions

// print_r($_POST);

if(isset($_POST['destroy']))
{
    //unset($_POST['guess']);
    session_destroy();
    session_start(); //If you destroy the session, you need to start it again
}

//User has already clicked "destroy"
//So we move this logic to after the session_destroy
if(!isset($_SESSION['randomVal'])) //$_SESSION['randomVal'] ==> null, therefore isset will be false
{
    $_SESSION['randomVal'] = rand(1, 100); //Creates a random value and appends it to the randomVal array (?)
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Sessions Challenge Activity</title>
    </head>
    <body>

        <form method="post">
            Guess the number between 1 and 100 
            
            <br/>
            
            Your guess:
            <input type="text" name="guess" placeholder="Guess"/>
            <input type="submit" name="submit" value="Submit"></input>
            
            <br/><br/>
            
            <?php
                //Checking if guess == random value
                if(isset($_POST['guess']))
                {
                    // $_POST['guess'] == $_SESSION['randomVal'];
                    if($_POST['guess'] == $_SESSION['randomVal'])
                    {
                        echo '<span style="color:green;">Correct!</span><br/><br/>';
                    }
                    else if($_POST['guess'] > $_SESSION['randomVal'])
                    {
                        echo '<span style="color:red;">TOO HIGH</span><br/><br/>';
                    }
                    else if($_POST['guess'] < $_SESSION['randomVal']) //don't need if part in here (?) could just be "else"
                    {
                        echo '<span style="color:red;">TOO LOW</span><br/><br/>';
                    }
                    
                    $_SESSION['guessHistory'][] = $_POST['guess'];
                    $_SESSION['attempts'] = count($_SESSION['guessHistory']) - 1;
                }

                echo "Previous guesses: ";
                foreach($_SESSION['guessHistory'] as $guess)
                    echo $guess . " ";
                    
                echo "<br/> Number of Attempts: ";
                    echo $_SESSION['attempts'];
            ?>
            
            <br>
            
            <input type="submit" name="destroy" value="Start Over"></input>
        </form>
        
        <!--<br>Random number: </?php echo $_SESSION['randomVal']?>-->
        
    </body>
</html>