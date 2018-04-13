<?php 
require 'config.php'; 

if(isset($_POST['username'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users 
            WHERE username='$username' 
            AND password='$password'";

    $statement = $db->prepare($sql);
    $statement->execute();

}
if($username == 'Andreas' && $password == 123){
    header('Location: get_all_entries.php');
} else {
    header('Location: ../index.php');
    echo 'Incorrect username or password!';
}


?>