<?php $db = new PDO(
  "mysql:host=localhost;dbname=login;charset=utf8", 
  "root",   
  "root",   
  [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
  ]
);

if(isset($_POST['username'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM userLogin 
            WHERE username='$username' 
            AND password='$password'";

    $statement = $db->prepare($sql);
    $statement->execute();

}

echo $username;

//header('Location: ../index.php');
?>