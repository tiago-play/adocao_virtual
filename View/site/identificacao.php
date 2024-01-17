<?php include_once("header.php"); ?>


<div class="ossoidentificacao"><img src="imagens/osso.png"></div> <div class="fraseidentificacao">Identificacao</div>

<div class="reset"></div>

<div class="boxformidentificacao"/> 
	<div class="formidentificacao">
		
		<table>
			<tr>
			 	<td>
			 		<div class="conteudoform">
						<form name="identificacao" id="identificacao" method="post" action="loginVerifica.php">
							
							<div class="jatemcadastro">Ja tenho cadastro</div> 
							<div class="reset"></div>
							<br>
							
							<div id="fraseerro">
								<label for="email" class="emailfrase">Email</label> 
								<input type="text" name="email" id="email"/><br/>	
							
							
								<label for="senha" class="senhafrase">Senha</label> 
								<input type="password" name="senha" id="senhaidentificacao"/><br>	
							</div>
							
							<br>
							
							<input type="submit" name="acessar" id="acessar" value="Continuar >"/>
						</form>
					</div>
				</td>
				
				<td class="barravertical"></td>
				
				<td>
					<div class="naocadastro">Ainda nao tenho cadastro</div> 
					<br>
					<br>
					<br>
					<br>
					<br>
					<div class="linkicadastro"><a href="cliente.php">Criar cadastro ></a></div>
				</td>
			</tr>
		</table>
		
	</div>
</div>

<br>
<br>

<script type="text/javascript">
jQuery(document).ready(function(){

	jQuery('html, body').delay(1000).animate({
		scrollTop : jQuery(".fraseidentificacao").offset().top
	}, 2000);

});
</script>


<?php include_once ("footer.php"); ?>