<html>
<head><title>Login</title>

<link rel="stylesheet" type="text/css" href="css/estilo_login.css"/>

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery-validate.js"></script>
<script type="text/javascript" src="js/login.js"></script>

</head>

<body>
    <div class="box"/> 
		<div id="frase"><strong>ÁREA RESTRITA</strong></div>
		
		<div class="formulario_login">
			<form name="login" id="login" method="post" action="loginVerifica.php">
				
				<div id="fraseerro">
					<label for="email" class="emailfrase">Email</label> 
					<input type="text" name="email" id="email"/><br/>	
				
				
					<label for="senha" class="senhafrase">Senha</label> 
					<input type="password" name="senha" id="senha"/><br>	
				</div>
				
				<input type="submit" name="acessar" id="acessar" value="Acessar"/>
				<input type="reset" name="limpar" id="limpar" value="Limpar"/>
				
			</form>
		</div>
		<div id="cadeado"><img src="imagens/cadeado.png"/></div>
	</div>
</body>
</html>
