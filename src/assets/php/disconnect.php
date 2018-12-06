<?php
session_start();

if(isset($_POST['disconnect'])) { // Au clique sur le boutton "Deconnexion", supprime la session & les cookeis
   $_SESSION = array();

unset($_COOKIE['username']); // Delete cookies de l'user

echo "<br> <h3 class='topic-title-left'>Vous avez été deconnecté de BigChat</h3> <br>
<p> Cliquez <a href='http://localhost:8000/index.php'>ici</a> pour vous reconnecter </p>

";
session_destroy(); // Destruction de la session connectée
}

?>
