<?php

# Methods for querying the database
class Login extends DBHandler {
    # Returns true if the the username or email exists in the database, else returns false.
    protected function getUser($username, $password) {
        $query = $this->connect()->prepare('SELECT password_hash FROM users WHERE username = ? OR email = ?;');
    
        # If the statement fails to execute then redirect to the home page with an error message
        //if (!$query->execute(array($username, $password))) {
        if (!$query->execute(array($username, $username))) {
            $query = null;
            header("location: ../index.php?error=dbqueryfailed");
            exit();
        }

        if ($query->rowCount() == 0) {
            $query = null;
            header("location: ../index.php?error=dbqueryfailed");
            exit();
        }

        // Fetch password hash from database as an associative array
        $password_hash = $query->fetchAll(PDO::FETCH_ASSOC);
        $checkPassword = password_verify($password, $password_hash[0]["password_hash"]);

        if ($checkPassword == false) {
            $query = null;
            header("location: ../index.php?error=wrongpassword");
            exit();
        }
        else {
            $query = $this->connect()->prepare('SELECT * FROM users WHERE username = ? OR email = ? AND password_hash = ?;');

            # If the statement fails to execute then redirect to the home page with an error message
            if (!$query->execute(array($username, $username, $password_hash[0]["password_hash"]))) {
                $query = null;
                header("location: ../index.php?error=dbqueryfailed");
                exit();
            }

            if ($query->rowCount() == 0) {
                $query = null;
                header("location: ../index.php?error=usernotfound");
                exit();
            }

            $user = $query->fetchAll(PDO::FETCH_ASSOC);

            session_start();
            // Set session superglobals
            $_SESSION["id"] = $user[0]["id"];
            $_SESSION["username"] = $user[0]["username"];
            $_SESSION["firstname"] = $user[0]["firstname"];
            $_SESSION["lastname"] = $user[0]["lastname"];
        }
    
        $query = null;
    }

    # Returns true if the the username or email exists in the database, else returns false.
    protected function checkUserExists($username, $email) {
        $query = $this->connect()->prepare('SELECT username FROM users WHERE username = ? OR email = ?;');

        # If the statement fails to execute then redirect to the home page with an error message
        if (!$query->execute(array($username, $email))) {
            $query = null;
            header("location: ../index.php?error=dbqueryfailed");
            exit();
        }

        if ($query->rowCount() > 0)
            return true;
        return false;
    }
}