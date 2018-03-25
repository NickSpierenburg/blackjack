<?php
    session_start();
    
    require_once('../credentials.php');

    placeBet();
    
    function placeBet(){
       $conn = createconnect();
       $seat = $_SESSION['seat'];
       $player = "p".$seat."_bet";
       $ready = "p".$seat."_state";
       $_SESSION['bet'] = $_GET['playerBet'];
       $bet = $_SESSION['bet'];
       $_SESSION['credit'] = $_SESSION['credit'] - $bet; 
       $newCredit = $_SESSION['credit'];
       
       $updateBet = "UPDATE blackjack_games SET ".$player."=".$bet." WHERE game_id = 1";
       $updateReady = "UPDATE blackjack_games SET ".$ready."= 'ready' WHERE game_id = 1";
       $updateCredit ="UPDATE blackjack_users SET credit = ".$newCredit." WHERE id = ".$_SESSION['userid'];

       $select = "SELECT * FROM blackjack_games WHERE game_id=1";
       
       $updatebet = $conn->query($updateBet);
       $updateready = $conn->query($updateReady);
       $updatecredit = $conn->query($updateCredit);
       $result = $conn->query($select);

       $betArray =array('bet'=>$newCredit, 'playerid'=>$seat);

       $thebet = json_encode($betArray);

       echo $thebet;

    }
        