/* --------------------- VARIABLES --------------------- */

var firstNameMissing = "Missing first name";
var lastNameMissing = "Missing last name";
var emailMissing = "Missing email";
var phoneNumberMissing = "Missing phone number";
var zipMissing = "Missing zip code";
var stateMissing = "Missing state";
var usernameMissing = "Missing username";
var passwordMissing =  "Missing password";
var passwordConfirmMissing = "Missing password confirmation";

var zipFound = false;
var countySelected = false;
var usernameAvailable = false;
var matchingPasswords = false;



/* --------------------- LISTENERS --------------------- */

$("#username").change(checkUsername);

$("#password").change(validatePassword);
$("#passwordConfirm").change(validatePassword);



/* --------------------- FUNCTIONS --------------------- */

//Populates county dropdown menu based on what is entered into state field
function getCountyList_jQuery()
{
    $.ajax(
    {
        type: "get",
        url: "http://itcdland.csumb.edu/~milara/ajax/countyList.php",
        dataType: "json",
        data: { "state": $("#state").val() },
        success: function(data,status)
        {
            // alert(data);
            
            //If the state entered was INvalid, data will return as an empty object
            //This checks to make sure that data is NOT an empty object
            //(AKA the stat was entered properly and exists)
            if(!jQuery.isEmptyObject(data))
            {
                $("#countyValidation").html("");
                
                $("#county").html("<option>Select One</option>");
                for (var i=0; i< data.length; i++){
                    $("#county").append("<option>" + data[i].county + "</option>");
                }
            }
            //In this case, the data returned would have been an empty object
            //This means that the input entered into "state" isn't valid
            else
            {
                $("#county").html("");
                
                $("#countyValidation").html("State not found! Try typing as two letters");
            }
             
        },
        //optional, used for debugging purposes
        complete: function(data,status)
        { 
            //alert(status);
        }
    });
}

//Fills in city info based on what city is entered
function getZipList_jQuery()
{
    //If the field had something and then was cleared
    if($("#zip").val() == "")
    {
        $("#zipValidation").html("");
        
        //Clears the fields
        //Prevents "leftover" data from previous results
        $("#citySpan").html("");
        $("#latSpan").html("");
        $("#longSpan").html("");
    }
    //Won't go into this if the person was just clearing the field
    else
    {
        $.ajax(
        {
            type: "get",
            url: "http://itcdland.csumb.edu/~milara/ajax/cityInfoByZip.php",
            dataType: "json",
            data: { "zip": $("#zip").val() },
            success: function(data,status)
            {
                // alert(data);
                
                //If the zip is not found, it returns a boolean of false
                //So !data checks for when the zip is NOT found
                if(!data)
                {
                    $("#citySpan").html("");
                    $("#latSpan").html("");
                    $("#longSpan").html("");
                    
                    zipFound = false;
                    $("#zipValidation").html("Zip code not found!");
                }
                //Zip is found
                else
                {
                    $("#citySpan").html(data['city']);
                    $("#latSpan").html(data['latitude']);
                    $("#longSpan").html(data['longitude']);
                    
                    zipFound = true;
                    $("#zipValidation").html("");
                }
            }, 
            //optional, used for debugging purposes
            complete: function(data,status)
            {
                //alert(status);
            }  
        });
    }
}

//Checks username availability
function checkUsername()
{
    //alert($(this).val()); //showing the username entered, for testing purposes
     
    //If they had something and then cleared the field
    if($("#username").val() == "")
        $("#usernameValidation").html("");
    //Won't go into this if the person was just clearing the field
    else
    {
        $.ajax(
        {
            type: "get",
            url: "usernameLookup.php",
            data: { "username": $(this).val()},
            success: function(data,status)
            {
                //alert(data); //displaying data received, for testing purposes

                if (data == "Available")
                {
                    $("#usernameValidation").html("Available!"); 
                    $("#usernameValidation").attr("class","badge badge-success");
                    usernameAvailable = true;
                 }
                else
                {
                    $("#usernameValidation").html("Username already taken!");
                    $("#usernameValidation").attr("class","badge badge-danger");
                    usernameAvailable = false;
                }
            }
        });
    }
}

//Checks if the passwords match
function validatePassword()
{
    //Makes sure there is something input into password and
    //password confirmation fields before checking if they match
    if((!$("#password").val() == "" &&
        !$("#passwordConfirm").val() == "") &&
        ($("#password").val() != $("#passwordConfirm").val()))
    {
        $("#passwordValidation").html("Passwords dont match!"); 
        
        matchingPasswords = false;
    }
    //If passwords match, "clears" the span
    //Necessarily to remove the error message in the case they fix it
    else
    {
        $("#passwordValidation").html("");
        matchingPasswords = true;
    }
}

//Goes through and checks all the fields of the "form"
//Appends error messages (defined in variables section) to an array called submissionErrors
function submit()
{
    //Resets every time the submit button is clicked
    //Since the page doesn't reload, need to reset it
    //Otherwise the array will keep accumulating
    var submissionErrors = [];
    
    $("#submitErrorsDiv").html("");
    
    if($("#firstName").val() == "")
        submissionErrors.push(firstNameMissing);

    if($("#lastName").val() == "")
        submissionErrors.push(lastNameMissing);
            
    if($("#email").val() == "")
        submissionErrors.push(emailMissing);
        
    if($("#phoneNumber").val() == "")
        submissionErrors.push(phoneNumberMissing);
    
    if($("#zip").val() == "" && !zipFound)
        submissionErrors.push(zipMissing);

    if($("#state").val() == "")
        submissionErrors.push(stateMissing);
        
    if($('#county option:selected').text() == "Select One")
    {
        $("#countyValidation").html("Select a county<br/>");
        countySelected = false;
    }
    else
    {
        $("#countyValidation").html("");
        countySelected = true;    
    }
        
    if($("#username").val() == "")
        submissionErrors.push(usernameMissing);
            
    if($("#password").val() == "")
        submissionErrors.push(passwordMissing);
            
    if($("#passwordConfirm").val() == "")
        submissionErrors.push(passwordConfirmMissing);

    //No empty fields, chooses available username, and passwords match
    if(submissionErrors.length == 0
        && zipFound 
        && countySelected
        && usernameAvailable
        && matchingPasswords)
    {
        $("#submissionSuccess").html("Good to go!<br/>");
        $("#submissionSuccess").attr("class", "btn btn-success");
        $("#submissionSuccessIcon").show();
    }
    else
    {
        displayErrors(submissionErrors);
        $("#submissionSuccess").html("");
        
    }
}

//Takes the submissionErrors array and displays each message into the "submitErrorsDiv" div
function displayErrors(submissionErrors)
{
    //Putting it here because it wasn't working when in the CSS file alone
    $("#submitErrorsDiv").css("color", "red");
    
    $("#submitErrorsDiv").html("<br/>");
    
    for(var i = 0; i < submissionErrors.length ; i++)
    {
        $("#submitErrorsDiv").append(submissionErrors[i] + "<br/>")
    }
}