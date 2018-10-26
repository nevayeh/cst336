<?php

if(isset($_POST['submit']) && !($_POST['quote'] == "" ) && !($_POST['author'] == ""))
{
    createQuote($_POST['quote'], $_POST['author']);
    // echo "<form>";
    // echo '<INPUT TYPE="hidden" NAME="redirect" VALUE="midterm.php">';
    // echo "</form>";
}
    

?>