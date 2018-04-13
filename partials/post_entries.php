<?php
    require_once 'partials/db.php';




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
<?php include('head.php'); ?>
    <div class="container">
        <h1>Add Posts</h1>
        <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
            <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" class="form-control">
            </div>
            <div class="form-group">
            <label>Author</label>
            <input type="text" name="author" class="form-control">
            </div>
            <div class="form-group">
            <label>Body</label>
            <textarea name="body" class="form-control"></textarea>
            </div>
            <input type="submit" name="submit" value="Submit" class="btn btn-primary">
        </form>
    </div>
<?php include('inc/footer.php'); ?>
