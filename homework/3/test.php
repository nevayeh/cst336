<!DOCTYPE html>
<html>
    <head>
        <title> </title>
    </head>
    <body>
        
        <form>
            <label><input name="columns['Property Name']" type="checkbox" value="pname" />Property Name</label>
            <label><input name="columns['Price']" type="checkbox" value="2000" />Price</label>
            <label><input name="columns['Location']" type="checkbox" value="New Road" />Location</label>
            <label><input name="columns['Owner']" type="checkbox" value="Joe Smith" />Owner</label>

        </form>
    
        <?php
            $columns = $_GET["columns"]; // or $_POST
        
            echo $columns["Property Name"] ;   // pname
            echo $columns["Price"] ;           // 2000
            echo $columns["Location"] ;        // New Orad
            echo $columns["Owner"] ;           // Joe Smith        
        
        ?>
        

    </body>
</html>