<?php

session_start();
    
    require_once('../credentials.php');

    PayOut();
    function PayOut(){
        
        $conn = createconnect();
        $dealerScore = 1;
        $bet = $_SESSION['bet'];
        $player = $_SESSION['seat'];
        $playerScore = $_SESSION['playerCards'];
        $userid = $_SESSION['userid'];
        $credit = $_SESSION['credit'];
        
        if($playerScore <= 21 && $playerScore > $dealerScore){
            $newcredit = $credit + ($bet * 2);   
            $updateCredit = "UPDATE blackjack_users SET credit = ".$newcredit." WHERE id = ".$_SESSION['userid'];
            $updatecredit = $conn->query($updateCredit);
            
            echo "Player has received Payout";
            
        }elseif($playerScore >= 21 || $playerScore < $dealerScore){
            
            $selectBankBalance = "SELECT bank_balance FROM blackjack_games WHERE game_id = 1";
            
            $getBankBalance = $conn->query($selectBankBalance);
            $value = mysql_fetch_object($getBankBalance);
            $bankBalance = $value->bank_balance;
            $newBankBalance =  $bankBalance + $bet;

            $updateBankBalance = "UPDATE blackjack_games SET bank_balance = ".$newBankBalance." WHERE game_id = 1";
            echo "Player Has Lost, Bank Wins";
        }
        

    }