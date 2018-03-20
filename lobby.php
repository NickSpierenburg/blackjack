<?php

// require_once('includes/dbconnect.php');
require_once('credentials.php');

$conn = createconnect($host,$dbusername,$dbpassword,$db_name);

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

  <script src="https://semantic-ui.com/examples/assets/library/jquery.min.js""></script>
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
        </div>
        <div class="ten wide column">
          <div style="background-image: url('img/table.png'); width: 960px; height: 640px;">
            <h4>Game 1</h4>
            <div id="players" style="position: absolute; bottom: 230px; width: 95%;">
              <table class="ui celled table" style="background: none; color: white; border: none; text-align: center;">
                <tbody>
                  <tr>
                    <td>Player 4</td>
                    <td>Player 3</td>
                    <td>Player 2</td>
                    <td>Player 1</td>
                  </tr>
                  <tr>
                    <td>Score: 0</td>
                    <td>Score: 0</td>
                    <td>Score: 0</td>
                    <td><b>Score: 0</b></td>
                  </tr>
                  <tr>
                    <td>Not ready</td>
                    <td>Not ready</td>
                    <td>Not ready</td>
                    <td>Not ready</td>
                  </tr>
                  <tr>
                    <td><b>Bet: 0.50</b></td>
                    <td><b>Bet: 0.50</b></td>
                    <td><b>Bet: 0.50</b></td>
                    <td><b>Bet: 0.50</b></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="three wide column">
          <br/>
          <h4>Bank statistics</h4>
        </div>
      </div>
    </div>

  </div>
</div>

</body>

</html>
