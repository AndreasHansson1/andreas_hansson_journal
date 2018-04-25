<?php
require_once 'inc/session_start.php';
require_once 'inc/db.php';

$username = $_SESSION['username'];
$userID = $_SESSION['userID'];

// show all entries from the inlogged user in descending order
$query = "SELECT * FROM entries WHERE userID = '$userID'
ORDER BY createdAt DESC";
$statement = $db->prepare($query);
$statement->execute(['userID' => $userID]);
$entries = $statement->fetchAll();

require_once 'inc/head.php'; 

if ($_SESSION['loggedIn']) { ?>

    <div class="container">
        <?php
        foreach($entries as $entry) : ?>
            <div class="well">
                <br>
                <h3><?php echo $entry['title']; ?></h3>
                <small>Created on <?php echo $entry['createdAt']; ?>
                by <?php echo $_SESSION['username']; ?></small>
                <p><?php echo $entry['content']; ?></p>
                <a class="btn btn-info" href="edit_post.php?entryID=
                <?php echo $entry['entryID']; ?>">Edit Post</a>
                <a class="btn btn-danger" href="delete_post.php?entryID=
                <?php echo $entry['entryID']; ?>">Delete Post</a>
                <br><br>
            </div>
        <?php endforeach;
          ?>
        <br><br>
        <a href='../partials/post_entries.php' class='btn btn-primary'>New Post</a>
        <a href='../partials/logout.php' class='btn btn-warning'>Logout</a>
    </div>
<?php 
// If not logged in - get message   
} else { ?>
   </h2> <?php echo 'You must be logged in!'; ?> </h2> <?php
} ?>

<?php require_once 'inc/footer.php'; ?>