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
}

$seat = $_SESSION['seat'];

foreach($players as $playerid => $userid) {
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
				document.getElementById("'.$stateid.'").innerHTML = "Not ready"
			</script>
		';
	}
	
}

?>
