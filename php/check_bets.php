<?php
    require_once('../includes/credentials.php');
    $conn = createconnect($host,$dbusername,$dbpassword,$db_name);
   
    $playerbet = 'p'.$_GET['playerid'].'_bet';
    
    echo $_POST['bet'];
    
    if(isset($_POST['bet'])) {
        $bet = json_decode($_POST['bet']);
        $ready = json_decode($_POST['ready']);
            echo $bet;
         $_SESSION['credit'] = $_SESSION['credit'] - $bet;
         
         $sql = "INSERT INTO blackjack_games(".$playerbet.") VALUES('".$bet."','".$ready."');";
         
        $result = $conn->query('SELECT * FROM games WHERE game_id = 1');
        
       
    }
  
    
    
  
?>
//
// app.post("/suggestion", (req, res) => {
//    fs.readFile('users.json', 'utf8', function(err, data) {
//        var userSuggest = JSON.parse(data);
//        let suggest = req.body.input;
//        var userResult = []
//
//        if (err) {
//            console.log("ERROR")
//        }
//
//        for (var i = 0; i < userSuggest.length; i++) {
//            if (userSuggest[i].firstname.toLowerCase().match(suggest) || userSuggest[i].lastname.toLowerCase().match(suggest) || userSuggest[i].email.toLowerCase().match(suggest)) {
//                console.log("Do you mean: ", userSuggest[i].email, userSuggest[i].firstname, userSuggest[i].lastname)
//                userResult.push(userSuggest[i].firstname + " " + userSuggest[i].lastname + " ")
//
//        }
//        if (userResult.length !== 0) {
//            console.log("Hey")
//            res.json({ input: userResult })
//
//        }
//
//    }
//})