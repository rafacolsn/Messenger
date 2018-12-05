<?php
function allmembers(){
    require './assets/php/connect2db.php';
		$invitation_sql = $connexion->prepare("SELECT username,id_user,firstname,lastname,connected FROM T_USERS ORDER BY connected DESC");
		$invitation_sql->execute();
	

		while ($result = $invitation_sql->fetch())
            {
				
				if ($result['connected']) {
					echo '
						<span class="contact-list">
							<input type="checkbox" name="invitebox[]" value="'.$result['id_user'].'">
							<img src="assets/img/online.png" width="7px"></img>'.$result['username'].'
						</span>';
					echo '<br />';
				}
				else {
					echo '
						<span class="contact-list">
							<input type="checkbox" name="invitebox[]" value="'.$result['id_user'].'">
							<img src="assets/img/offline.png" width="7px"></img>'.$result['username'].'
						</span>';
					echo '<br />';
				}
			}	
            echo ' <input type="submit" name="invite-conv" class="button-invite" value="Inviter un membre" />';
			
			if (isset($_POST['invitebox'])) {
				$invitebox = $_POST['invitebox'];
				

                
                echo "<h3 class='topic-title-left'>Vous avez invité </h3>";
                foreach($invitebox as $key => $value) {
					echo ("<span class='user-invited-list'>$value<br></span>");
					$pushparticipation2 = $connexion->prepare("INSERT INTO T_PARTICIPATION_CONVERSATION (user_id, conversation_id) VALUES ($value, 36) " );
					$pushparticipation2->execute();
                }
			};

		
};
require "assets/php/bottom.php";
?>	
