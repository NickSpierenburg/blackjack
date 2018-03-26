$(document).ready(function(){
    
    setInterval(refreshBankStats,1000);
    refreshBankStats();
    
     function refreshBankStats (){
         
        $.ajax( {
            url: "/blackjack/php/bank_statistics.php",						
            success: function(result) {

                $(`#bankStats`).html(result);
                
            }
        });  
    }
    
    
    
    
    
});
