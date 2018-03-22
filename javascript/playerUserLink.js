
$("search").keyup(function(){

    $.post("php/check_cards.php",{search: $(this).val(), ajax: true}, (result)=>{
        console.log("Response form server ", result)
                //- $("#Suggestions").append
    })
})