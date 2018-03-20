<html>
<head>

 <script src="https://semantic-ui.com/examples/assets/library/jquery.min.js"></script>
    <script>

        $("search").keyup(function(){

            $.post("php/check_cards.php",{search: $(this).val(), ajax: true}, (result)=>{
                console.log("Response form server ", result)
                        //- $("#Suggestions").append
            })
        })

    </script>
   </head>
