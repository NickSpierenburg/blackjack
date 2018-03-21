
    $("#ready").click(function(){
            
        var bet = $("#inputBet").val();

        if(bet == 0){
            alert("Enter a bet to start");
        }else{
            $.ajax({
                url:"php/check_bets.php",
                data: {playerBet: bet, ready:"ready"},

                method: "POST",
                success: function(data) { //takes the place of the callback function
                        console.log(data)
                },
                failure: function(err){//takes the place of the callback function
                        console.log(err)
                }
            })
        }
    });
                    
                    
                    
                    