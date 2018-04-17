<?php

session_start();
session_destroy();

require_once 'inc/head.php';
?>

    <div class="container">
    <h2><?php echo 'You´re logged out!'; ?></h2>
    <form action="../index.php">
        <input class="btn btn-primary" type="submit" value="Home" />
    </form>
</div>

<?php require_once 'inc/footer.php'; ?>


