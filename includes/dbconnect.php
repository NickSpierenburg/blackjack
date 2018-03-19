<?php

session_start();

$host="localhost";
$dbusername="root"; 
$dbpassword="";
$db_name="blackjack";

$connect = mysqli_connect("$host", "$dbusername", "$dbpassword", "$db_name")or die("cannot connect"); 

?>