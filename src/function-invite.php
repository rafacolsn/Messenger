<?php

invitation();


 function allmembers(){
	require './assets/php/connect2db.php';
		$invitation_sql = $connexion->prepare("SELECT username, id_user,firstname, lastname FROM `T_USERS` ORDER BY `T_USERS`.`username` ASC");
		
		$invitation_sql->execute();
		while ($result = $invitation_sql->fetch())
			{
            echo "<br />";
				echo ("<a href='function-invite.php'><li class='contact-list'>" . $result['username'] . "</li> </a>" );

			}
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
							echo '<li class="topicleft" name="topicname">'.$topicinvitation222['topicname'].'</li><br>';
				 
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

	function closeTopic()
		{
		if (isset($_SESSION['conversation_id']))
			{
			unset($_SESSION['conversation_id']);
			}
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
