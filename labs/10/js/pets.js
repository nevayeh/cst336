var currentYear = new Date().getFullYear();

function createModal(name)
{
    $("#petModal").show();
    $("#modalBody").html("<img src='img/loading.gif'/>");
    
    $.ajax(
    {
        type: "get",
        url: "api/getPetInfo.php",
        dataType: "json",
        data: {"name": name} ,
        success: function(data, status)
        {
            $("#petModalLabel").html(data[0].name);
            $("#petImgDiv").html("<img style='width: 250px' src='img/" + data[0].name.toLowerCase() + ".jpg'/>")
                .css("display", "inline-block");
            
            $("#petInfoDiv").html("Age: " + (currentYear - data[0].yob) + "<br/>")
                .append("Breed: " + data[0].breed + "<br/>")
                .append(data[0].description + "</div>")
                .css("display", "inline-block")
                .css("text-align", "left")
                .css("padding-left", "25px");
        }, 
        //optional, used for debugging purposes
        complete: function(data, status)
        {
            //alert(status);
        },  
        error: function(data, status)
        {
            alert("error");   
            console.log(data);
            console.log(status);
        }
    });
}

function adopt(name)
{
    $.ajax(
    {
        type: "get",
        url: "api/getPetInfo.php",
        dataType: "json",
        data: {"name": name} ,
        success: function(data, status)
        {
            $("#petModalLabel").html("Thank you!");
            $("#petImgDiv").html("<img style='width: 250px' src='img/" + data[0].name.toLowerCase() + ".jpg'/>")
                .css("display: block");

            $("#petInfoDiv").html("You gave " + data[0].name + ", the " +
                data[0].color.toLowerCase() + " " + data[0].breed.toLowerCase());
            
            if(data[0].breed != data[0].type)
                $("#petInfoDiv").append(" " + data[0].type.toLowerCase());
            
            $("#petInfoDiv").append(", a home!")
                .css("display: block");
                
        }, 
        //optional, used for debugging purposes
        complete: function(data, status)
        {
            //alert(status);
        },  
        error: function(data, status)
        {
            alert("error");   
            console.log(data);
            console.log(status);
        }
    });
    
}