<?php
    require_once 'inc/session_start.php';
    require_once 'inc/db.php';

    // //$entryID = $_SESSION['entryID'];
    
    
    // TESTING
    if(isset($_POST['submit'])){
        // Get form data
        $query = "UPDATE entries 
            SET  title = :title, 
                 content = :content,  
            WHERE entryID = :entryID";
        
        $statement = $db->prepare($query);
        $statement->execute([
        ':title' => $_POST['title'],
        ':content' => $_POST['content'],
        ':entryID' => $_POST['entryID'],
        ]);

        header("Location: get_all_entries.php");
        return;
    }

//     $query = "UPDATE entries SET 
//             title = :title, 
//             content = :content,  
//             WHERE entryID = :entryID";

// $statement = $db->prepare($query);                                  
// $statement->bindParam(':title', $_POST['title'], PDO::PARAM_STR);       
// $statement->bindParam(':content', $_POST['content'], PDO::PARAM_STR);    
  
// $statement->bindParam(':entryID', $_POST['entryID'], PDO::PARAM_INT);   
// $statement->execute();
// header("Location: ../index.php");

    if (isset($_GET['entryID'])) {
  try {
    // require_once 'inc/db.php';
    $entryID = $_GET['entryID'];
    $query = "SELECT * FROM entries WHERE entryID = :entryID";
    $statement = $db->prepare($query);
    $statement->bindValue(':entryID', $entryID);
    $statement->execute();
    
    $entries = $statement->fetch();
  } catch(PDOException $error) {
      echo $query . "<br>" . $error->getMessage();
  }
} else {
    echo "ERROR!";
    exit;
}
    


        
    
?>

<?php require_once 'inc/head.php'; ?>
   


<div class="container">
        <h1>Edit Post</h1>
        <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
            <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" class="form-control" value="<?php echo $entries['title']; ?>">
            </div>
            <div class="form-group">
            <label>Content</label>
            <textarea name="content" class="form-control"><?php echo $entries['content']; ?></textarea>
            </div>
            <input type="hidden" name="entryID" value="<?php echo $_GET['entryID']; ?>">
            <input type="submit" name="submit" value="Submit" class="btn btn-primary">
        </form>
    </div>

    <?php require_once 'inc/footer.php'; ?>