<!DOCTYPE html>
<html>
<head>
  <!-- Standard Meta -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

  <!-- Site Properties -->
  <title>Blackjack Register</title>
  <link rel="stylesheet" type="text/css" href="https://semantic-ui.com/dist/components/reset.css">
  <link rel="stylesheet" type="text/css" href="https://semantic-ui.com/dist/components/site.css">

  <link rel="stylesheet" type="text/css" href="https://semantic-ui.com/dist/components/container.css">
  <link rel="stylesheet" type="text/css" href="https://semantic-ui.com/dist/components/grid.css">
  <link rel="stylesheet" type="text/css" href="https://semantic-ui.com/dist/components/header.css">
  <link rel="stylesheet" type="text/css" href="https://semantic-ui.com/dist/components/image.css">
  <link rel="stylesheet" type="text/css" href="https://semantic-ui.com/dist/components/menu.css">

  <link rel="stylesheet" type="text/css" href="https://semantic-ui.com/dist/components/divider.css">
  <link rel="stylesheet" type="text/css" href="https://semantic-ui.com/dist/components/segment.css">
  <link rel="stylesheet" type="text/css" href="https://semantic-ui.com/dist/components/form.css">
  <link rel="stylesheet" type="text/css" href="https://semantic-ui.com/dist/components/input.css">
  <link rel="stylesheet" type="text/css" href="https://semantic-ui.com/dist/components/button.css">
  <link rel="stylesheet" type="text/css" href="https://semantic-ui.com/dist/components/list.css">
  <link rel="stylesheet" type="text/css" href="https://semantic-ui.com/dist/components/message.css">
  <link rel="stylesheet" type="text/css" href="https://semantic-ui.com/dist/components/icon.css">

  <script src="https://semantic-ui.com/examples/assets/library/jquery.min.js"></script>
  <script src="https://semantic-ui.com/dist/components/form.js"></script>
  <script src="https://semantic-ui.com/dist/components/transition.js"></script>

  <style type="text/css">
    body {
      background-color: #DADADA;
    }
    body > .grid {
      height: 100%;
    }
    .image {
      margin-top: -100px;
    }
    .column {
      max-width: 450px;
    }
  </style>
</head>
<body>

<script>
    var usernameField = document.getElementById('username');
    var passwordField = document.getElementById('password');
    var password2Field = document.getElementById('password2');

    function checkLogin(usernameField, passwordField, password2Field) {
      console.log(usernameField.value);
    }
</script>

<div class="ui middle aligned center aligned grid">
  <div class="column">
    <h2 class="ui teal image header">
      <div class="content">
        Blackjack User Registration
      </div>
    </h2>
    <form class="ui large form" method="post" action="check_register.php">
      <div class="ui stacked segment">
        <div class="field">
          <div class="ui left icon input">
            <i class="user icon"></i>
            <input type="text" name="username" placeholder="Username">
          </div>
        </div>
        <div class="field">
          <div class="ui left icon input">
            <i class="lock icon"></i>
            <input type="password" name="password" placeholder="Password">
          </div>
        </div>
        <div class="field">
          <div class="ui left icon input">
            <i class="lock icon"></i>
            <input type="password" name="password2" placeholder="Confirm password">
          </div>
        </div>
        <input type="submit" class="ui fluid large teal submit button" value="Register">
      </div>

      <div class="ui error message"></div>

    </form>

    <div class="ui message">
      Already have an account? <a href="php/index.php">Login</a>
    </div>
  </div>
</div>

</body>

</html>
