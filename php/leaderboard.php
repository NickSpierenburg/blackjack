<?php

session_start();

require_once('../credentials.php');
createLeaderboard();

function createLeaderboard(){
    $conn = createconnect();
    $sql = "SELECT id, username, credit FROM blackjack_users";
    $result = $conn->query(sql);

    $leaderboardArray = array();

    while($row = $result->fetch_assoc()){
        echo ",".$row['username'].":".$row['credit'];
    }
//    
//    $leaderboard = json_encode($leaderboardArray);
            
    
//    echo "howdy";
}

