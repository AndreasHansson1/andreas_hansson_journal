<?php
    require_once 'inc/session_start.php';
    require_once 'inc/db.php';

    $entryID = $_SESSION['entryID'];

    // echo $entryID;

    // $username = $_SESSION['username'];
    // $entryID = $_SESSION['entryID'];

    // echo $entryID;

    // Fetch entryID because we need it later
    // $query = "SELECT * FROM entries 
    // WHERE entryID = :entryID";

    // $statement = $db->prepare($query);
    // $statement->execute([
    // "entryID" => $_POST["entryID"]
    // ]);

    // $entryID = $statement->fetch();
    // Save entryID in session
    // $_SESSION["entryID"] = $entryID["entryID"];
   
    
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
     //}


    $query = "SELECT * FROM entries WHERE entryID =  :entryID";
    $statement = $db->prepare($query);
    $statement->execute(['entryID' => $_POST['entryID']
    ]);
    $entry = $statement->fetch();

    echo $entry['entryID'];
    

    
    
?>

<?php require_once 'inc/head.php'; ?>
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

        <a href="editpost.php?id=<?php echo $entry['entryID']; ?>"
        class="btn btn-info">Edit</a>
    </div>
<?php require_once 'inc/footer.php'; ?>