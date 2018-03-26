<?php


session_start();

// require_once('includes/dbconnect.php');
require_once('credentials.php');

$conn = createconnect();


if(!isset($_SESSION['user'])) {
  header("location:index.php");
}

?>

<!DOCTYPE html>
<html>
<head>
  <!-- Standard Meta -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

  <!-- Site Properties -->
  <title>Blackjack Lobby</title>
  <link rel="stylesheet" type="text/css" href="https://semantic-ui.com/dist/components/reset.css">
  <link rel="stylesheet" type="text/css" href="https://semantic-ui.com/dist/components/site.css">

  <link rel="stylesheet" type="text/css" href="https://semantic-ui.com/dist/components/container.css">
  <link rel="stylesheet" type="text/css" href="https://semantic-ui.com/dist/components/grid.css">
  <link rel="stylesheet" type="text/css" href="https://semantic-ui.com/dist/components/header.css">
  <link rel="stylesheet" type="text/css" href="https://semantic-ui.com/dist/components/image.css">
  <link rel="stylesheet" type="text/css" href="https://semantic-ui.com/dist/components/menu.css">

  <link rel="stylesheet" type="text/css" href="https://semantic-ui.com/dist/components/divider.css">
  <link rel="stylesheet" type="text/css" href="https://semantic-ui.com/dist/components/dropdown.css">
  <link rel="stylesheet" type="text/css" href="https://semantic-ui.com/dist/components/segment.css">
  <link rel="stylesheet" type="text/css" href="https://semantic-ui.com/dist/components/button.css">
  <link rel="stylesheet" type="text/css" href="https://semantic-ui.com/dist/components/list.css">
  <link rel="stylesheet" type="text/css" href="https://semantic-ui.com/dist/components/icon.css">
  <link rel="stylesheet" type="text/css" href="https://semantic-ui.com/dist/components/sidebar.css">
  <link rel="stylesheet" type="text/css" href="https://semantic-ui.com/dist/components/transition.css">
  <link rel="stylesheet" type="text/css" href="https://semantic-ui.com/dist/components/table.css">

  <style type="text/css">
    body {
      background-color: rgb(27,28,29);
    }

    .hidden.menu {
      display: none;
    }

    .masthead.segment {
      min-height: 700px;
      padding: 1em 0em;
    }
    .masthead .logo.item img {
      margin-right: 1em;
    }
    .masthead .ui.menu .ui.button {
      margin-left: 0.5em;
    }
    .masthead h1.ui.header {
      margin-top: 3em;
      margin-bottom: 0em;
      font-size: 4em;
      font-weight: normal;
    }
    .masthead h2 {
      font-size: 1.7em;
      font-weight: normal;
    }

    .ui.vertical.stripe {
      padding: 8em 0em;
    }
    .ui.vertical.stripe h3 {
      font-size: 2em;
    }
    .ui.vertical.stripe .button + h3,
    .ui.vertical.stripe p + h3 {
      margin-top: 3em;
    }
    .ui.vertical.stripe .floated.image {
      clear: both;
    }
    .ui.vertical.stripe p {
      font-size: 1.33em;
    }
    .ui.vertical.stripe .horizontal.divider {
      margin: 3em 0em;
    }

    .quote.stripe.segment {
      padding: 0em;
    }
    .quote.stripe.segment .grid .column {
      padding-top: 5em;
      padding-bottom: 5em;
    }

    .footer.segment {
      padding: 5em 0em;
    }

    .secondary.pointing.menu .toc.item {
      display: none;
    }

    @media only screen and (max-width: 700px) {
      .ui.fixed.menu {
        display: none !important;
      }
      .secondary.pointing.menu .item,
      .secondary.pointing.menu .menu {
        display: none;
      }
      .secondary.pointing.menu .toc.item {
        display: block;
      }
      .masthead.segment {
        min-height: 350px;
      }
      .masthead h1.ui.header {
        font-size: 2em;
        margin-top: 1.5em;
      }
      .masthead h2 {
        margin-top: 0.5em;
        font-size: 1.5em;
      }
    }


  </style>

  
  
  <script src="https://semantic-ui.com/examples/assets/library/jquery.min.js"></script>
  <script src="https://semantic-ui.com/dist/components/visibility.js"></script>
  <script src="https://semantic-ui.com/dist/components/sidebar.js"></script>
  <script src="https://semantic-ui.com/dist/components/transition.js"></script>

</head>
<body>

<!-- Menu-->
<div class="pusher">
  <div class="ui inverted vertical masthead center aligned segment">

    <div class="ui container">
      <div class="ui large secondary inverted pointing menu">
        <a class="toc item">
          <i class="sidebar icon"></i>
        </a>
        <a class="active item">Game</a>
        <a class="item">Rules</a>
        <a class="item">Source</a>
        <div class="right item">
          <div class="ui inverted button">&euro; <?= $_SESSION['credit'] ?></div>
          <a class="ui inverted button" href="logout.php">Logout - <?= $_SESSION['user'] ?></a>
        </div>
      </div>
    </div>

    <br/>

    <div class="ui grid">
      <div class="three column row">
        <div class="three wide column">
          <br/>
          <h4>Leaderboard</h4>
          <h3>Top 5</h3>
          <ol>
              <li id="lb_n1"></li>
              <li id="lb_n2"></li>
              <li id="lb_n3"></li>
              <li id="lb_n4"></li>
              <li id="lb_n5"></li>
          </ol>
        </div>
        <div class="ten wide column">
          <div style="background-image: url('img/table.png'); width: 966px; height: 640px;">
            <h4 id="serverMessage">Game 1</h4>
            <div id="bank">
                <table class="ui celled table" style="background: none; color: white; border: none; text-align: center;">
                    <tbody>
                        <tr>
                            <td id="deadDealer"></td>

                            <input type="button" value="Get Bank Cards" onclick="dealerCards()" id="dealerButton" >
                        </tr>
                        <tr>
                            <td id="cards_dealer_1"></td>
                            <td id="cards_dealer_3"></td>
                            <td id="cards_dealer_2"></td>
                            <td id="cards_dealer_4"></td>
                            <td id="cards_dealer_total"></td>
                        </tr>                        
                    </tbody>
                </table>
                
            </div>
            <div id="players" style="position: absolute; bottom: 230px; width: 95%;">
              <table class="ui celled table" style="background: none; color: white; border: none; text-align: center;">
                <tbody>
                  <tr>
                    <td id="user_4"><b>Player 4</b></td>
                    <td id="user_3"><b>Player 3</b></td>
                    <td id="user_2"><b>Player 2</b></td>
                    <td id="user_1"><b>Player 1</b></td>
                  </tr>
                  <tr>
                    <td id="score_4">Score: 0</td>
                    <td id="score_3">Score: 0</td>
                    <td id="score_2">Score: 0</td>
                    <td id="score_1">Score: 0</td>
                  </tr>
                  <tr>
                    <td id="state_4">Not ready</td>
                    <td id="state_3">Not ready</td>
                    <td id="state_2">Not ready</td>
                    <td id="state_1">Not ready</td>
                  </tr>
                  <tr>
                    <td id="bet_4"><b>Bet: 0.50</b></td>
                    <td id="bet_3"><b>Bet: 0.50</b></td>
                    <td id="bet_2"><b>Bet: 0.50</b></td>
                    <td id="bet_1"><b>Bet: 0.50</b></td>
                  </tr>
                  <tr>
                    <td id="card4_1"></td>

                      <td id="card4_2"></td>

                        <td id="card4_total"></td>

                        <td id="card3_1"></td>
                    
                        <td id="card3_2"></td>

                        <td id="card3_total"></td>

                        <td id="card2_1"></td>

                        <td id="card2_2"></td>

                        <td id="card2_total"></td>

                        <td id="card1_1"></td>

                        <td id="card1_2"></td>

                        <td id="card1_total"></td>
                    </tr>
                  </tr>
                </tbody>
              </table>
            </div>

            <div id="playerMenu" style="width: 95%; background-color: #333333; color: white; padding-top: 20px; padding-bottom: 20px; position: absolute; bottom: 00px;">
              <form>
                  <input type="text" name="bet" placeholder="Enter your bet" value= "0" id="inputBet">
                  <button type="button" value="Bet" id="ready">Place Your Bet</button>
                  <nobr style="margin-left: 1em;">Max bet: <?= $_SESSION['credit'] ?></nobr>
                
                  

              </form>
                <button id="payoutBtn" onclick="payOut()">Payout</button> 

              <div id="readyMenu" >
                <hr>
                <input type="button" value="Deal Cards" onclick="getCard()" id="hitButton" style="margin-left: 5em;">
                <input type="button" value="Stop" id="stopButton">
              </div>
            </div>
          </div>
        </div>
        <div class="three wide column">
          <br/>
          <h3>Bank statistics</h3>
          <h5 id="bankStats"></h5>
        </div>
      </div>
    </div>

  </div>
</div>

<script src="javascript/checkSpots.js"></script>
<script src="javascript/joinTable.js"></script>
<script src="javascript/bets_check.js"></script>
<script src="javascript/cards_array.js"></script>
<script src="javascript/check_leaderboard.js"></script>
<script src="javascript/dealerCards.js"></script>
<script src="javascript/payout.js"></script>
<script src="javascript/bankStatistics.js"></script>
</body>

</html>
