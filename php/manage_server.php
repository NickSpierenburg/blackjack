<?php

require_once('../credentials.php');

$conn = createconnect();

$rs = $conn->query('SELECT * FROM blackjack_games');

while($row = $rs->fetch_assoc()) {

	$seated = 0;
	$ready = 0;

	$players[1]['id'] = $row['p1_id'];
	$players[1]['score'] = $row['p1_score'];
	$players[1]['state'] = $row['p1_state'];

	$players[2]['id'] = $row['p2_id'];
	$players[2]['score'] = $row['p2_score'];
	$players[2]['state'] = $row['p2_state'];

	$players[3]['id'] = $row['p3_id'];
	$players[3]['score'] = $row['p3_score'];
	$players[3]['state'] = $row['p3_state'];

	$players[4]['id'] = $row['p4_id'];
	$players[4]['score'] = $row['p4_score'];
	$players[4]['state'] = $row['p4_state'];

	foreach($players as $player) {
		if($player['id'] > 0) {
			$seated++;
		}
	}

	if($seated == 1) {
		// alle 4 de stoelen zijn in gebruik
		foreach($players as $player) {
			if($player['state'] == 'ready' && $player['score'] == 0) {
				// deze speler is ready en score staat op 0
				$ready++;
			}
		}
	}

	if($ready == 1) {
		// alle spelers zijn ready en het is een nieuw spel, alle scores staan op 0
		if($row['current_turn'] == 0) {
			$conn->query('UPDATE blackjack_games SET current_turn = 1');
			echo 'Nieuw spel is begonnen!';
		} else {
			echo 'Nieuwe speldata opvragen...';
		}		
	}

}

?>
