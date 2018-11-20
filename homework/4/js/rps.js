var imgPlayer;
var btnRock;
var btnPaper;
var btnScissors;
var btnGo;

//var computerChoice;
var playerChoice;

//Giving color to specific end game messages
var winMessage = '<span style="color:rgb(80, 255, 80);">YOU WIN</span>';
var loseMessage = '<span style="color: rgb(255, 80, 80);">YOU LOSE</span>';
var tieMessage = '<span style="color: rgb(255, 255, 80);">TIE</span>';

function init(){
	imgPlayer = document.getElementById("imgPlayer");
	btnRock = document.getElementById("btnRock");
	btnPaper = document.getElementById("btnPaper");
	btnScissors = document.getElementById("btnScissors");
	btnGo = document.getElementById("btnGo");
	deselectAll();
}
	
function deselectAll()
{
	btnPaper.style.backgroundColor = "silver";
	btnScissors.style.backgroundColor = "silver";
	btnRock.style.backgroundColor = "silver";
}

function setOtherButtonsTextBlack()
{
	btnPaper.style.color = "black";
	btnScissors.style.color = "black";
	btnRock.style.color = "black";	
}

function setOtherLabelsTextBlack()
{
	document.getElementById("lblRock").style.color = "black";
	document.getElementById("lblPaper").style.color = "black";
	document.getElementById("lblScissors").style.color = "black";	
}

function select(choice)
{
	playerChoice = choice;
	imgPlayer.src = "img/" + choice + ".png";
	deselectAll();
	if(choice == "rock")
	{
		btnRock.style.backgroundColor = "#888888";
		setOtherButtonsTextBlack();
		btnRock.style.color = "white";
	}
	if(choice == "paper")
	{
		btnPaper.style.backgroundColor = "#888888";
		setOtherButtonsTextBlack();
		btnPaper.style.color = "white";
	}
	if(choice == "scissors")
	{
		btnScissors.style.backgroundColor = "#888888";
		setOtherButtonsTextBlack();
		btnScissors.style.color = "white";
	}
	
	// btnGo.style.visibility = "visible";
	btnGo.style.display = "block";
}

function go()
{
	var txtEndTitle = document.getElementById("txtEndTitle");
	var txtEndMessage = document.getElementById("txtEndMessage");
	
	var numChoice = Math.floor(Math.random() * 3); //0, 1, or 2
	var imgComputer = document.getElementById("imgComputer");
	
	document.getElementById("lblRock").style.backgroundColor = "#EEEEEE";
	document.getElementById("lblPaper").style.backgroundColor = "#EEEEEE";
	document.getElementById("lblScissors").style.backgroundColor = "#EEEEEE";
	
	//ROCK
	if(numChoice == 0)
	{
		imgComputer.src = "img/rock.png";
		document.getElementById("lblRock").style.backgroundColor = "rgb(80, 80, 255)";
		
		setOtherLabelsTextBlack();
		document.getElementById("lblRock").style.color = "white";
		
		if(playerChoice == "rock")
		{
			txtEndTitle.innerHTML = 'You both drew Rock';
			txtEndMessage.innerHTML = tieMessage;
		}
		else if(playerChoice == "paper")
		{
			txtEndTitle.innerHTML = 'Paper covers Rock';
			txtEndMessage.innerHTML = winMessage;
		}
		else if(playerChoice == "scissors")
		{
			txtEndTitle.innerHTML = 'Rock smashes Scissors';
			txtEndMessage.innerHTML = loseMessage;
		}
	}
	//PAPER
	else if(numChoice == 1)
	{
		imgComputer.src = "img/paper.png";
		document.getElementById("lblPaper").style.backgroundColor = "rgb(80, 80, 255)";
		
		setOtherLabelsTextBlack();
		document.getElementById("lblPaper").style.color = "white";
		
		if(playerChoice == "rock")
		{
			txtEndTitle.innerHTML = 'Paper covers Rock';
			txtEndMessage.innerHTML = loseMessage;
		}
		else if(playerChoice == "paper")
		{
			txtEndTitle.innerHTML = 'You both drew Paper';
			txtEndMessage.innerHTML = tieMessage;
		}
		else if(playerChoice == "scissors")
		{
			txtEndTitle.innerHTML = 'Scissors cuts Paper';
			txtEndMessage.innerHTML = winMessage;
		}
	}
	//SCISSORS
	else if(numChoice == 2)
	{
		imgComputer.src = "img/scissors.png";
		document.getElementById("lblScissors").style.backgroundColor = "rgb(80, 80, 255)";
		
		setOtherLabelsTextBlack();
		document.getElementById("lblScissors").style.color = "white";
		
		if(playerChoice == "rock")
		{
			txtEndTitle.innerHTML = 'Rock smashes Scissors';
			txtEndMessage.innerHTML = winMessage;
		}
		else if(playerChoice == "paper")
		{
			txtEndTitle.innerHTML = 'Scissors cuts Paper';
			txtEndMessage.innerHTML = loseMessage;
		}
		else if(playerChoice == "scissors")
		{
			txtEndTitle.innerHTML = 'You both drew Scissors';
			txtEndMessage.innerHTML = tieMessage;
		}
	}
	
	document.getElementById("endScreen").style.display = "block";
}

function startGame()
{
	document.getElementById("introScreen").style.display = "none";
}

function replay()
{
	document.getElementById("endScreen").style.display = "none";
}