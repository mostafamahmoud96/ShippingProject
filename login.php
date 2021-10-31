<?php
//login.php
session_start();
require("connection.php");
// require("session.php");
// require("cookies.php");

// session_start();
// if(isset($_POST['login'])){
// 	$username = $_POST['user_email'];
// 	$password = $_POST['useer_password'];
// 	//check login details
// 	$stmt = $connect->prepare("select * from `login` where `email` = '$username' and `password` = '$password'");
// 	$stmt->execute();
// 	//echo $stmt->rowCount();
// 	//exit();
// 	if($stmt->rowCount()>0){
// 		// $_SESSION['username'] = $username; ana br
// 		// a2bk 25dt bali :)  anha h
// 		// ana bara2bk w hara2bk hhhhhhhhhhhh
// 		// hhhhhhhhhhhhhhhh mashy enjoy b2a 
// 		// l session hatmotni ya moustafa hhhh
// 		// sebeha dlw2ty w honshofha b3den 
// 		// ok 2w3a taslm l project bl kalam da
// 		// da ytl3 error kam da hhhhhhhhhhhh
// 		// error ignore405 hhwhwhwh 
// 		// 2hm 7aga l ignore 
// 		// yala nshta8l b2a 
// 		// eshta  yala 
// 		header("location: layout.php");
// 		$_SESSION['success'] = "You are logged in";
// 	}
// 	else{
// 		header("location: index.php");
// 		$_SESSION['error'] = "<div class='alert alert-danger' role='alert'>Oh snap! Invalid login details.</div>";
// 		}
// 	}	

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
                    <?php if(isset($_SESSION['error'])){ echo $_SESSION['error']; }?>
                    <form action="" method="POST">
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-xl" placeholder="example@gmail.com"
                                name="user_email">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" class="form-control form-control-xl" placeholder="Password"
                                name="user_password">
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