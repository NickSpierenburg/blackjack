<?php

session_start();

require_once('../credentials.php');
$conn = createconnect($host,$dbusername,$dbpassword,$db_name);
cardValue();
function cardValue(){
    $card1 = isset($_GET['card1']);
    $card2 = isset($_GET['card2']);
    $cardArray = array(card1=>"$('#card".$_SESSION['seat']."_1').html(".$card1.")", card2=>"$('#card".$_SESSION['seat']."_2').html(".$card2.")");
         $cards = json_encode($cardArray);
    echo $cards;
    
}