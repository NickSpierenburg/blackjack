<?php
    session_start();
    
    require_once('../credentials.php');

    placeBet();
    
    function placeBet(){
        
       $seat = $_SESSION['seat'];
       $conn = createconnect();
       $player = "p".$seat."_bet";
       $bet = $_GET['playerBet'];
       $_SESSION['credit'] = $_SESSION['credit'] - $bet; 
       $newCredit = $_SESSION['credit'];
       
       $updateBet = "UPDATE blackjack_games SET ".$player."=".$bet." WHERE game_id = 1";

       $updateCredit ="UPDATE blackjack_users SET credit = ".$newCredit." WHERE id = ".$_SESSION['userid']."";

       $select = "SELECT * FROM blackjack_games WHERE game_id=1";
       
       $updatebet = $conn->query($updateBet);
       $updatecredit = $conn->query($updateCredit);
       $result = $conn->query($select);

       $betArray =array('bet'=>$newCredit, 'playerid'=>$seat);

       $thebet = json_encode($betArray);

       echo $thebet;

    }
        