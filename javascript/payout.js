function payOut(){

    var bankvalue = $('#cards_dealer_total').val();
    var userId = $('#user').val();
    var betid = $('#player').val();
    var playervalueid = $('#playercardvalue').val();
    var Bet = $(`#${betid}`).val();
    var playervalue = $(`#${playervalueid}`).val();
    
    console.log("USER VALUE ",playervalue, " playerbet ",Bet ," userId ", userId ," bankvalue ", bankvalue )
    
    $.ajax({url: "php/payout.php?bankvalue="+bankvalue+"&userId="+userId+"&playerbet="+Bet+"&playervalue="+playervalue, success: function(result){
//                console.log("USER VALUE ",playervalue, " playerbet ",playerbet ," userId ", userId ," bankvalue ", bankvalue )
//            var payoutObj = jQuery.parseJSON(result);
//                console.log(payoutObj);

    }});
}