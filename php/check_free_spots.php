<?php

session_start();

require_once('../credentials.php');
$conn = createconnect();

$players = [];

$result = $conn->query('SELECT * FROM blackjack_games WHERE game_id = 1');
while($row = $result->fetch_assoc()) {
	$players[1] = $row['p1_id'];
	$players[2] = $row['p2_id'];
	$players[3] = $row['p3_id'];
	$players[4] = $row['p4_id'];

	$bet[1] = $row['p1_bet'];
	$bet[2] = $row['p2_bet'];
	$bet[3] = $row['p3_bet'];
	$bet[4] = $row['p4_bet'];

	$state[1] = $row['p1_state'];
	$state[2] = $row['p2_state'];
	$state[3] = $row['p3_state'];
	$state[4] = $row['p4_state'];
}

$seat = $_SESSION['seat'];

foreach($players as $playerid => $userid) {
	$betid = 'bet_' . $playerid;
	echo '
		<script>
			document.getElementById("'.$betid.'").innerHTML = "'.$bet[$playerid].'"
		</script>
	';
	$stateid = 'state_' . $playerid;
	if($userid == 0) {
		if($seat == 0) {
			echo '
				<script>
					document.getElementById("'.$stateid.'").innerHTML = "<input type=button onclick=\"joinTable('.$playerid.')\" value=Join>"
				</script>
			';
		} else {
			echo '
				<script>
					document.getElementById("'.$stateid.'").innerHTML = "Waiting for player.."
				</script>
			';
			echo '
				<script>
					document.getElementById("playerMenu").style.visibility = "visible"
				</script>
			';
		}
	} elseif($userid == $_SESSION['userid']) {
		$_SESSION['seat'] = $playerid;
		echo '
			<script>
				document.getElementById("'.$stateid.'").innerHTML = "Your seat"
			</script>
		';
		$seated = $playerid;
	} else {
		echo '
			<script>
				document.getElementById("'.$stateid.'").innerHTML = "'.ucfirst($state[$playerid]).'"
			</script>
		';
	}
	
}

?>
