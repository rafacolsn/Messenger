<?php
session_start();

if(isset($_POST['disconnect'])) { // Au clique sur le boutton "Deconnexion", supprime la session & les cookeis
   $_SESSION = array();

unset($_COOKIE['username']); // Delete cookies de l'user
session_destroy(); // Destruction de la session connectée
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Déconnexion de BigChat</title>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
   <link rel="stylesheet" href="../assets/css/disconnect.css">
</head>
<body>
   <div class="title-page">
      <h2>Vous avez été déconnecté de BigChat</h2>
   </div>
      <a href="http://localhost:8000/index.php"><button class="btn btn-primary btn-lg center">Cliquez ici pour vous reconnecter</button></a>
   </div>
</body>
</html>
