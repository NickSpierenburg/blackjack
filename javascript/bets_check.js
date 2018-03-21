
        $("#ready").click(function(e){
            
            var bet = $("#inputBet").val();
            if(bet == ""){
                e.preventDefault();
                alert("Enter a bet to start");
            }else{
                $.ajax({url: "php/check_bets.php", playerBet: bet, ready:"ready"}, (result)=>{
                console.log("Response form server ", result);
                })
            }
        });
                    