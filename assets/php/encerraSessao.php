<?php

session_start();

unset($_SESSION['id']);
unset($_SESSION['logado']);
$_SESSION = array();

header('Location: ../../index.php'); 
	 
?>
