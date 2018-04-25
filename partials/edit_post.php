<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
    require_once 'inc/db.php';
    
    // TESTING
    if(isset($_POST['submit'])){
        
        // Get form data
        $query = "UPDATE entries 
            SET   entryID = :entryID,
                  title   = :title, 
                  content = :content  
            WHERE entryID = :entryID";
        
        $statement = $db->prepare($query);
        $result = $statement->execute(array(
            ':entryID' => $_GET['entryID'],
            ':title'   => $_POST['title'],
            ':content' => $_POST['content']
        
        ));
        
        
        if($result) {
            echo 'Data Updated';
            header("Location: get_all_entries.php");
        }else{
            echo 'ERROR Data Not Updated';
        }

}
        
   
   
    if (isset($_GET['entryID'])) {
        $entryID = $_GET['entryID'];
    try {
     
    
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
    <a href="get_all_entries.php" class="btn btn-info">Back</a>
    <br><br>
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
            <input type="submit" name="submit" value="Submit" class="btn btn-primary">
        </form>
    </div>

    <?php require_once 'inc/footer.php'; ?>