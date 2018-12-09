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
    <link href="https://fonts.googleapis.com/css?family=Press+Start+2P" rel="stylesheet"> 
    <title>My Profile</title>
</head>
<body>
<div class="title-page">
    <h1>Edition de profil</h1>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-4">
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
        <div class="col-md-4">
            <span class="anchor" id="formChangeDetails"></span>
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
        <div class="col-md-4">
            <span class="anchor" id="formChangeAvatar"></span>
            <hr class="mb-5">
                <div class="card card-outline-secondary">
                    <div class="card-header">
                        <h3 class="mb-0">Change Profile Picture</h3>
                    </div>
                    <div class="card-body">
                        <form class="form" role="form" method="post" enctype="multipart/form-data" autocomplete="off">
                            <div class="form-group">
                                <label for="inputAvatar">New Avatar</label>
                                <input type="file" name="avatar" id="Avatar" required="">
                            </div>
                            <div class="form-group">
                            <button type="submit" name="change-avatar" class="btn btn-success btn-lg float-right">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
        </div>
    </div>
    <div class="backToConv">
        <div class="text-center mt-5">
            <form action="" method="post">
                <button type="submit" name="back" formmethod="post" class="btn btn-danger btn-lg">Retour</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>