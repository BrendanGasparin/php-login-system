<!DOCTYPE html>
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
    <p class="largescreens-only">Sign up to get started!</p>
    </header>
    <main>
      <form action="./includes/signup.inc.php" class="user-form" method="post">
        <p>Name</p>
        <input id="firstname" name="firstname" type="text" placeholder="First name" />

        <?php
            if ($_GET['error'] == 'firstnameempty')
                echo '<p class="error">Must enter first name.</p>';
            else if ($_GET['error'] == 'firstnameinvalidlength')
                echo '<p class="error">First name must be between 1 and 64 characters.</p>';
            else if ($_GET['error'] == 'firstnameinvalid')
                echo '<p class="error">First name must be alphabetical characters, hyphens, and apostrophes.</p>';
        ?>

        <input id="lastname"name="lastname" type="text" placeholder="Last name" />
        <br />

        <?php
            if ($_GET['error'] == 'lastnameinvalid')
                echo '<p class="error">Last name must be alphabetical characters, hyphens, and apostrophes.</p>';
            else if ($_GET['error'] == 'lastnameinvalidlength')
                echo '<p class="error">Last name must be between 1 and 64 characters.';
        ?>
        
        <p>Credentials</p>
        <input id="username" name="username" placeholder="Username" type="text" />

        <?php
            if ($_GET['error'] == 'usernameempty')
                echo '<p class="error">Must enter username.</p>';
            else if ($_GET['error'] == 'usernameinvalidlength')
                echo '<p class="error">Username must be between 4 and 32 characters.</p>';
            else if ($_GET['error'] == 'usernameinvalid')
                echo '<p class="error">Username must be alphabetic chars, periods, underscores. Must begin with alphabetical char.</p>';
            else if ($_GET['error'] == 'usernametaken')
                echo '<p class="error">Username taken.</p>';
        ?>

        <input id="email" name="email" placeholder="Email address" type="email" />

        <?php
            if ($_GET['error'] == 'emailempty')
                echo '<p class="error">Must enter email address.</p>';
            if ($_GET['error'] == 'emailinvalidlength')
                echo '<p class="error">Email must be between 1 and 400 characters.</p>';
            if ($_GET['error'] == 'emailinvalid')
                echo '<p class="error">Email address is invalid.</p>';
            else if ($_GET['error'] == 'emailtaken')
                echo '<p class="error">Email address is already taken.</p>';
        ?>

        <p>Date of Birth</p>
        <div class="three-columns">
          <select class="day-picker" id="day-picker" name="day-picker">
          </select>
          <select class="month-picker" id="month-picker" name="month-picker">
            <option value="1">Jan</option>
            <option value="2">Feb</option>
            <option value="3">Mar</option>
            <option value="4">Apr</option>
            <option value="5">May</option>
            <option value="6">Jun</option>
            <option value="7">Jul</option>
            <option value="8">Aug</option>
            <option value="9">Sep</option>
            <option value="10">Oct</option>
            <option value="11">Nov</option>
            <option value="12">Dec</option>
          </select>
          <select class="year-picker" id="year-picker" name="year-picker">
          </select>
        </div>

        <?php
            if ($_GET['error'] == 'dobinvalid')
                echo '<p class="error">Birthdate is not a valid database date.</p>';
            if ($_GET['error'] == 'dobinvalidage')
                echo '<p class="error">Age must be between 13 and 130.</p>';
        ?>

        <br />

        <p>Password</p>
        <input id="password" name="password" placeholder="Password" type="password" />
        <input id="password2" name="password2" placeholder="Repeat password" type="password" />

        <?php
            if ($_GET['error'] == 'passwordsempty')
                echo '<p class="error">Please fill out both password fields.</p>';
            if ($_GET['error'] == 'passwordsdonotmatch')
                echo '<p class="error">Passwords do not match.</p>';
        ?>

        <button name="submit" type="submit">Sign up</button>
      </form>

      <p class="centered-16px top-margin-20px">Already have an account? <a href="./index.php">Log in</a>.</p>

      <script src="./js/datepicker.js"></script>

    </main>
  </body>
</html>