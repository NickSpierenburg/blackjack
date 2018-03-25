<?php
session_start();

require_once('../credentials.php');


dealerValue();

function dealerValue(){
    $conn = createconnect();
    $card1 = $_GET['card1'];
    $card2 = $_GET['card2'];
    $inputValue = $card1+$card2;
    $seat = $_SESSION['seat'];
    
    $sql = "SELECT bank_score FROM blackjack_games WHERE game_id=1";

    $scoreCheck = $conn->query($sql);

    while($row = $scoreCheck->fetch_assoc()) {

           $result= $conn->query("UPDATE blackjack_games SET bank_score=".$inputValue." WHERE game_id = 1");

            $cardArray = array('card1'=>$card1, 'card2'=>$card2, 'cardsValue'=> $inputValue);
            
            $cards = json_encode($cardArray);
            
            echo $cards;
    }

}

