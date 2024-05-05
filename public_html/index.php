<?php
session_start();
?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>PHP Login System</title>
    <link href="./css/style.css" rel="stylesheet" />
    <link href="./css/userform.css" rel="stylesheet" />
  </head>
  <body>
    <header>
    <h1>PHP Login System</h1>
    <hr class="largescreens-only" />
    <p class="largescreens-only">A free and open source login system.</p>
    </header>
    <main>
      <?php
      
      if (isset($_GET['status']) && $_GET['status'] == "signupsuccess") {
      ?>
      <h2 class="status">Account successfully created!</h2>
      <hr />
      <h3>Please log in.</h3>
      <?php
      }

      // LOGIN FORM ERROR MESSAGES
      if (isset($_GET['error'])) {
      ?>
      <h2 class="error"><?php 
      
          if ($_GET['error'] == 'dbqueryfailed') 
              echo "Database query failed.";
          // These should give the same GET string so as not to provide uneccessary information to hackers
          else if ($_GET['error'] == 'invalidcredentials')
              echo "Invalid login credentials.";
      
      ?></h2>

      <?php
      }

      // LOGGED IN MAIN SECTION
      if (isset($_SESSION["id"])) {
      ?>
      <h2>Welcome, <?php echo $_SESSION['firstname'] . ' ' . $_SESSION['lastname']; ?></h2>
      <hr />
      <h3 class="under-construction">This site is under construction.</h3>
      <a href="./includes/logout.inc.php"><button class="log">Log out</button></a>
      <?php
      }
      
      // LOGIN MENU
      else {
      ?>
      <form action="./includes/login.inc.php" class="user-form" method="post">
        <input id="username" name="username" type="text" placeholder="Username/Email" />
        <input id="password" name="password" type="password" placeholder="Password" />
        <button class="log" name="submit" type="submit">Log in</button>
      </form>
      <div class="login-or">
        <hr />
        <p>or</p>
        <hr />
      </div>
      <a href="./signup.php" class="button-link"><button class="new-account">Create new account</button></a>
      <?php
      }
      ?>
    </main>
  </body>
</html>