# Projet BigChat - LIE-Hamilton-1.7 

> **Crée par :** _Andy Kraus - Steve Piron - Raphaël Colson - Youssef El Hirech_ \
> **Language :** _HTML5 - CSS3 - PHP - SQL - Javascirpt_ \
> **Github Repertoire :** _[Ici](https://github.com/rafacolsn/Messenger)_
> - **Branche utilisée :** _raph - Andy - Steve - Youssef - Developpement_
> - **Branche Final :** _master_ \

> **Consigne de l'excercice :** [Ici](https://github.com/becodeorg/LIE-Hamilton-1.7/blob/master/02-La-colline/01-php-messenger/README.md)
> 
# Comment utiliser BigChat ?

> - Arrivé sur _`index.php`_ il suffit de vous créer un compte utilisateur. 
> - Connectez-vous à ce nouveau compte
> - Arrivé sur _`messenger.php`_ vous pouvez vous rendre en haut à gauche sur "_Mon Profil_" pour ajouter un avatar, ou modifier votre mot de passe
> - De retour sur _`messenger.php`_ il vous suffit de créer une conversation sur votre droite
>   - Cette conversation s'affichera sur votre menu de gauche
>   - Il suffit de cliquer sur la conversation, et d'inviter les membres souhaités
> ___
> - Vous pouvez réagir aux messages par des _likes_ sur les messages
> - Vous pouvez supprimer uniquement vos messages et vos conversations


___

# Liste des fichiers générés pour le projet BigChat

## ./assets/php/`connect2db.php`

> Page de connexion à la base de données online

## ./assets/php/`disconnect.php`

> Page de déconnexion à la base de données et redirection

## ./assets/php/`bottom.php`

> Page de vérification des utilisateurs, update dans la base de données d'online / offline

## ./assets/php/`editprofil.php`

> Page de mise à jour du profil de l'utilisateur - Requête dans la base de données

## ./assets/php/`emoji.php`

> Emoji

## ./assets/php/`errors.php`

> Affichage d'erreurs si login & mdp incorrects

## ./assets/php/`registerlogin.php`

> Page de gestion des enregistrements et des logins, requête a la base de données

## ./assets/php/`user.php`

> Fichier de class POO utiliser pour registerlogin.php

## ./`delete-message.php`

> Fichier de gestion de la suppression des messages, requête a la base de données

## ./`display-message.php`

> Requête SQL pour récuperer les messages de la base de donnée et affichage en focntion des users connectés et de la conversation sélectionnée.

## ./`display-topic-chat.php`

> Requête SQL pour récupérer le nom du topic de la base de données et affichage dans le titre de la conversation

## ./`edit-message.php`

> Fichier de Requête SQL pour l'édition des messages envoyés par les utilisateurs 

## ./`function-invite.php`

> Fichier de requête SQL pour récupération des membres + invitation des membres et affichage de ceux-ci (Online ou Offline)

## ./`index.php`

> Page de connexion Login ou Register 

## ./`leftmessage.php`

> Requête SQL pour récuperer topic sur la gauche du site, affichage uniquement sur base des invitations + suppression uniquement pour le créateur de la conversation

## ./`messenger.php`

> Fichier principal après la connexion, page de BigChat

## ./`myprofil.php`

> Page d'édition de profil, pour les utilisateurs

## ./`post-message.php`

> Fichier de requête SQL pour insertion dans la db du message envoyé au clique sur le bouton "Envoi"

## ./`react.php`

> Fichier de requête SQL pour insertion du 'like' dans la base de données

## ./`topic.php`

> Fichier de requête SQL pour insertion de la conversation créée dans la base de données 

## ./`update-message.php`

> Fichier de requête lors de l'édition d'un message

## ./`.gitignore`
> - `/db/*` - Utilisé uniquement pour le local serveur

 

Bon travail !
