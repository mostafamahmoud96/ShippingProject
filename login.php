<?php
//login.php
    session_start();
require("connection.php");
// require("session.php");
if (isset($_POST['login']) && isset($_POST['password']) && $_POST['login'] != '' && $_POST['password'] != '') //when form submitted
{

    $sel = mysqli_query($conn, "SELECT * FROM login WHERE email='" . $_POST['login'] . "' && password = '" . $_POST['password'] . "'");
    $row = mysqli_fetch_assoc($sel);
    if (mysqli_num_rows($sel) > 0) {
        if ($_POST['login'] === $row['email'] && $_POST['password'] === $row['password']) {
            $_SESSION['login'] = $_POST['login']; //write login to server storage
            setcookie("username", $_POST["login"], time() + 3600);
            setcookie("password", $_POST["password"], time() + 3600);
            header('Location: /ShippingProject/index.php'); //redirect to main
        }
    } else {
        echo "<script>alert('Wrong login or password');</script>";
        echo "<noscript>Wrong login or password</noscript>";
    }
} else {
    echo "<script>alert('UserName and password field required');</script>";
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title>Login - Mazer Admin Dashboard</title> -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="stylesheet" href="assets/css/pages/auth.css">
</head>

<body>
    <div id="auth" style="background-color:#6580aa24">

        <div class="row h-100">
            <div class="col-lg-4 col-12 offset-4 border mt-5" style="background-color:#95bdfb24">
                <div id="auth-left">

                    <h1 class="auth-title mb-5">Log in.</h1>
                    <?php if (isset($_SESSION['error'])) {
                        echo $_SESSION['error'];
                    } ?>
                    <form action="login.php" method="POST">
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-xl" placeholder="example@gmail.com"
                                name="login">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" class="form-control form-control-xl" placeholder="Password"
                                name="password">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>

                        <input type="submit" class="btn btn-success">

                    </form>

                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">

            </div>
        </div>

    </div>
</body>
<script>
if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
}
</script>

</html>