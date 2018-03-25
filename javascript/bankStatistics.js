$(document).ready(function(){
    
    setInterval(refreshBankStats,5000);
    refreshBankStats();
    
     function refreshBankStats (){
         
        $.ajax( {
            url: "/blackjack/php/bank_statistics.php",						
            success: function(result) {
                console.log("RESULT ",result)
                $(`#bankStats`).html(result);
                
            }
        });  
    }
    
    
    
    
    
});
