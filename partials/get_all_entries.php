<?php
require_once 'session_start.php';
require_once 'head.php';
require_once 'db.php';

if ($_SESSION["loggedIn"]) {
    $query = "SELECT * FROM users";
    $statement = $db->prepare($query);
    $statement->execute();
    echo $statement->fetchAll();
    
} else { ?>
   </h2> <?php echo "You must be logged in!"; ?> </h2> <?php
} ?>

    <form action="../index.php">
    <input class="btn btn-primary" type="submit" value="Home" />

<?php require_once 'footer.php'; ?>