<?php
session_start(); 
include 'functions.php';

checkLoggedIn(); 


$memeID = $_GET['id'];
deleteMemeFromDB($memeID); 

//Redirects back to Profile page after meme deletion
header('Location: profile.php');

?>
