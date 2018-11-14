//VARIABLES
var selectedWord = "";
var selectedHint = "";
var board = [];
var remainingGuesses = 6;
//var words = ["snake", "monkey", "beetle"];
var words = [{word: "snake", hint: "It's a reptile"},
             {word: "monkey", hint: "It's a mammal"},
             {word: "beetle", hint: "It's an insect"}];
    
var alphabet = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H',
                'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P',
                'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];

var hintShown = 0;

var guessedWords = "";
var guessCount = 0;


//LISTENERS
window.onload = startGame();


$(".letter").click(function()
{
    checkLetter($(this).attr("id"));
    disableButton($(this));
});

$(".replayBtn").on("click", function()
{
   location.reload(); 
});

$("#hintButton").on("click", function()
{
    $("#hintButton").hide();
    hintShown = 1;
    displayHint();
});


//FUNCTIONS
function startGame()
{
    pickWord();
    initBoard();
    updateBoard();
    createLetters();
}

//Fill the board with underscores
function initBoard()
{
    for(var letter in selectedWord)
    {
        board.push("_");
    }
}

function pickWord()
{
    var randomInt = Math.floor(Math.random() * words.length);
    //selectedWord = words[randomInt]; //all lowercase letters
    selectedWord = words[randomInt].word.toUpperCase(); //uppercase letters
    selectedHint = words[randomInt].hint;
    
    //console.log("WORD: " + selectedWord);
}

//Updates the board accordingly to what has been guessed or not guessed
function updateBoard()
{
    $("#word").empty();
    
    for(var letter of board)
    {
        document.getElementById("word").innerHTML += letter + " ";
    }
    
    if(hintShown)
    {
        displayHint();
    }
}

/* Removing user input textbox and handler
//Using anonymous function
//Could have done it like this:
//var handler = function() { ... }
//$("#letterBtn").click(handler);
$("#letterBtn").click(function()
{
    var boxVal = $("#letterBox").val();
    console.log("You pressed the button and it had the value: " + boxVal);
})
*/

//Creates the letters inside the letters div
function createLetters()
{
    for(var letter of alphabet)
    {
        $("#letters").append("<button class='letter btn btn-secondary' id='" + letter + "'>" + letter + "</button>");
    }
}

//Checks to see if the selected letter exists in the selectedWord
function checkLetter(letter)
{
    var positions = new Array();
    
    //Put all the positions the letter exists in an array
    for(var i = 0; i < selectedWord.length; i++)
    {
        if(letter == selectedWord[i])
        {
            positions.push(i);
        }
    }

    //Correct guess, updates word accordingly
    if(positions.length > 0)
    {
        updateWord(positions, letter);
        
        //Check to see if this is a winning guess
        if(!board.includes("_"))
        {
            endGame(true);
        }
    }
    //Wrong guess, decreases number of remaining guesses
    else
    {
        remainingGuesses -= 1;
        updateMan();
    }
    
    //Last guess used up & word not solved --> Lose Game
    if(remainingGuesses == 0 && board.includes("_"))
    {
        endGame(false);
    }
}

//Update the current word then calls for a board update
function updateWord(positions, letter)
{
    for(var pos of positions)
    {
        board[pos] = letter;
    }
    
    updateBoard();
}

function updateMan()
{
    $("#hangImg").attr("src", "img/stick_" + (6 - remainingGuesses) + ".png");
}

//Ends the game by hiding game divs and displaying the win or loss divs
function endGame(win)
{
    $("#letters").hide();
    
    if(win)
    {
        //Nothing was guessed correctly yet
        //getItem will return null
        if(sessionStorage.getItem("guessHistoryCount") == null)
            guessCount = 1;
        //Must use Number() since getItem() will return a string
        //(Since you can only store a string into sessionStorage)
        else
            guessCount = Number(sessionStorage.getItem("guessHistoryCount")) + 1;
        
        sessionStorage.setItem("guessHistoryCount", guessCount);
        
        $("#won").show();
        
        /*
        //Uses local storage (persists after browser restart)
        guessedWords = localStorage.getItem("guessHistory") + selectedWord + "<br/>"; 
        localStorage.setItem("guessHistory", guessedWords); //uses local storage
        */
        
        //Uses session storage (does not persist after browser restart)
        //Adds the selectedWord onto a long string, separated by <br/>'s
        //Since sessionStorage only takes string
        
        //Checking if this is the first correct guess
        //This prevents "null" from appearing because
        //calling .getItem() with nothing previously stored will return null
        if(sessionStorage.getItem("guessHistoryCount") == 1)
        {
            guessedWords = "<h4>(" + sessionStorage.getItem("guessHistoryCount") + ") " + selectedWord + "</h4>";
        }
        else
        {
            guessedWords = sessionStorage.getItem("guessHistory") + "<h4>(" + sessionStorage.getItem("guessHistoryCount") + ") " + selectedWord + "</h4>";
        }
        sessionStorage.setItem("guessHistory", guessedWords);
        
        displayGuessedWords();
    }
    else
    {
        $("#lost").show();
    }
    
}

//Disables the button and changes the style to tell the user it's disabled
function disableButton(btn)
{
    btn.prop("disabled", true);
    btn.attr("class", "btn btn-danger");
}

function displayHint()
{
    $("#word").append("<br/>");
    $("#word").append("<span class='hint'>Hint: " + selectedHint + "</span>");
}

function displayGuessedWords()
{
    /*
    //Uses local storage
    $("#guessedWordsDiv").append(localStorage.getItem("guessHistory"));
    */
    
    //Uses session storage
    $("#guessedWordsDiv").append(sessionStorage.getItem("guessHistory"));
    
    $("#guessedWordsDiv").show();
}