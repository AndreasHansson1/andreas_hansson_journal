
<?php require_once 'inc/session_start.php';
      require_once 'inc/head.php';
      require_once 'inc/time_expire.php'; 

    $username = $_SESSION['username'];
    $userID = $_SESSION['userID'];
    if(isset($_SESSION['loggedIn'])){ ?>
    <div class="container">
      <br><br>
      <h2>Welcome <?php echo $username; ?>! </h2>
      <br><br>
      
      <a href="../partials/post_entries.php" class="btn btn-primary">New Post</a>
      <a href="../partials/get_all_entries.php" class="btn btn-warning">See all Entries</a>
      <a href="../partials/logout.php" class="btn btn-danger">Logout</a>
    </div>

<?php }
    require_once 'inc/footer.php';?>   