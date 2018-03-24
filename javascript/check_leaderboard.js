$('#lbrefresh').click(function(){

//setInterval(refreshLeaderboard,5000);
    refreshLeaderboard();
    
     function refreshLeaderboard (){
         
        $.ajax( {
            url: "/blackjack/php/leaderboard.php",						
            success: function(result) {
                console.log("LEADERBOARD Result", result);
                
                var leaderObj = JSON.parse(result);

                
                console.log("LEADERBOARD DATA", hey);
                
                
                $(`#lb_n1`).html(`${leaderObj[0].username} <br/>Credits: ${leaderObj[0].credit}<br/><hr>`);
                $(`#lb_n2`).html(`${leaderObj[1].username} <br/>Credits: ${leaderObj[1].credit}<br/><hr>`);
                $(`#lb_n3`).html(`${leaderObj[2].username} <br/>Credits: ${leaderObj[2].credit}<br/><hr>`);
                $(`#lb_n4`).html(`${leaderObj[3].username} <br/>Credits: ${leaderObj[3].credit}<br/><hr>`);
                $(`#lb_n5`).html(`${leaderObj[4].username} <br/>Credits: ${leaderObj[4].credit}<br/><hr>`);
            }
        })  
    }
})