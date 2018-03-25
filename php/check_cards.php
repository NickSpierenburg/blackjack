<?php
session_start();
require_once('../includes/credentials.php');
$conn = createconnect($host,$dbusername,$dbpassword,$db_name);

echo "YOYO";
if (isset($_GET['playerData'])){
    $playerValue = array_sum($_GET['playerData']);
    global $playerValue;
            
    if($playerValue > 21){
        return "Your cards exceed 21. You lose this round... Noob";
    }elseif($playerValue == 21){
        return "BLACKJACK!!!!!!!! (lucky bastard)";
    }elseif($playerValue < 21){
        return "your score is :".$cardValue;
    }
}
if(isset($_GET['dealerData'])){
    global $playerValue;
    
    $bankValue = array_sum($_GET['dealerData']);
    
    if($bankValue > 21){
        return "Exceeded 21, Player Wins";
    }
    elseif($bankValue > $playerValue){
        return "Got moneeyy, Dealer Wins!!";
    }
    else{
        return "Player Lucked Out, Dealer loses"; 
    }
}
