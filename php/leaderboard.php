<?php

session_start();

require_once('../credentials.php');
createLeaderboard();

function createLeaderboard(){
    $conn = createconnect();
    $sql = "SELECT username, credit FROM blackjack_users";
    $result = $conn->query($sql);

    $data= array();
    

    while ($row = mysqli_fetch_assoc($result)) {
            
       $data[] = $row;
    }
  

     print_r(json_encode($data));

}

