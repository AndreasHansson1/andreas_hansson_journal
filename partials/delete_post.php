 
 <?php
 
     // Check for delete submit
    // if(isset($_POST['delete'])){
    //     // Get form data
    //     $query = "DELETE FROM entries WHERE entryID = {$delete_id}";
    //     $statement = $db->prepare($query, $_POST['delete_id']);
    //     $statement->execute(['entryID' => $delete_id]);

    //     // if(mysqli_query($conn, $query)){
    //     //     header('location: '.ROOT_URL.'');
    //     // } else {
    //     //     echo 'ERROR: '. mysqli_error($conn);
    //     // }
     //} ?>
 
 <div class="container">
        <a href="get_all_entries.php" class="btn btn-default">Back</a>
       <h1><?php echo $entry['title']; ?></h1>
        <small>Created on <?php echo $entry['createdAt']; ?>
        by <?php echo $_SESSION['username']; ?></small>
        <p><?php echo $entry['content']; ?></p>
        <hr>

        <form class="pull-right" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <input type="hidden" name="delete_id" value="<?php echo $post['entryID']; ?>">
        <input type="submit" name="delete" value="Delete" class="btn btn-danger">
        </form>

        <a href="editpost.php?entryID=<?php echo $entry['entryID']; ?>"
        class="btn btn-info">Edit</a>
    </div>