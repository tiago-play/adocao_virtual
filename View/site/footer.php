<html>
	<body>
		<footer>
			<div id = "box">
				<div class ="imagens">
					<img src="imagens/pit_bull.png"/>
					<img src="imagens/gato.png" />
					<img src="imagens/viralata.png" />
					<img src="imagens/gatinho.png" />
				
			  <?php if(!isset($_SESSION["acesso"]) || $_SESSION["acesso"] != "Liberado") { ?>
						<div id="login">
							<label><h3>Entrar:</h3> </label> <br/>
							<form name="form_login" id="form_login" action="loginVerifica.php" method="post">
							<fieldset class="boxLogin">
								<label>Email</label>
								<input type="text" name="email" id="email" />
							</fieldset>
							<fieldset class="boxLogin">
							    <label>Senha</label>
								<input type="password" name="senha" id="senha" />	
							</fieldset>
							<fieldset class="boxLogin">
								<input id = "btn" type="submit" value="Enviar Dados"/>
							</fieldset>
							</form>
							<div id="cliqueaqui">Se ainda não possui cadastro, <a href="cliente.php"><strong>clique aqui</strong></a></div>
						</div>	
			  <?php  } else { ?>
						<div id="boxsaudacao">
							Olá <strong><?php echo $_SESSION["cliente_nome"] ?></strong>, seja bem vindo (a) !!!
			 				<br>
			 				<br>
			 				<div class="reset"></div>
			 				<div class="reset"></div>
			 				<a href="sair.php"><div id="botao_sairsite">Sair</div></a>
			 			</div>
			  <?php  } ?>	
				</div> 
					  
	    	 			
				
					
				<div class="menu_rodape">
		 			<ul>
						<li><a href="quemsomos"> Quem Somos</a> /
		 				<li><a href="#"> Onde Estamos</a> /
		 				<li><a href="#"> Fale Conosco</a> /
						<li><a href="cliente"> Cadastre - se</a>
		 			</ul>
		 					
		 		<div class="imagem">
		 			<img src="imagens/AnimalClub.png">
		 		</div>
		 						
		 					<div class="secundaria">
		 						<img src="imagens/Link.png">
		 					</div>
   					 </div>	
   					 		
   				
				</footer>
		</body>
	</html>
 