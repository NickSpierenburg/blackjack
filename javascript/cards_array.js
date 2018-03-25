function getCard(){

    var cardnumbers=[2,3,4,5,6,7,8,9,10,10,10,10];

    var card1 = cardnumbers[Math.floor(Math.random() * cardnumbers.length)];
    var card2 = cardnumbers[Math.floor(Math.random() * cardnumbers.length)];

    $.ajax({url: "php/card_array.php?card1="+card1+"&card2="+card2, success: function(result){

            var cardObj = jQuery.parseJSON(result);
                console.log(cardObj);
            $(`#card${cardObj.playerid}_1`).html(cardObj.card1);
            $(`#card${cardObj.playerid}_2`).html(cardObj.card2);

    }});
}