<html>
<head>

 <script src="https://semantic-ui.com/examples/assets/library/jquery.min.js"></script>
<script>

    $("#ready").click(function(e){
            $.post("php/check_cards.php",{bet: $("#credits").val(), ajax: true}, (result)=>{
                    console.log("Response form server ", result);

            })
   
     
    $("search").keyup(function(){
        
        $.post("php/check_cards.php",{search: $(this).val(), ajax: true}, (result)=>{
                console.log("Response form server ", result)
                        //- $("#Suggestions").append
        })
    })
</script>
   </head>
<body>
    <input id="credits" name="playerCredit" placeholder="Amount of Bet">
    <button id="ready" >Place Bet</button>

</body>

</html>


        
