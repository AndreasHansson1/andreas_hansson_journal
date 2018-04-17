
<?php require_once 'session_start.php';
      require_once 'head.php'; 

    $username = $_SESSION['username']; ?>
    <h2>Welcome <?php echo $username; ?>! </h2>
    <br><br>
    
    <a href="../partials/post_entries.php" class="btn btn-primary">New Post</a>
    <a href="../partials/get_all_entries.php" class="btn btn-warning">See all Entries</a>
    <a href="../partials/logout.php" class="btn btn-danger">Logout</a>

<?php require_once 'partials/footer.php';?>   