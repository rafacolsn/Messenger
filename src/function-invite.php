<?php
function allmembers(){
    require './assets/php/connect2db.php';
		$invitation_sql = $connexion->prepare("SELECT username,id_user,firstname,lastname,connected FROM T_USERS ORDER BY connected DESC");
		$invitation_sql->execute();
	
		if($_SESSION['cv_name'] != "Accueil" ) { // Si sur page par defaut (aucun id, aucune conversation)
		
		while ($result = $invitation_sql->fetch()) // Boucle de la liste des membres
            {
				
				if ($result['connected']) { // Si utilisateur connecté, affiche ce résultat 
					echo '
						<span class="contact-list">
							<input type="checkbox" name="invitebox[]" value="'.$result['id_user'].'">
							<img src="assets/img/online.png" width="7px"></img>'. " " .$result['username'].'
						</span>';
					echo '<br />';
				}
				else { // Sinon (si deconnecté donc) affiche celui-ci
					echo '
						<span class="contact-list">
							<input type="checkbox" name="invitebox[]" value="'.$result['id_user'].'">
							<img src="assets/img/offline.png" width="7px"></img>'. " " .$result['username'].'
						</span>';
					echo '<br />';
				}
			}	
			
            echo ' <input type="submit" name="invite-conv" class="button-invite" value="Inviter un membre" />'; // Bouton d'invitation des membres
			
			if (isset($_POST['invitebox'])) { // Invitebox = valeur des checkbox pour invitation
				$invitebox = $_POST['invitebox']; // Stockage des valeur des checkbox
				$inviteconv =  $_SESSION['cv_id']; // Recuperation de la conversation id de la session
				$convname = $_SESSION['cv_name']; // Récuperation du nom de la conversation

					if($invitebox != "") { // Si checkbox différent de vide, affiche la conversation ou on été invité les membres
						echo "<h3 class='topic-title-left'>Invité sur : <strong>".$convname. "</strong></h3>";
            	    foreach($invitebox as $key => $value) { // Boucle pour inserer les invite box dans la base de donnée
					
					$pushparticipation2 = $connexion->prepare("INSERT INTO T_PARTICIPATION_CONVERSATION (user_id, conversation_id, unread_msg) VALUES ($value,$inviteconv, 0) ON DUPLICATE KEY UPDATE user_id=$value, conversation_id=$inviteconv");
					$pushparticipation2->execute(); // insertion dans la base de donnée
              			  }
						} 
					}	else { // Si aucune invitation, affiche ce message : 
						echo "<h3 class='topic-title-left'>Vous devez inviter au moins un membre </h3>";

			};

		} else { // Si on est sur la page d'accueuil, enlève toute les checkbox, aucune invitation possible
			while ($result = $invitation_sql->fetch())
            {
				
				if ($result['connected']) {
					echo '
						<span class="contact-list">
							<li type="" name="invitebox[]" value="'.$result['id_user'].'">
							<img src="assets/img/online.png" width="7px"></img>'. " " .$result['username'].'
						</span>';
					echo '<br />';
				}
				else {
					echo '
						<span class="contact-list">
							<li type="" name="invitebox[]" value="'.$result['id_user'].'">
							<img src="assets/img/offline.png" width="7px"></img>'. " " .$result['username'].'
						</span>';
					echo '<br />';
				}
			}	
		}

};
require "assets/php/bottom.php";
?>	
