<?php
    session_start();
    $username = $_SESSION['username'];
    require "assets/php/editprofile.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/profile.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <title>My Profile</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <span class="anchor" id="formChangePassword"></span>
            <hr class="mb-5">
                <div class="card card-outline-secondary">
                    <div class="card-header">
                        <h3 class="mb-0">Change Password</h3>
                    </div>
                    <div class="card-body">
                        <form class="form" role="form" method="post" autocomplete="off">
                            <div class="form-group">
                                <label for="inputPassword">New Password</label>
                                <input type="password" name="password" class="form-control" id="inputPassword" required="">
                            </div>
                            <div class="form-group">
                                <label for="inputConfirmPassword"> Confirm New Password</label>
                                <input type="password" name="confirm-password" class="form-control" id="inputConfirmPassword" required="">
                            </div>
                            <div class="form-group">
                            <button type="submit" name="save-password" class="btn btn-success btn-lg float-right">Save</button>
                            </div>
                        </form>
                 </div>
            </div>
        </div>
        <div class="col-md-6">
            <span class="anchor" id="formChangePassword"></span>
            <hr class="mb-5">
                <div class="card card-outline-secondary">
                    <div class="card-header">
                        <h3 class="mb-0">Change Firstname & Lastname</h3>
                    </div>
                    <div class="card-body">
                        <form class="form" role="form" method="post" autocomplete="off">
                            <div class="form-group">
                                <label for="inputFirstname">New Firstname</label>
                                <input type="text" name="firstname" class="form-control" id="inputFirstname" required="">
                            </div>
                            <div class="form-group">
                                <label for="inputLastname">New Lastname</label>
                                <input type="text" name="lastname" class="form-control" id="inputLastname" required="">
                            </div>
                            <div class="form-group">
                            <button type="submit" name="change-names" class="btn btn-success btn-lg float-right">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
        </div>
    </div>
</div>
</body>
</html>