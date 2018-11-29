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
        <div class="pseudo-profil">
            <?php echo("Profil de ".$username) ?>
        </div>
        <div class="modify-password">
        <form action="" method="post">
        <div class="row">
		<div class="col-md-6 offset-md-3">
                    <span class="anchor" id="formChangePassword"></span>
                    <hr class="mb-5">

                    <div class="card card-outline-secondary">
                        <div class="card-header">
                            <h3 class="mb-0">Change Password</h3>
                        </div>
                        <div class="card-body">
                            <form class="form" role="form" autocomplete="off">
                                <div class="form-group">
                                    <label for="inputPasswordOld">New Password</label>
                                    <input type="password" name="password" class="form-control" id="inputPasswordOld" required="">
                                </div>
                                <div class="form-group">
                                    <label for="inputPasswordNew"> Confirm New Password</label>
                                    <input type="password" name="confirm-password" class="form-control" id="inputPasswordNew" required="">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success btn-lg float-right">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
	</div>
        </form>
        </div>    
        </div>
    </div>
</body>
</html>