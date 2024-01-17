<?php 
	session_start(); 
	session_cache_expire(10);

	if(!isset($_SESSION["acesso"]) || $_SESSION["acesso"] != "Liberado"){ 
		header("Location: identificacao.php");
		exit;
	}else{
		
	}
?>
