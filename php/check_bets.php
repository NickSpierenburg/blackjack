<?php
    session_start();
    matchPlayerUser();
    require_once('../includes/credentials.php');
    
    $conn = createconnect($host,$dbusername,$dbpassword,$db_name);
    
    function matchPlayerUser(){
        global $player;
    
        $result = $conn->query('SELECT * FROM blackjack_games;');
        
        $p1 = 'p1_id';
        $p2 = 'p2_id';
        $p3 = 'p3_id';
        $p4 = 'p4_id';
        
        if($_SESSION['id'] = $p1) {
           return $player = $p1;
        }elseif($_SESSION['id'] = $p2){
            return $player = $p2;
        }elseif($_SESSION['id'] = $p3){
            return $player = $p3;
        }elseif($_SESSION['id'] = $p4){
            return $player = $p4;
        }
    }
    
    $playerid =  $_GET['playerid'];
    $playerbet = 'p'.$playerid.'_bet';
    $playerReady = 'p'.$playerid.'_ready';
    
    echo $_GET['bet'];
    
    if(isset($_GET['bet'])) {
        global $playerid;
        
        $result = $conn->query('SELECT * FROM blackjack_games WHERE game_id = 1');
        $bet = $_GET['bet'];
        $ready = 1;
            echo $bet;
            echo $ready;
         $_SESSION['credit'] = $_SESSION['credit'] - $bet;
         
         $updateBet = "UPDATE `blackjack_games` SET `".$playerbet."`='".$bet."' WHERE ".$playerbet." = ".$playerbet.";";
         $updateReady = "UPDATE `blackjack_games` SET `".$playerReady."`= '".$ready."' WHERE ".$playerbet." = ".$playerbet.";";
        
         
        $result = $conn->query('SELECT * FROM games WHERE game_id = 1', $updateBet, $updateReady);
        
       
    }
  
    
    if(isset($_SESSION['userid'])) {
	$userid = $_SESSION['userid'];
	$result = $conn->query('SELECT * FROM blackjack_games WHERE game_id = 1');
	while($row = $result->fetch_assoc()) {
		if($row[$playerid] == 0) {
			$sql = 'UPDATE games SET ' . $playerid . ' = ' . $userid;
			$conn->query($sql);
			echo 'You are now playing on seat ' . $_GET['playerid'];
		} else {
			echo 'Seat taken!';
		}
	}
} else {
	echo 'No session id';
}
  
?>
