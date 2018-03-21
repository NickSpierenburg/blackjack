$("#ready").click(function(){

    var bet = $("#inputBet").val();

    if(bet == 0){
        alert("Enter a bet to start");
    }else{
        $.ajax( {
            url: "php/check_bets.php",
            crossdomain: true,
            type: "POST",
            data: {playerBet : bet},						
            success: function(result) {
                    $('#playerMenu').append(result);
                    console.log(result)
            },
            error: function(err) {
                    console.log("THE ERROR: ",err)
            } 
        })  
    }
});