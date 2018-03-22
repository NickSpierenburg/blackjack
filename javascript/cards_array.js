     function getCard(){
        
         var cardnumbers=[2,3,4,5,6,7,8,9,10];

          var card1p1 = $("#cardp1_1").html(cardnumbers[Math.floor(Math.random() * cardnumbers.length)]);
          var card2p1 = $("#cardp1_2").html(cardnumbers[Math.floor(Math.random() * cardnumbers.length)]);
           return  card1p1, card2p1; 
        }
