// alert("hi1");

// var userLogged = "";

function login()
{
    if(($("#username").val() == "user_1" || $("#username").val() == "user_2")
        && $("#password").val() == "s3cr3t")
    {
            // header('Location: quiz.html');
            // userLogged = $("#username").val();
            
            localStorage.setItem("userLogged", $("#username").val());
            
            window.location = "quiz.html";
            
            // $("#userValidationMessage").html("Success");
    }
    else
        // document.write('<span stlye="color:red;">INVALID CREDENTIALS</span>');
        $("#userValidationMessage").html("Invalid Credentials");
        
    // console.log("userLogged SHOULD BE " + $("#username").val());
    // console.log("userLogged: " + localStorage.getItem("userLogged"));
    
}

function quiz()
{
    // console.log("userLogged after: " + localStorage.getItem("userLogged"));
    // console.log("userLogged type: " + typeof localStorage.getItem("userLogged"));
    // alert("logged in" + localStorage.getItem("userLogged"));
    
    $("#welcomeUserHeading").html("Welcome " + localStorage.getItem("userLogged") + "!");
    $("#welcomeUserHeading").css("background-color", "paleturquoise");
    $("#welcomeUserHeading").css("padding", "10px");
}

function submitQuiz()
{
    // alert("hi");
    // console.log("grade quiz now");
    console.log($("input[name=answer2]:checked").val())
    
    // $("#input[name=rbnNumber]:checked'").val();
    
    //Answer 1
    if($("#answer1").val() == "")
    {
        $("#question1Score").html("");
        $("#question1Score").css("background-color", "");
    }
    else if($("#answer1").val() == "1994")
    {
        $("#question1Score").html("Correct! The answer is <strong>1994</strong>");
        $("#question1Score").css("color", "green");
    }
    else
    {
        $("#question1Score").html("Incorrect! The answer is <strong>1994</strong>");
        $("#question1Score").css("color", "red");
    }
    $("#question1Score").css("background-color", "yellow");
    $("#question1Score").css("padding", "5px");
    
    
    //Answer 2
    if($("input[name=answer2]:checked").val() == "")
    {
        $("#question2Score").html("");
        $("#question2Score").css("background-color", "");
    }
    else if($("input[name=answer2]:checked").val() == "monte")
    {
        $("#question2Score").html("Correct! The answer is <strong>Monte Rey</strong>");
        $("#question2Score").css("color", "green");
    }
    else
    {
        $("#question2Score").html("Incorrect! The answer is <strong>Monte Rey</strong>");
        $("#question2Score").css("color", "red");
    }
    $("#question2Score").css("background-color", "yellow");
    $("#question2Score").css("padding", "5px");
    
}