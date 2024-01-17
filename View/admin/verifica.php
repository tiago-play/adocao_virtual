<?php 
	// Inicia sessões 
	session_start(); 
	session_cache_expire(10);

	// Verifica se existe os dados da sessão de login 
	if(!isset($_SESSION["acesso"]) || $_SESSION["acesso"] != "Liberado") 
	{ 
		// Usuário não logado! Redireciona para a página de login 
		header("Location: login.php"); 
		exit; 
	} 	
?>
