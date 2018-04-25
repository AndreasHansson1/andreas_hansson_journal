
<?php require_once 'partials/inc/session_start.php';
      require_once 'partials/inc/head.php';
      

/**
 * For echoing error messages etc. Redirect with URL queries
 * to put variables inside of $_GET.
 */
if (isset($_GET["message"])) {
    echo $_GET["message"];
}

/**
 * If the variabel 'loggedIn' is set in session: hide the forms
 * if the session is not set, that means that the user is logged out
 * and we can display the forms. Session is started inside of 'head.php'
 */
if (!isset($_SESSION["loggedIn"])): ?>
<div class="container">
    <br>
    <h2>Sign Up</h2>
    <form action="partials/sign_up.php" method="POST">
        <div class="form-group">
            <label for="username">Username</label>
            <input class="form-control" type="text" name="username">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input class="form-control" type="password" name="password">
        </div>
            <input type="submit" name="submit" value="Register" class="btn btn-primary">
    </form>
    <br><br>

    <h2>Login</h2>
    <form action="partials/login.php" method="POST">
        <div class="form-group">
            <label for="username">Username</label>
            <input class="form-control" type="text" name="username">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input class="form-control" type="password" name="password">
        </div>
            <input type="submit" name="submit" value="Login" class="btn btn-success">
    </form>
</div>
<?php endif; ?>

<?php require_once 'partials/inc/footer.php';?>