<?php
session_start();

if ($_SESSION["loggedIn"]) {
    $statement = $db->prepare(
    "SELECT * FROM users"
    );
    $statement->execute();
    echo $statement->fetchAll();
} else {
    echo "Unathorized";
}