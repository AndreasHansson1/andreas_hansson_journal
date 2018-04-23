<?php
    require_once 'inc/session_start.php';
    require_once 'inc/db.php'; 

    $username = $_SESSION['username'];
    $userID = $_SESSION['userID'];

    // Check for submit
    if(isset($_POST['submit'])){
        // Get form data
        $query =  "INSERT INTO entries 
        (title, content, userID)
        VALUES (:title, :content, :userID)";
        
        $statement = $db->prepare($query);
        $statement->execute([
        ':title' => $_POST['title'],
        ':content' => $_POST['content'],
        ':userID' => $userID,
        ]);
        

    }
    // // Fetch entryID because we need it later
    // $query = "SELECT * FROM entries 
    // WHERE entryID = :entryID";

    // $statement = $db->prepare($query);
    // $statement->execute([
    // "entryID" => $_POST["entryID"]
    // ]);
    // // Fetch only one
    // $entryID = $statement->fetch();
    // // Save entryID in session
    // $_SESSION["entryID"] = $entryID["entryID"];
    
?>
<?php require_once 'inc/head.php'; ?>

    <div class="container">
        <h2>Add Posts</h2>
        <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
            <div class="form-group">
                <label>Title</label>
                <input type="text" name="title" class="form-control">
            </div>
            <div class="form-group">
                <label>Content</label>
                <textarea name="content" class="form-control"></textarea>
            </div>
                <input type="submit" name="submit" value="Submit" class="btn btn-primary">
            <a href="../partials/get_all_entries.php" class="btn btn-warning">See all Entries</a>
            <a href="../partials/logout.php" class="btn btn-danger">Logout</a>
        </form>
    </div>
    

<?php require_once 'inc/footer.php'; ?>
