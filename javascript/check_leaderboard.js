$('#lbrefresh').click(function(){

//setInterval(refreshLeaderboard,5000);
    refreshLeaderboard();
    
     function refreshLeaderboard (){
         
        $.ajax( {
            url: "/blackjack/php/leaderboard.php",						
            success: function(result) {
                console.log("LEADERBOARD Result", result);
                
                var leaderObj = jQuery.parseJSON(result);
                
                console.log("LEADERBOARD DATA", leaderObj);
                
//                $(`#leaderboard)`).html(`Nr. 1 = ${leaderObj.playername[0]} With ${leaderObj.credit[0]} "Credits`);
            }
        })  
    }
})