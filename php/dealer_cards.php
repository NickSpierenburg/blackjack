<?php
session_start();

require_once('../credentials.php');


dealerValue();

function dealerValue(){
    if(isset($_GET['card3']) && isset($_GET['card4'])){
        $conn = createconnect();
        $card1 = $_GET['card1'];
        $card2 = $_GET['card2'];
        $card3 = $_GET['card3'];
        $card4 = $_GET['card4'];
    
   
        $_SESSION['totalDealerCards'] = $card1+$card2+$card3+$card4;
        $inputValue = $_SESSION['totalDealerCards'];

        $sql = "SELECT bank_score FROM blackjack_games WHERE game_id=1";

        $scoreCheck = $conn->query($sql);

            while($row = $scoreCheck->fetch_assoc()) {

               $result= $conn->query("UPDATE blackjack_games SET bank_score=".$inputValue." WHERE game_id = 1");

                $cardArray = array('card1'=>$card1, 'card2'=>$card2, 'card3'=>$card3, 'card4'=>$card4,  'cardsValue'=> $inputValue);

                $cards = json_encode($cardArray);

                echo $cards;
        }
    
   }elseif(isset($_GET['card3'])) {
        $conn = createconnect();
        $card1 = $_GET['card1'];
        $card2 = $_GET['card2'];
        $card3 = $_GET['card3'];

    
   
      $_SESSION['totalDealerCards'] = $card1+$card2+$card3;
        $inputValue = $_SESSION['totalDealerCards'];

    
        $sql = "SELECT bank_score FROM blackjack_games WHERE game_id=1";

        $scoreCheck = $conn->query($sql);

        while($row = $scoreCheck->fetch_assoc()) {

               $result= $conn->query("UPDATE blackjack_games SET bank_score=".$inputValue." WHERE game_id = 1");

                $cardArray = array('card1'=>$card1, 'card2'=>$card2, 'card3'=>$card3,  'cardsValue'=> $inputValue);

                $cards = json_encode($cardArray);

            echo $cards;
        }
        
    }else{
        $conn = createconnect();
        $card1 = $_GET['card1'];
        $card2 = $_GET['card2'];


       $_SESSION['totalDealerCards'] = $card1+$card2;
        $inputValue = $_SESSION['totalDealerCards'];

    
        $sql = "SELECT bank_score FROM blackjack_games WHERE game_id=1";

        $scoreCheck = $conn->query($sql);

        while($row = $scoreCheck->fetch_assoc()) {

               $result= $conn->query("UPDATE blackjack_games SET bank_score=".$inputValue." WHERE game_id = 1");

                $cardArray = array('card1'=>$card1, 'card2'=>$card2,  'cardsValue'=> $inputValue);

                $cards = json_encode($cardArray);

            echo $cards;
        }

    }
}

