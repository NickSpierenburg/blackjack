<?php

session_start();

require_once('../credentials.php');
$conn = createconnect($host,$dbusername,$dbpassword,$db_name);

$playerid = 'p'.$_GET['playerid'].'_id';

if(isset($_SESSION['userid'])) {
	$userid = $_SESSION['userid'];
	$result = $conn->query('SELECT * FROM games WHERE game_id = 1');
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