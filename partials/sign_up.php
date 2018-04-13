<?php

header('Location: ../index.php');

// Store user in db
require_once 'db.php';

// Decrypt password
$hashed = password_hash($_POST["password"], PASSWORD_DEFAULT);

$statement = $db->prepare(
  "INSERT INTO users 
  (username, password)
  VALUES (:username, :password)"
);
$statement->execute([
  ":username" => $_POST["username"],
  ":password" => $hashed 
]);
