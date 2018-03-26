$(document).ready(function(){
    
    setInterval(refreshBankStats,5000);
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
