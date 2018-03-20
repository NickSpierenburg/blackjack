<html>
<head>
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script src="http://malsup.github.com/jquery.form.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
</head>
<body>
    <input id="credits" name="playerCredit" placeholder="Amount of Bet">
    <button id="ready" >Place Bet</button>

</body>

</html>

<script>
//$(document).ready(function(){

//})
    $("#ready").onclick(
        function creditbet(){

                    var bet = $("#credits").val()

                    $.post("php/check_cards.php",{bet: bet, ajax: true}, (result)=>{
                            console.log("Response form server ", result);
                                    //- $("#Suggestions").append
                    })


        }
    )
    
    $("search").keyup(function(){
            var partialSearch = $(this).val();
            console.log(partialSearch);
            $.post("php/check_cards.php",{search: partialSearch, ajax: true}, (result)=>{
                    console.log("Response form server ", result)
                            //- $("#Suggestions").append
            })
    })

        
</script>