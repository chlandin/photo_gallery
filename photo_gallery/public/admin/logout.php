<?php require_once("../../inc/initialize.php"); ?>
<?php	
    $session->logout();
    redirect_to("login.php");
?>
