<?php
require_once 'inc/session_start.php';
require_once 'inc/head.php';
require_once 'inc/db.php';

$username = $_SESSION['username'];
$userID = $_SESSION['userID'];

if ($_SESSION['loggedIn']) {
    $query = "SELECT * FROM entries WHERE userID = '$userID'";
    $statement = $db->prepare($query);
    $statement->execute();
    $entries = $statement->fetchAll(); ?>

    <div class="container">
        <?php
        foreach($entries as $entry) : ?>
            <div class="well">
                <h3><?php echo $entry['title']; ?></h3>
                <small>Created on <?php echo $entry['createdAt']; ?>
                by <?php echo $username; ?></small>
                <p><?php echo $entry['content']; ?></p>
            </div>
        <?php endforeach; ?>
        <a href='../partials/post_entries.php' class='btn btn-primary'>New Post</a>
        <a href='../partials/logout.php' class='btn btn-danger'>Logout</a>
    </div>
<?php    
} else { ?>
   </h2> <?php echo 'You must be logged in!'; ?> </h2> <?php
} ?>

    <!-- <form action="../index.php">
    <input class="btn btn-primary" type="submit" value="Home" /> -->

<?php require_once 'inc/footer.php'; ?>