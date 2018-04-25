

<?php
/**
 * require 'session_start.php' to start the session, we need to start
 * it beacuse we will store the logged in user further down
 */
require_once 'inc/session_start.php';
// We also need the database
require_once 'inc/db.php';

/**
 * Create a statement that fetches the user based on the username that is being
 * sent with the form in 'index.php'
 */
$query = "SELECT * FROM users 
  WHERE username = :username";

$statement = $db->prepare($query);
$statement->execute([
  "username" => $_POST["username"]
]);
// Fetch, not fetchAll
$user = $statement->fetch();

/**
 * Use 'password_verify' to compare the hash that is stored in the database
 * with the password that the user has submitted. If they are the same after
 * de-hashing the password the user is verified
 */
if (password_verify($_POST["password"], $user["password"])) {
    // Redirect to welcome page on sucessfull login
    header('Location: welcome.php');
    // We must also store information in the session that we can
    // check in the other files 'index.php' for example
    $_SESSION["loggedIn"] = true;
    $_SESSION["username"] = $user["username"];
    $_SESSION["userID"] = $user["userID"];
    $_SESSION['start'] = time(); // Taking now logged in time.
    // Ending a session in 30 minutes from the starting time.
    $_SESSION['expire'] = $_SESSION['start'] + (30 * 60);
} else {
    /**
     * If the user input the wrong password, redirect to index.php with
     * an error message or something that indicates what has gone wrong
     */
    header('Location: ../index.php?message=login failed');
}
