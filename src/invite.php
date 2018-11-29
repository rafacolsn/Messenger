<?php 
include './assets/php/connect2db.php';


class invite {
   public $_id_user;
   public $_username;
 public function id_user()
 {
    return $this->_id_user;
 }
 public function username()
 {
    return $this->_username;
 }
}
$invitation_sql = $connexion->query("SELECT username, id_user,firstname, lastname FROM `T_USERS` ORDER BY `T_USERS`.`username` ASC
");
while($result = $invitation_sql->fetch())
{
   
   echo "<br>";
   echo $result['username']. " - " . "\n";
   echo $result['firstname'] . "\n";
   echo $result['lastname'] . "\n";
  
}
?>