<?php
    session_start();

    if (!isset($_SESSION['loggedIn'])) {
        echo "Please Login again";
        echo "<a href='../index.php'>To Login</a>";
    }
    else {
        $now = time(); // Checking the time now when home page starts.

        if ($now > $_SESSION['expire']) {
            session_destroy();
            echo "Your session has expired! <a href='../index.php'>To Login</a>";
        }
    }
?>