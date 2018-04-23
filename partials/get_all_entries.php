<?php
require_once 'inc/session_start.php';
require_once 'inc/head.php';
require_once 'inc/db.php';

$username = $_SESSION['username'];
$userID = $_SESSION['userID'];
//echo $userID;
//echo $username;

if ($_SESSION['loggedIn']) {
    $query = "SELECT * FROM entries WHERE userID = '$userID'";
    $statement = $db->prepare($query);
    $statement->execute(['userID' => $userID]);
    $entries = $statement->fetchAll();

    ?>

    <div class="container">
        <?php
        foreach($entries as $entry) : ?>
            <div class="well">
                <h3><?php echo $entry['title']; ?></h3>
                <small>Created on <?php echo $entry['createdAt']; ?>
                by <?php echo $_SESSION['username']; ?></small>
                <p><?php echo $entry['content']; ?></p>
                <a class="btn btn-info" href="post.php?id=
                <?php echo $entry['entryID']; ?>">Read More</a>
            </div>
        <?php endforeach; ?>
        <br><br>
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