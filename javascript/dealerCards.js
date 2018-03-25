function dealerCards(){

    var cardnumbers=[2,3,4,5,6,7,8,9,10,10,10,10];

    var card1 = cardnumbers[Math.floor(Math.random() * cardnumbers.length)];
    var card2 = cardnumbers[Math.floor(Math.random() * cardnumbers.length)];
    var card3 = cardnumbers[Math.floor(Math.random() * cardnumbers.length)];
    var card4 = cardnumbers[Math.floor(Math.random() * cardnumbers.length)];
            
    var sumCards12 = card1 + card2;
    var sumCards123 = card1 + card2 + card3;

            
    if(sumCards12 >= 17){
        $.ajax({url: "php/dealer_cards.php?card1="+card1+"&card2="+card2, success: function(result){

                var cardObj = jQuery.parseJSON(result);
                    console.log(cardObj);
                $(`#cards_dealer_1`).html(`card 1 = ${cardObj.card1}`);
                $(`#cards_dealer_2`).html(`card 2 = ${cardObj.card2}`);
                $(`#cards_dealer_total`).html(`Total = ${cardObj.cardsValue}`);
                
        }});
    }else if(sumCards123 >= 17){
        
        
        $.ajax({url: "php/dealer_cards.php?card1="+card1+"&card2="+card2+"&card3="+card3, success: function(result){

                var cardObj = jQuery.parseJSON(result);
                    console.log(cardObj);
                $(`#cards_dealer_1`).html(`card 1 = ${cardObj.card1}`);
                $(`#cards_dealer_2`).html(`card 2 = ${cardObj.card2}`);
                $(`#cards_dealer_3`).html(`card 3 = ${cardObj.card3}`);
                $(`#cards_dealer_total`).html(`Total = ${cardObj.cardsValue}`);
        
        }});
    }else{
                $.ajax({url: "php/dealer_cards.php?card1="+card1+"&card2="+card2+"&card3="+card3+"&card3="+card4, success: function(result){

                var cardObj = jQuery.parseJSON(result);
                    console.log(cardObj);
                $(`#cards_dealer_1`).html(`card 1 = ${cardObj.card1}`);
                $(`#cards_dealer_2`).html(`card 2 = ${cardObj.card2}`);
                $(`#cards_dealer_3`).html(`card 3 = ${cardObj.card3}`);
                $(`#cards_dealer_4`).html(`card 4 = ${cardObj.card4}`);
                $(`#cards_dealer_total`).html(`Total = ${cardObj.cardsValue}`);
        
        }});
    }
}