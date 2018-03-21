<script src="https://semantic-ui.com/examples/assets/library/jquery.min.js"></script>
    <script>
              <input type="text" placeholder="Enter your bet" id="inputBet">
              <input type="button" value="Bet" id="ready">
              
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
    </script>
                    

        
$.ajax({url: "php/check_free_spots.php", success: function(result){
	  $('body').append(result);
	}});