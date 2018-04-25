
<?php
require_once 'inc/db.php';
 
//getting id of the data from url
$entryID = $_GET['entryID'];
 
//deleting the post
$query = "DELETE FROM entries WHERE entryID=:entryID";
$statement = $db->prepare($query);
$statement->execute([':entryID' => $entryID]);
 
//redirecting to the display page (index.php in our case)
header("Location: get_all_entries.php");
?>