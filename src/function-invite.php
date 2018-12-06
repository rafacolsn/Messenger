<?php
function allmembers(){
    require './assets/php/connect2db.php';
		$invitation_sql = $connexion->prepare("SELECT username,id_user,firstname,lastname,connected FROM T_USERS ORDER BY connected DESC");
		$invitation_sql->execute();
	
		if($_GET['cv_id'] != NULL || $_GET['cv_name'] != NULL ) {
		
		while ($result = $invitation_sql->fetch())
            {
				
				if ($result['connected']) {
					echo '
						<span class="contact-list">
							<input type="checkbox" name="invitebox[]" value="'.$result['id_user'].'">
							<img src="assets/img/online.png" width="7px"></img>'. " " .$result['username'].'
						</span>';
					echo '<br />';
				}
				else {
					echo '
						<span class="contact-list">
							<input type="checkbox" name="invitebox[]" value="'.$result['id_user'].'">
							<img src="assets/img/offline.png" width="7px"></img>'. " " .$result['username'].'
						</span>';
					echo '<br />';
				}
			}	
			
            echo ' <input type="submit" name="invite-conv" class="button-invite" value="Inviter un membre" />';
			
			if (isset($_POST['invitebox'])) {
				$invitebox = $_POST['invitebox'];
				$inviteconv =  $_SESSION['cv_id'];
				$convname = $_SESSION['cv_name'];
					if($invitebox != "") {
						echo "<h3 class='topic-title-left'>Invité sur : <strong>".$convname. "</strong></h3>";
            	    foreach($invitebox as $key => $value) {
					
					$pushparticipation2 = $connexion->prepare("INSERT INTO T_PARTICIPATION_CONVERSATION (user_id, conversation_id, unread_msg) VALUES ($value,$inviteconv, 0) ON DUPLICATE KEY UPDATE user_id=$value, conversation_id=$inviteconv");
					$pushparticipation2->execute();
              			  }
						} 
					}	else {
						echo "<h3 class='topic-title-left'>Vous devez inviter au moins un membre </h3>";

			};

		} else {
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
