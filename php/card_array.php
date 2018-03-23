<?php

session_start();

require_once('../credentials.php');
$conn = createconnect($host,$dbusername,$dbpassword,$db_name);
cardValue();
function cardValue(){
    $card1 = $_GET['card1'];
    $card2 = $_GET['card2'];
    $inputValue = $card1+$card2;
//    echo $inputValue;

   $result= $conn->query("UPDATE blackjack_games SET p".$_SESSION['seat']."_score=".$inputValue."");
    
    $cardArray = array(playerid=>$_SESSION['seat'], card1=>$card1, card2=>$card2, cardsValue=> $inputValue);
         $cards = json_encode($cardArray);
     echo $cards;
    
}
