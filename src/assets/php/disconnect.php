<?php
session_start();
header_remove();

$_SESSION= array();

if(isset($_POST['disconnect'])) {
   $_SESSION = array();

unset($_COOKIE['username']);

echo "<br> <h3 class='topic-title-left'>Vous avez été deconnecté de BigChat</h3> <br>
<p> Cliquez <a href='http://localhost:8000/index.php'>ici</a> pour vous reconnecter </p>

";
session_destroy();
}

?>
