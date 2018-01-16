<?php
	$url = "http://localhost:100/eye/";
	session_start();
	$_SESSION['loggedUser'] = "";
    header("Location: ".$url."index.php");
    die();
?>