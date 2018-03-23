$("#ready").click(function(){

    var bet = $("#inputBet").val();

    if(bet == 0){
        alert("Enter a bet to start");
    }else{

        $.ajax( {
            url: "/blackjack/php/check_bets.php?playerBet="+bet,						
            success: function(result) {
                
                var betObj = jQuery.parseJSON(result);
                console.log("PLAYA ID", result)
                $(`#bet_${betObj.playerid}`).html("Your Bet is: "+betObj.bet);
            }
        })  
    }
});