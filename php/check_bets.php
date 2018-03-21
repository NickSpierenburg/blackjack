<?php
    session_start();
    
    require_once('../includes/credentials.php');
    
    $conn = createconnect($host,$dbusername,$dbpassword,$db_name);
    echo $_GET['bet'];
//    matchPlayerUser();
//    
//    function matchPlayerUser(){
//        global $player;
//    
//        $resultGames = $conn->query('SELECT * FROM blackjack_games;');
//        $players = [];
//
//        while($row = $resultGames->fetch_assoc()) {
//            $players[1] = $row['p1_id'];
//            $players[2] = $row['p2_id'];
//            $players[3] = $row['p3_id'];
//            $players[4] = $row['p4_id'];
//        }
//        
//        if($_SESSION['userid'] = $players[1]) {
//            echo "<h1>WASSUPPP</h1>";
//           return $player = 'p1';
//        }elseif($_SESSION['userid'] = $players[2]){
//            return $player = 'p2';
//        }elseif($_SESSION['userid'] = $players[3]){
//            return $player = 'p3';
//        }else{
//            return $player = 'p4';
//        }
//    }
//    
//   
//    $playerbet = $player.'_bet';
//    $playerReady = $player.'_ready';
//    
//    
//    
//    if(isset($_POST['bet'])) {
//
//        global $player;
//        global $playerReady;
//        global $playerbet;
//
//        $result = $conn->query('SELECT * FROM blackjack_games WHERE game_id = 1');
//        $bet = $_POST['bet'];
//        $ready = 1;
//            echo $bet;
//            echo $ready;
//         $_SESSION['credit'] = $_SESSION['credit'] - $bet;
//         
//         $updateBet = "UPDATE `blackjack_games` SET `".$playerbet."`='".$bet."' WHERE game_id = 1;";
//         $updateReady = "UPDATE `blackjack_games` SET `".$playerReady."`= '".$ready."' WHERE game_id = 1;";
//        
//         
//        $result = $conn->query('SELECT * FROM blackjack_games WHERE game_id = 1');
//
//    }