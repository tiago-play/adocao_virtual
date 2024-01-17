<?php 
	// Inicia sess�es 
	session_start(); 
	session_cache_expire(10);

	// Verifica se existe os dados da sess�o de login 
	if(!isset($_SESSION["acesso"]) || $_SESSION["acesso"] != "Liberado") 
	{ 
		// Usu�rio n�o logado! Redireciona para a p�gina de login 
		header("Location: login.php"); 
		exit; 
	} 	
?>
