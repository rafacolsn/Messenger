<?php


function allmembers(){
    require './assets/php/connect2db.php';
        $invitation_sql = $connexion->prepare("SELECT username, id_user,firstname, lastname, connected FROM `T_USERS` ORDER BY `T_USERS`.`id_user` ASC");

        $invitation_sql->execute();
        while ($result = $invitation_sql->fetch())
            {

                echo utf8_encode("<input type='checkbox' name='invitebox[]' value='".$result['id_user']." - ".$result['username']."' <li class='contact-list'>" . " <span>" . $result['username'] . "</span></li>" );
                echo "<br />";
            } 
            echo ' <input type="submit" name="invite-conv" class="button-invite" value="Invite Members" />';
            if (isset($_POST['invitebox'])) {
                $invitebox = $_POST['invitebox'];
                
                echo "<h3 class='topic-title-left'>Vous avez invité </h3>";
                foreach($invitebox as $key => $value) {
                    echo ("<span class='user-invited-list'>$value<br></span>");
                }
            }
            
            // else { 
            //  echo ("<h3 class='topic-title-left'>Select someone for your topic </h3>");
            // }

        };

	function invitation()
		{
			require "assets/php/connect2db.php";

			if (!isset($_SESSION['id_conversation']))
						{
						$_SESSION['id_conversation'] = array();
						$_SESSION['id_conversation']['author_id'] = array();
						$_SESSION['id_conversation']['subject'] = array();
						$invite_members = $connexion->prepare("SELECT username FROM `T_USERS`");
						$invite_members->execute();
			
						$created_topic = $connexion->prepare("SELECT subject FROM `T_CONVERSATION`");
						$created_topic->execute();

						while($topicinvitation222 = $invite_members->fetch() ) {
							echo ' <li class="topicleft" name="topicname">'.$topicinvitation222['topicname'].'</li><br>';
				 
					  };

						}
						// print_r($created_topic);
						// print_r($invite_members);
		}

	function addMembers($author_id, $subject)
		{
		if (invitation() && !IsEmpty())
			{
			$listmembers = array_search($author_id, $_SESSION['conversation_id']['author_id']);
			if ($listmembers !== false)
				{
				$_SESSION['conversation_id']['author_id'][$listmembers]+= $countmembers;
				}
			  else
				{
               array_push($_SESSION['conversation_id']['author_id'], $author_id);
               array_push($_SESSION['conversation_id']['subject'], $subject);
               array_push($_SESSION['conversation_id']['countmembers'], $countmembers);
				}
			}
		  else
			{
			echo "Membre déjà dans la conversation";
			}
		}

	function deleteMembers($author_id)
		{
		if (addMembers() && IsEmpty())
			{
			$backupconversation_id = array();
			$backupconversation_id['author_id'] = array();
			$backupconversation_id['subject'] = array();
			$backupconversation_id['countmembers'] = array();
			for ($i = 0; $i < count($_SESSION['conversation_id']['author_id']); $i++)
				{
				if ($_SESSION['conversation_id']['members'][$i] !== $author_id)
					{
					array_push($_SESSION['conversation_id']['author_id'], $_SESSION['conversation_id']['author_id'][$i]);
					array_push($_SESSION['conversation_id']['subject'], $_SESSION['conversation_id']['subject'][$i]);
					array_push($_SESSION['conversation_id']['countmembers'], $_SESSION['conversation_id']['countmembers'][$i]);
					}
				}

			$_SESSION['conversation_id'] = $backupconversation_id;
			unset($backupconversation_id);
			}
		  else
			{
			echo "Erreur, nous ne pouvons kick ce membre";
			}
		}

	function countMembers()
		{
		if (isset($_SESSION['conversation_id']))
			{
			return count($_SESSION['conversation_id']['countmembers']);
			}
		}

	function closeTopic() {
	session_start();
	require "assets/php/connect2db.php";
	
	if ($_GET['action'] == 'delete_conv') {
		 $req_delete = $connexion->prepare("DELETE FROM T_CONVERSATION WHERE id_conversation = :conv_id");
		 $req_delete->bindValue(':conv_id', $_GET['id']);
		 $req_delete->execute();
	};
	header("Location: messenger.php?cv_id=".intval($convers).'&cv_name='.$_SESSION['cv_name'].'' ); // renvoie à la page de la conversation
	
		}

	function IsEmpty()
		{
		if (isset($_SESSION['conversation_id']) && $_SESSION['IsEmpty'])
			{
			return true;
			}
		  else
			{
			return false;
			}
		}
	

// if($countmembers=0) {
//    $listmembers = array_search($_SESSION['conversation_id']['members'],$members );
//    if ($listmembers!==false) {
//       $_SESSION['members']['members']['listmembers'] = $countmembers;
//    }
// }

?>
