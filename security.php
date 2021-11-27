<?php
//session_start();

//USED TO STOP DIRECT ACCESS TO THE ADMIN PANEL.
if(!$_SESSION['username'])
{
   header('Location: login.php');
}


?>
