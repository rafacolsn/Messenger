<?php 
    //GENERATION D'ERREURS SI LES CHAMPS D'ENREGISTREMENT NE SONT PAS REMPLIS
    require("assets/php/registerlogin.php");
        if (count($errors) > 0): ?>
            <div class="error">
                <?php foreach ($errors as $error): ?>
                    <p><?php echo $error;  ?></p>
                <?php endforeach ?>
            </div>
<?php   endif ?>