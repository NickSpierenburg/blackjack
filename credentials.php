<?php

$host="localhost";
$dbusername="root"; 
$dbpassword="root";
$db_name="blackjack";

// $connect = mysqli_connect("$host", "$dbusername", "$dbpassword", "$db_name")or die("cannot connect");

function createconnect($host,$dbusername,$dbpassword,$db_name) {
	$conn = mysqli_connect("$host", "$dbusername", "$dbpassword", "$db_name")or die("cannot connect");
	return $conn;
}

?>