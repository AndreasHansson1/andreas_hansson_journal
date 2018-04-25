
<?php require_once 'inc/session_start.php';
      require_once 'inc/head.php';
      require_once 'inc/time_expire.php'; 

    $username = $_SESSION['username'];
    $userID = $_SESSION['userID'];
    // If logged in, show content
    if(isset($_SESSION['loggedIn'])){ ?>
      <div class="container">
          <br><br>
          <h2>Welcome <?php echo $username; ?>! </h2>
          <br><br>
          <a href="post_entries.php" class="btn btn-primary">New Post</a>
          <a href="get_all_entries.php" class="btn btn-warning">See all Entries</a>
          <a href="logout.php" class="btn btn-danger">Logout</a>
      </div>

<?php } else {
  echo 'Must be logged in!';
}
    require_once 'inc/footer.php';?>   