<?php

 function allmembers(){
	 require './assets/php/connect2db.php';
		$invitation_sql = $connexion->prepare("SELECT username, id_user,firstname, lastname FROM `T_USERS` ORDER BY `T_USERS`.`username` ASC");
		
		$invitation_sql->execute();
		while ($result = $invitation_sql->fetch())
			{
            echo "<br />";
				echo ("<button class='contact-list'>" . $result['username'] );

			}
		};

	function invitation()
		{
		if (!isset($_SESSION['conversation_id']))
			{
			$_SESSION['conversation_id'] = array();
			$_SESSION['conversation_id']['author_id'] = array();
			$_SESSION['conversation_id']['subject'] = array();
			$_SESSION['conversation_id']['countmembers'] = array();
			$invite_members = $connexion->query("SELECT username FROM `T_USERS`");
			$created_topic = $connexion->query("SELECT content FROM `T_CONVERSATION`");
			}

		return true;
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
