<?php
	include_once ("../../Model/class.dao.php");
	include_once ("../../Model/class.pessoa.php");
	include_once ("../../Model/class.funcionario.php");
	include_once ("../../Controller/class.funcionario.php");
	
	session_start();
	session_cache_expire(10); //Expirar em 10 minutos
	
	$email = isset($_POST["email"]) ? addslashes(trim($_POST["email"])) : FALSE;
	$senha = isset($_POST["senha"]) ? md5(trim($_POST["senha"])) : FALSE;
	
	if (!$email && !$senha) {
		
		header("Location: login.php?retorno=erro");
	
	} else {
		
		$funcionario = new FuncionarioController();
		$funcionario->setEmail($email);
		$funcionario->setSenha($senha);
		
		if (!$funcionario->verificarLogin()) {
			header("Location: login.php?retorno=erro");
			
		} else {
			
			$_SESSION["acesso"] = "Liberado";
			$_SESSION["funcionario_id"] = $funcionario->getId_Funcionario();
			$_SESSION["funcionario_nome"] = $funcionario->getNome();
			
			header("Location: index.php");
			
		}
	}
	
	/*
	// Caso usuбrio nгo forneceu a senha ou o login
	if(!$email || !$senha) 
	{ 
		echo "Vocк deve digitar sua senha e seu email!"; 
		exit; 
	}

    $query = "SLECT id_funcionario, nome, email, senha FROM funcionarios WHERE email=".$email."";

    $resultado = DAO::abreConexao()->runQuery($query);
	
    $total = @mysql_num_rows($resultado);
    
	// Caso o usuбrio tenha digitado um email vбlido o nъmero de linhas serб 1.
	if($total){
		
		// Obtйm os dados do usuбrio, para poder verificar a senha e passar os demais dados para a sessгo
		$dados = @mysql_fetch_array($resultado);
		
		// funзгo strcmp retorna ZERO caso 2 strings sejam iguais, por isso o uso do operador NOT (!) na frente da mesma.
		if(!strcmp($senha, $dados["senha"])){ 
			
			// TUDO OK! Agora, passa os dados para a sessгo e redireciona o usuбrio
			$_SESSION["id_funcionario"] = $dados["id_funcionario"]; 
			$_SESSION["nome"] = stripslashes($dados["nome"]); 
			header("Location: index.php");
			exit;			
		
		} else {
			// Senha invбlida 
			echo "Senha invбlida!"; 
			exit; 
		} 
	}else { 
		// Email invбlido
		echo "O email fornecido й inexistente!"; 
		exit; 
	}*/
?>