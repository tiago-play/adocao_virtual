<?php
	header('Content-Type: text/html; charset-UTF-8');
	include_once("header.php");

	include_once("../../Model/class.dao.php");
	include_once("../../Model/class.pessoa.php");
	include_once("../../Model/class.cliente.php");
	include_once("../../Controller/class.cliente.php");
	
	$cliente = new ClienteController();
	
	if (isset($_GET["id_cliente"]) && ($_GET["id_cliente"] > 0)) {
		$cliente->setId_Cliente($_GET["id_cliente"]);
		$cliente->consultarCliente();
	}
	
	$codigo = ($cliente->getId_Cliente()) ? $cliente->getId_Cliente() : $_POST["id_cliente"];
	
	switch ($cliente->get_post_action('salvar')){
		case 'salvar';
			if ($codigo != ""){
				if($cliente->editarDadosCliente()){
					echo "<script>alert('Cliente Alterado!')</script>";
					echo "<script>window.location = 'index.php';</script>";				
				} else {
					echo "<scipt>('Erro ao editar')</script>";
				}	
			} else {
				if($cliente->inserirDadosCliente()){
					echo "<script>alert('Cliente Cadastrado!')</script>";
					echo "<script>window.location = 'index.php';</script>";
				} else {
					echo "<scipt>('Erro ao cadastrar')</script>";
				}
			}	
		break;
	}
?>

 
<div class="osso"><img src="imagens/osso.png"></div> <div class="titulo">Meu Cadastro</div>

<div class="reset"></div>  

<div class="formulario">
	<form name="form_cliente" id="form_cliente" method="post" action="cliente.php">
		
		<input type="hidden" name="id_cliente" id="id_cliente" value="<?php echo $_SESSION["cliente_id"] ?>">
 		
 		<fieldset>
 			<legend>Dados Pessoais</legend>
		        <div class="radio">
					Sexo<br>	
					<input type="radio" name="sexo" id="masculino" value="M" <?php if ($cliente->getSexo() == "M") { ?>checked="checked"<?php } ?> />Masculino<br>
					<input type="radio" name="sexo" id="feminino"  value="F" <?php if ($cliente->getSexo() == "F") { ?>checked="checked"<?php } ?> />Feminino<br>
		 		</div>
		        
		        <div class="radio">
					Status<br>
					<input type="radio" name="status" id="status_ativo"   value="A" <?php if ($cliente->getStatus() == "A") { ?>checked="checked"<?php } ?> />Ativo<br>
					<input type="radio" name="status" id="status_inativo" value="I" <?php if ($cliente->getStatus() == "I") { ?>checked="checked"<?php } ?> />Inativo<br>
		 		</div>
		 		
		 		<div class="reset"></div>     
		 		                                   
		        <div class="campo">                                                       
		             <label for="nome">Nome</label>
		             <input type="text" name="nome" id="nome" maxlength="45" value="<?php echo $cliente->getNome()?>"/> <br>
		        </div>
		             
		        <div class="campo">           
		            <label for="email">Email</label>
		            <input type="text" name="email" id="email" maxlength="100" value="<?php echo $cliente->getEmail()?>"/>
		        </div>     
		        
		        <div class="reset"></div>
		        
		        <div class="campo">                                           
		        	<label for="dt_nascimento">Data de Nascimento</label>
		       		<input type="text" name="dt_nascimento" id="dt_nascimento" value="<?php echo $cliente->getDt_nascimento()?>"/> <br>
		 		</div>
		 		
		        <div class="campo">    
		        	<label for="rg">Rg</label>
		        	<input type="text" name="rg" id="rg" maxlength="9" value="<?php echo $cliente->getRg()?>"/>
		 		</div>
		 
		 		<div class="campo">    
		            <label for="cpf">Cpf</label>
		        	<input type="text" name="cpf" id="cpf" value="<?php echo $cliente->getCpf()?>"/> 
		        </div>     
		        
		        <div class="campo">          
		            <label for="telefone">Senha</label>
		        	<input type="password" name="senha" id="senha" />
		        </div>
		        
		        <div class="reset"></div>
		        
		        <div class="campo">          
		            <label for="telefone">Telefone</label>
		        	<input type="text" name="telefone" id="telefone" value="<?php echo $cliente->getTelefone()?>"/>
		        </div>
		        
		        <div class="campo">           
		            <label for="celular">Celular</label>
		        	<input type="text" name="celular" id="celular" value="<?php echo $cliente->getCelular()?>"/> <br>
		        </div> 	           
        </fieldset>   
                        
        <fieldset>         
        	<legend>Endereço</legend>                                             
		        <div class="campo">                                                          
		            <label for="cep">Cep</label>
		            <input type="text" name="cep" id="cep" value="<?php echo $cliente->getCep()?>"/>   
		        </div>
		        
		        <div class="campo">            
		            <label for="numero">N&uacute;mero</label>
		            <input type="text" name="numero" id="numero" maxlength="10" value="<?php echo $cliente->getNumero()?>"/> <br>
		        </div> 
		        
		        <div class="campo">                                         
		            <label for="complemento">Complemento</label>
		            <input type="text" name="complemento" id="complemento" maxlength="45" value="<?php echo $cliente->getComplemento()?>"/> <br>
		        </div>
		       
		        <div class="campo">            
		            <label for="bairro">Bairro</label>
		            <input type="text" name="bairro" id="bairro" maxlength="45" value="<?php echo $cliente->getBairro()?>"/> <br>
		        </div>
		        
		        <div class="reset"></div>  
		        
		        <div class="campo">                                                          
		            <label for="endereco">Endere&ccedil;o</label>
		            <input type="text" name="endereco" id="endereco" maxlength="150" value="<?php echo $cliente->getEndereco()?>"/> <br>
		        </div>
		        
		        <div class="reset"></div>  
		        
		        <div class="campo">    
		            <label>Estado</label>
		            <select id="estado" name="estado">
		            	<option/>Selecione o Estado</option>
		            </select>
		        </div> 
		        
		        <div class="campo">                                         
		            <label>Cidade</label>
		            <select id="cidade" name="cidade">
		            	<option/>Selecione a cidade</option>
		            </select>   
		        </div>  
        </fieldset>
    	
    	<div class="reset"></div>
    	
    	<div class="btnsalvar">            
		<input type="submit" name="salvar" id="salvar" value="salvar"/>  
		</div>
	</form>
</div>
<br>
<br>

<script type="text/javascript">
jQuery(document).ready(function(){

	jQuery('html, body').delay(1000).animate({
		scrollTop : jQuery(".titulo").offset().top
	}, 2000);

});
</script>

<?php include_once ("footer.php"); ?>