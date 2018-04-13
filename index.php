
<?php require_once 'partials/head.php';

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
<form action="partials/sign_up.php" method="POST">
  <input type="text" name="username">
  <input type="password" name="password">
  <input type="submit" value="Register">
</form>

<form action="partials/login.php" method="POST">
  <input type="text" name="username">
  <input type="password" name="password">
  <input type="submit" value="Login">
</form>
<?php endif; ?>

<?php require 'partials/footer.php';?>