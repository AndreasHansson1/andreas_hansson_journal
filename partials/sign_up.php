<?php

header('Location: ../index.php');

// Store user in db
require_once 'inc/db.php';

// Decrypt password
$hashed = password_hash($_POST["password"], PASSWORD_DEFAULT);
$query = "INSERT INTO users (username, password)
  VALUES (:username, :password)";

$statement = $db->prepare($query);
$statement->execute([
  ":username" => $_POST["username"],
  ":password" => $hashed 
]);
