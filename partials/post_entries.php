
    <?php
    require_once 'db.php'; 

    // Check for submit
    if(isset($_POST['submit'])){
        // Get form data
        $query =  "INSERT INTO entries 
        (title, content, createdAt, userID)
        VALUES (:title, :content, :createdAt, :userID)";
        
        $statement = $db->prepare($query);
        $statement->execute([
        ":title" => $_POST["title"],
        ":content" => $_POST["content"],
        ":createdAt" => $_POST["createdAt"],
        ":userID" => $_POST["userID"], 
        ]);

    }
    
?>
<?php require_once 'head.php'; ?>

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
            <div class="form-group">
            <label>Date</label>
            <input type="text" name="createdAt" class="form-control">
            </div>
            <div class="form-group">
            <label>UserID</label>
            <input type="text" name="userID" class="form-control">
            </div>
            <input type="submit" name="submit" value="Submit" class="btn btn-primary">
        </form>
    </div>
    <a href="../partials/logout.php" class="btn btn-warning">Logout</a>

<?php require_once 'footer.php'; ?>
