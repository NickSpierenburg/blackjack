<?php

session_start();

$host="http://carpago.nl";
$dbusername="phpqien"; 
$dbpassword="utrecht450";
$db_name="ZeeslagDB";

$connect = mysqli_connect("$host", "$dbusername", "$dbpassword", "$db_name")or die("cannot connect"); 

?>