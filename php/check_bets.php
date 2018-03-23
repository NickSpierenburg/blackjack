<?php
    session_start();
    
    require_once('../credentials.php');

    placeBet();
    
    function placeBet(){
       $conn = createconnect();
        
       $bet = $_GET['playerBet'];
       $seat = $_SESSION['seat'];
       
       $betArray =array('bet'=>$bet, 'playerid'=>$seat);
       
       $thebet = json_encode($betArray);
        echo $thebet;
        
//        
//        global $player;
//        global $playerReady;
//        global $playerbet;
//        $resultGames = $conn->query('SELECT * FROM blackjack_games;');
//        $players = [];
//        $playerbet = $player.'_bet';
//        $playerReady = $player.'_ready';
//        
//        while($row = $resultGames->fetch_assoc()) {
//            $players[1] = $row['p1_id'];
//            $players[2] = $row['p2_id'];
//            $players[3] = $row['p3_id'];
//            $players[4] = $row['p4_id'];
//        }
//        
//        if($_SESSION['userid'] = $players[1]) {
//            
//        $result = $conn->query('SELECT * FROM blackjack_games WHERE game_id = 1');
//        $bet = $_GET['playerBet'];
//        $ready = 1;
//            
//        $_SESSION['credit'] = $_SESSION['credit'] - $bet;
//         
//        $updateBet = "UPDATE `blackjack_games` SET `".$playerbet."`='".$bet."' WHERE game_id = 1;";
//        $updateReady = "UPDATE `blackjack_games` SET `".$playerReady."`= '".$ready."' WHERE game_id = 1;";
//        
//        $result = $conn->query('SELECT * FROM blackjack_games WHERE game_id = 1');
//        $theBet = [];
//        while($row = $resultGames->fetch_assoc()) {
//            $theBet[1] = $row['p1_bet'];
//        }
//        
//        return "credit = ".$_SESSION['credit']."the Bet : ".$theBet[1];
//        
//        }elseif($_SESSION['userid'] = $players[2]){
//            return $player = 'p2';
//        }elseif($_SESSION['userid'] = $players[3]){
//            return $player = 'p3';
//        }else{
//            return $player = 'p4';
//        }
    }
//   
//    if(isset($_POST['bet'])) {
//
//        global $player;
//        global $playerReady;
//        global $playerbet;
//        
//        $playerbet = $player.'_bet';
//        $playerReady = $player.'_ready';
//        
//        $result = $conn->query('SELECT * FROM blackjack_games WHERE game_id = 1');
//        $bet = $_GET['playerBet'];
//        $ready = 1;
//            
//        $_SESSION['credit'] = $_SESSION['credit'] - $bet;
//         
//         $updateBet = "UPDATE `blackjack_games` SET `".$playerbet."`='".$bet."' WHERE game_id = 1;";
//         $updateReady = "UPDATE `blackjack_games` SET `".$playerReady."`= '".$ready."' WHERE game_id = 1;";
//        
//         
//        $result = $conn->query('SELECT * FROM blackjack_games WHERE game_id = 1');
//
//    }