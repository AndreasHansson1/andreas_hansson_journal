<?php
require_once 'inc/session_start.php';
require_once 'inc/head.php';
require_once 'inc/db.php';

$username = $_SESSION['username'];
$userID = $_SESSION['userID'];

if ($_SESSION["loggedIn"]) {
    $query = "SELECT * FROM users WHERE username = '$username'";
    $statement = $db->prepare($query);
    $statement->execute();
    $user = $statement->fetch();

    echo $username['userID'];
    
} else { ?>
   </h2> <?php echo "You must be logged in!"; ?> </h2> <?php
} ?>

    <!-- <form action="../index.php">
    <input class="btn btn-primary" type="submit" value="Home" /> -->
<a href="../partials/post_entries.php" class="btn btn-primary">New Post</a>
<a href="../partials/logout.php" class="btn btn-danger">Logout</a>
<?php require_once 'inc/footer.php'; ?>