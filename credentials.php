<?php

$host="localhost";
$dbusername="root"; 
$dbpassword="root";
$db_name="blackjack";

function createconnect() {
	$host="localhost";
	$dbusername="root"; 
	$dbpassword="";
	$db_name="blackjack";

	$conn = mysqli_connect("$host", "$dbusername", "$dbpassword", "$db_name")or die("cannot connect");
	return $conn;
}

?>