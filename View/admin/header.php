<?php
	include_once "verifica.php";
	include_once "data.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/xhtml; charset=iso-8859-1" />
		<title>Adoção Virtual</title>

		<link rel="stylesheet" type="text/css" href="css/header.css" />
		<link rel="stylesheet" type="text/css" href="css/formularios.css" />
		<link rel="stylesheet" type="text/css" href="css/footer.css" />
		<link rel="stylesheet" type="text/css" href="css/lista.css" />
		<script language="javascript" type="text/javascript" src="js/jquery.js"></script>
		<script language="javascript" type="text/javascript" src="js/mascara.js"></script>
		<script language="javascript" type="text/javascript" src="js/cidades-estados.js"></script>
		<script language="javascript" type="text/javascript" src="js/cidades-estados-auxiliar.js"></script>
		<script language="javascript" type="text/javascript" src="js/jquery-validate.js"></script>
		<script language="javascript" type="text/javascript" src="js/validador.js"></script>
		<script language="javascript" type="text/javascript" src="js/pstrength.js"></script>
		<script language="javascript" type="text/javascript" src="js/alphanumeric.js"></script>
	</head>

	<body>
		<div class="box">
			<div class="logo"><img src="imagens/logotipo.png"/></div>
			<div id="botao_sair"><a href="sair.php"><img src="imagens/botao_sair.png" alt="Sair" /></a></div>
			<div id="data_extenso"><?php echo "Hoje é $nomediadasemana, $dia de $nomemes de $ano"?></div>        
	        <div class="saudacao">Olá <strong><?php echo $_SESSION["funcionario_nome"] ?></strong>, seja bem vindo ao PAINEL ADMINISTRATIVO do Adoção Virtual</div>
	        <div class="clear"></div>
		</div>
		
	    <div class="menu_principal">
	    	<ul>
	        	<li><a href="index.php">home</a></li>
	            <li><a href="funcionarioLista.php">funcionários</a></li>
	            <li><a href="clienteLista.php">clientes</a></li>
	            <li><a href="animalLista.php">animais</a></li>
	            <li><a href="vacinaLista.php">vacinas</a></li>
	            <li><a href="vacinacaoLista.php">vacinações</a></li>
	            <li><a href="eventoLista.php">eventos</a></li>
	            <li><a href="eventoCategoriaLista.php">categorias de eventos</a></li>
	            <li><a href="pedidosLista.php">pedidos</a></li>
	        </ul> 
	        <div class="clear"></div>           
	    </div>