<?php

session_start();
    
    require_once('../credentials.php');

    PayOut();
    function PayOut(){
        
        $conn = createconnect();
        $dealerScore = $_SESSION['totalDealerCards'];;
        $bet = $_SESSION['bet'];
        $player = $_SESSION['seat'];
        $playerScore = $_SESSION['playerCards'];
        $userid = $_SESSION['userid'];
        $credit = $_SESSION['credit'];
        
        if($playerScore <= 21 && $playerScore > $dealerScore || $dealerScore > 21){
            $newcredit = $credit + ($bet * 2);   
            $updateCredit = "UPDATE blackjack_users SET credit = ".$newcredit." WHERE id = ".$_SESSION['userid'];
            $updatecredit = $conn->query($updateCredit);
            
            $selectBankBalance = "SELECT bank_balance FROM blackjack_games WHERE game_id = 1";
            
            $getBankBalance = $conn->query($selectBankBalance);
            //get the value of bank_balance from the db:
            while ($row = $getBankBalance->fetch_assoc()) {
                 $bankBalance = $row["bank_balance"];
            
            $newBankBalance =  $bankBalance - $bet;
            $updateBankBalance = "UPDATE blackjack_games SET bank_balance = ".$newBankBalance." WHERE game_id = 1";
            $updatebankbalance = $conn->query($updateBankBalance);
            echo "Player has received Payout";
            }
        }elseif($playerScore > 21 || $playerScore < $dealerScore){
            
            $selectBankBalance = "SELECT bank_balance FROM blackjack_games WHERE game_id = 1";
            
            $getBankBalance = $conn->query($selectBankBalance);
            //get the value of bank_balance from the db:
            while ($row = $getBankBalance->fetch_assoc()) {
                 $bankBalance = $row["bank_balance"];
            
            $newBankBalance =  $bankBalance + $bet;

            $updateBankBalance = "UPDATE blackjack_games SET bank_balance = ".$newBankBalance." WHERE game_id = 1";
            
            $updatebankbalance = $conn->query($updateBankBalance);
            
            echo "Player Has Lost, Bank Wins ".$newBankBalance;
            
            }
        }else{
            echo "Player LOSES";
        }
        

    }