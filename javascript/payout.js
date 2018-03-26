function payOut(){

    $.ajax({url: "php/payout.php", success: function(result){
                console.log(result);

    }});
}