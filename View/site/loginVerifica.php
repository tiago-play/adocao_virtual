<?php
	include_once ("../../Model/class.dao.php");
	include_once ("../../Model/class.pessoa.php");
	include_once ("../../Model/class.cliente.php");
	include_once ("../../Controller/class.cliente.php");
	
	session_start();
	session_cache_expire(10); //Expirar em 10 minutos
	
	$email = isset($_POST["email"]) ? addslashes(trim($_POST["email"])) : FALSE;
	$senha = isset($_POST["senha"]) ? md5(trim($_POST["senha"])) : FALSE;
	
	if (!$email && !$senha) {
		
		header("Location: index.php?retorno=erro");
	
	} else {
		
		$cliente = new ClienteController();
		$cliente->setEmail($email);
		$cliente->setSenha($senha);
		
		if(!$cliente->verificarLogin()){
			header("Location: index.php?retorno=erro");
		
		} else{
			
			$_SESSION["acesso"] = "Liberado";
			$_SESSION["cliente_id"] = $cliente->getId_Cliente();
			$_SESSION["cliente_nome"] = $cliente->getNome();
			
			header("Location: index.php");
		}	
	}
	
?>