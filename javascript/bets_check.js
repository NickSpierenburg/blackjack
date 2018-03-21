<script src="https://semantic-ui.com/examples/assets/library/jquery.min.js"></script>
    <script>

        $("#ready").click(function(e){
            var bet = $("#inputBet").val();
            if(bet == ""){
                e.preventDefault();
                alert("Enter a bet to start");
            }else{
            $.post("./php/check_bets.php",{ playerBet: bet, ready:"ready", ajax: true}, (result)=>{
            console.log("Response form server ", result);
            }
        });
    </script>
                    

        
