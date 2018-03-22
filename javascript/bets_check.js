$("#ready").click(function(event){

    var bet = $("#inputBet").val();

    if(bet == 0){
        alert("Enter a bet to start");
    }else{
//        $.ajax({url: "php/check_bets.php?bet=" + bet, success: function(result){
//	  $('#serverMessage').html(result);
//	}});

 
        $.ajax( {
            url: "/blackjack/php/check_bets.php?playerBet="+bet,						
            success: function(result) {
              
                    console.log("GELUKT", result);
            }
        })  
    }
});
//
//
//$("#ready").click(function(){
//    var bet = $("#inputBet").val();
//    var dataString = 'data_to_be_pass=' + bet;
//    
//    if (bet == 0) {
//        alert("Please Enter the Anything");
//    } else {
//    // AJAX code to submit form.
//        $.ajax({
//            type: "POST",
//            url: "/php/check_bets.php",
//            data: dataString,
//            cache: false,
//            success: function(data) {
//                alert(data);
//            },
//            error: function(err) {
//            alert("ERROR"+err);
//        }
//    });
//    }
//    return false;
//})
//








// Variable to hold request
//var request;
//
//// Bind to the submit event of our form
//$("#ready").submit(function(event){
//
//    // Prevent default posting of form - put here to work in case of errors
//    event.preventDefault();
//
//    // Abort any pending request
//    if (request) {
//        request.abort();
//    }
//    // setup some local variables
//    var $form = $(this);
//
//    // Let's select and cache all the fields
//    var $inputs = $form.find("input, select, button, textarea");
//
//    // Serialize the data in the form
//    var serializedData = $form.serialize();
//
//    // Let's disable the inputs for the duration of the Ajax request.
//    // Note: we disable elements AFTER the form data has been serialized.
//    // Disabled form elements will not be serialized.
//    $inputs.prop("disabled", true);
//
//    // Fire off the request to /form.php
//    request = $.post('/check_bets.php', serializedData, function(response) {
//    console.log("Response: "+response);
//});
//
//    // Callback handler that will be called on success
//    request.done(function (response, textStatus, jqXHR){
//        // Log a message to the console
//        console.log("Hooray, it worked!");
//    });
//
//    // Callback handler that will be called on failure
//    request.fail(function (jqXHR, textStatus, errorThrown){
//        // Log the error to the console
//        console.error(
//            "The following error occurred: "+
//            textStatus, errorThrown
//        );
//    });
//
//    // Callback handler that will be called regardless
//    // if the request failed or succeeded
//    request.always(function () {
//        // Reenable the inputs
//        $inputs.prop("disabled", false);
//    });
//
//});