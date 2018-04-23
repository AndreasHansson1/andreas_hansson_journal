<?php 

require_once 'inc/db.php';

  if(isset($_POST['submit']))
{    
    $entryID = $_POST['entryID'];
    
    $title=$_POST['title'];
    $content=$_POST['content'];
        
    
    // checking empty fields
    if(empty($title) || empty($content)) {    
            
        if(empty($title)) {
            echo "<font color='red'>Title field is empty.</font><br/>";
        }
        
        if(empty($content)) {
            echo "<font color='red'>Content field is empty.</font><br/>";
        }
               
    } else {    
        //updating the table
        $sql = "UPDATE entries SET title=:title, content=:content WHERE entryID=:entryID";
        $query = $d->prepare($sql);
                
        $query->bindparam(':entryID', $entryID);
        $query->bindparam(':title', $title);
        $query->bindparam(':content', $content);
        $query->execute();
        
        // Alternative to above bindparam and execute
        // $query->execute(array(':id' => $id, ':name' => $name, ':email' => $email, ':age' => $age));
                
        //redirectig to the display page. In our case, it is index.php
        header("Location: ../index.php");
    }
}
?>
<?php
//getting id from url
$entryID = $_GET['entryID'];
 
//selecting data associated with this particular id
$sql = "SELECT * FROM entries WHERE entryID=:entryID";
$query = $db->prepare($sql);
$query->execute(array(':entryID' => $entryID));
 
while($row = $query->fetch(PDO::FETCH_ASSOC))
{
    $title = $row['title'];
    $content = $row['content'];
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