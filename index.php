<?php
//login.php
session_start();
require("session.php");
require("cookies.php");



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

                    <form action="" method="POST">
                        <div class="form-group position-relative has-icon-left mb-4">
<<<<<<< HEAD
                            <input type="text" class="form-control form-control-xl" placeholder="example@gmail.com" name="email">
=======
                            <input type="text" class="form-control form-control-xl" placeholder="example@gmail.com"
                                name="user_email">
>>>>>>> 994deee79161b4ee295b3e7b688b8153ef541192
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
<<<<<<< HEAD
                            <input type="password" class="form-control form-control-xl" placeholder="Password" name="password">
=======
                            <input type="password" class="form-control form-control-xl" placeholder="Password"
                                name="user_password">
>>>>>>> 994deee79161b4ee295b3e7b688b8153ef541192
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>

                        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5" type="submit" name="login">Log
                            in</button>
                    </form>

                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">

            </div>
        </div>

    </div>
</body>



</html>