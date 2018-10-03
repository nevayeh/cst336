<!DOCTYPE html>
<html>
    <head>
        <title>HTML Forms Experimentation</title>
    </head>
    <body>
        
        <!--<form action="save.php" method="POST">-->
        <!--<form method="POST">-->
        <!--<form>-->
        <form action="save.php?isItCool=sure" method="POST">
        <!--<form action="save.php?isItCool=sure" method="GET">-->
            <div>
                <!--'for' attribute is tied to 'id' of input, not 'name'-->
                <label for="name">Name:</label> 
                <!--<input type="text" name="name" id="name" />-->
                <input type="text" id="name" />
            </div>
            <div>
                <label for="issues">Issues:</label>
                <div id="issues">
                    <!--<div><input type="checkbox" name="issues[]" value="1" /> Lagging</div>-->
                    <!--<div><input type="checkbox" name="issues[]" value="2" /> Not connecting</div>-->
                    <!--<div><input type="checkbox" name="issues[]" value="3" /> Can't login</div>-->
                    <!--<div><input type="checkbox" name="issues[]" value="0" /> Other</div>-->
                    
                    <div><input type="checkbox" name="issues" value="1" /> Lagging</div>
                    <div><input type="checkbox" name="issues" value="2" /> Not connecting</div>
                    <div><input type="checkbox" name="issues" value="3" /> Can't login</div>
                    <div><input type="checkbox" name="issues" value="0" /> Other</div>
                </div>
            </div>
            <div>
                <label for="name">Comments:</label> 
                <div>
                    <textarea name="comments" rows="3"></textarea>
                </div>
            </div>
            <div>
                <!--<input type="submit" value="Save" />-->
                <!--<input type="button" value="Save" />-->
                <button>Save With Button</button>
            </div>
        </form>
        
    </body>
</html>

<?php

require('log.inc.php');

?>

