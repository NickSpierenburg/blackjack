<?php

session_start();

require_once('../credentials.php');
getBankStats();

function getBankStats(){
    $conn = createconnect();
    $selectBankBalance = "SELECT bank_balance FROM blackjack_games WHERE game_id = 1";

    $getBankBalance = $conn->query($selectBankBalance);

    while ($row = $getBankBalance->fetch_assoc()) {
        $bankBalance = $row["bank_balance"]; 
      
        echo "Current Bank Balance <br/>".$bankBalance;
          
    }

}
