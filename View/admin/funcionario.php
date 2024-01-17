<?php
	session_start();
	session_cache_expire(10);

	include_once ("../../Model/class.dao.php");
	include_once ("../../Model/class.pessoa.php");
	include_once ("../../Model/class.funcionario.php");
	include_once ("../../Controller/class.funcionario.php");

	$funcionario = new FuncionarioController();
	
	if (isset($_GET["id_funcionario"]) && ($_GET["id_funcionario"] > 0)) {
		$funcionario->setId_Funcionario($_GET["id_funcionario"]);		
		$funcionario->consultarFuncionario();
	}
	
	/*
	 * se a condição for verdadeira, $funcionario->getId_Funcionario()
	 * joga o id_funcionario na variavel $codigo, se for falso ":"
	 * joga o post $_POST["id_funcionario"]
	 */
	
	$codigo = ($funcionario->getId_Funcionario()) ? $funcionario->getId_Funcionario() : $_POST["id_funcionario"];
	
	switch ($funcionario->get_post_action('novo','acao','deletar'))	{
		case 'novo';
			echo "<script>window.location = 'funcionario.php';</script>";
		break;
		
		case 'acao';
			if ($codigo != ""){
				if($funcionario->editarDadosFuncionario()){
					echo "<script>alert('Funcionario Alterado!')</script>";
					echo "<script>window.location = 'funcionarioLista.php';</script>";				
				} else {
					echo "<scipt>('Erro ao editar')</script>";
				}	
			} else {
				if($funcionario->inserirDadosFuncionario()){
					echo "<script>alert('Funcionario Cadastrado!')</script>";
					echo "<script>window.location = 'funcionarioLista.php';</script>";
				} else {
					echo "<scipt>('Erro ao cadastrar')</script>";
				}
			}
		break;
			
		case 'deletar';
			if($funcionario->deletarDadosfuncionario()){
				echo "<script>alert('Funcionario Deletado!')</script>";
				echo "<script>window.location = 'funcionarioLista.php';</script>";				
			} else {
				echo "<scipt>('Erro ao deletar')</script>";
			}
		break;
	}
	
	include_once("header.php");
?>

<div class="titulo">Cadastro de Funcionários</div>

<div class="formulario">
	<form name="form_funcionario" id="form_funcionario" method="post" action="funcionario.php">
 	    
 	    <fieldset>
	 	    <div class="campo">
	       		<label for="id_funcionario">Código</label>    
	        	<input type="text" name="id_funcionario" id="id_funcionario" readonly="readonly" value="<?php echo $funcionario->getId_Funcionario()?>"/>
	 		</div>
 		</fieldset>
 		
 		<fieldset>
 			<legend>Dados Pessoais</legend>
		 		<div class="radio">
					Tipo de Funcionário<br>
					<input type="radio" name="tipo" id="tipo_adm"   value="A" <?php if ($funcionario->getTipo() == "A") { ?>checked="checked"<?php } ?> />Administrador<br>
					<input type="radio" name="tipo" id="tipo_comum" value="C" <?php if ($funcionario->getTipo() == "C") { ?>checked="checked"<?php } ?> />Comun<br>
		 			<!--  <label for="tipo" generated="true" class="error" style="">Selecione o tipo.</label> -->
		 		</div>
 				
		        <div class="radio">
					Sexo<br>	
					<input type="radio" name="sexo" id="masculino" value="M" <?php if ($funcionario->getSexo() == "M") { ?>checked="checked"<?php } ?> />Masculino<br>
					<input type="radio" name="sexo" id="feminino"  value="F" <?php if ($funcionario->getSexo() == "F") { ?>checked="checked"<?php } ?> />Feminino<br>
		 		</div>
		        
		        <div class="radio">
					Status<br>
					<input type="radio" name="status" id="status_ativo"   value="A" <?php if ($funcionario->getStatus() == "A") { ?>checked="checked"<?php } ?> />Ativo<br>
					<input type="radio" name="status" id="status_inativo" value="I" <?php if ($funcionario->getStatus() == "I") { ?>checked="checked"<?php } ?> />Inativo<br>
		 		</div>
		 		
		 		<div class="reset"></div>     
		 		                                   
		        <div class="campo">                                                       
		             <label for="nome">Nome</label>
		             <input type="text" name="nome" id="nome" maxlength="45" value="<?php echo $funcionario->getNome()?>"/> <br>
		        </div>
		             
		        <div class="campo">           
		            <label for="email">Email</label>
		            <input type="text" name="email" id="email" maxlength="100" value="<?php echo $funcionario->getEmail()?>"/>
		        </div>     
		        
		        <div class="reset"></div>
		        
		        <div class="campo">                                           
		        	<label for="dt_nascimento">Data de Nascimento</label>
		       		<input type="text" name="dt_nascimento" id="dt_nascimento" value="<?php echo $funcionario->getDt_nascimento()?>"/> <br>
		 		</div>
		 		
		        <div class="campo">    
		        	<label for="rg">Rg</label>
		        	<input type="text" name="rg" id="rg" maxlength="9" value="<?php echo $funcionario->getRg()?>"/>
		 		</div>
		 
		 		<div class="campo">    
		            <label for="cpf">Cpf</label>
		        	<input type="text" name="cpf" id="cpf" value="<?php echo $funcionario->getCpf()?>"/> 
		        </div>

		        <div class="campo">            
		            <label for="senha">Senha</label>
		            <input type="password" name="senha" id="senha" value=""/> <br>
		        </div>       
		        
		        <div class="reset"></div>
		        
		        <div class="campo">          
		            <label for="telefone">Telefone</label>
		        	<input type="text" name="telefone" id="telefone" value="<?php echo $funcionario->getTelefone()?>"/>
		        </div>
		        
		        <div class="campo">           
		            <label for="celular">Celular</label>
		        	<input type="text" name="celular" id="celular" value="<?php echo $funcionario->getCelular()?>"/> <br>
		        </div> 	           
        </fieldset>   
                        
        <fieldset>
 			<legend>Endereço</legend>                                                      
		        <div class="campo">                                                          
		            <label for="cep">Cep</label>
		            <input type="text" name="cep" id="cep" value="<?php echo $funcionario->getCep()?>"/>  
		        </div>
		        
		        <div class="campo">            
		            <label for="numero">Numero</label>
		            <input type="text" name="numero" id="numero" maxlength="10" value="<?php echo $funcionario->getNumero()?>"/> <br>
		        </div> 
		        
		        <div class="campo">                                         
		            <label for="complemento">Complemento</label>
		            <input type="text" name="complemento" id="complemento" maxlength="45" value="<?php echo $funcionario->getComplemento()?>"/> <br>  
		        </div>
		       
		        <div class="campo">            
		            <label for="bairro">Bairro</label>
		            <input type="text" name="bairro" id="bairro" maxlength="45" value="<?php echo $funcionario->getBairro()?>"/> <br>
		        </div>
		        
		        <div class="reset"></div>  
		        
		        <div class="campo">                                                          
		            <label for="endereco">Endereço</label>
		            <input type="text" name="endereco" id="endereco" maxlength="150" value="<?php echo $funcionario->getEndereco()?>"/> <br>
		        </div>
		        
		        <div class="reset"></div>  
		        
		        <div class="campo">    
		            <label>Estado</label>
		            <select id="estado" name="estado"></select>
		        </div> 
		        
		        <div class="campo">                                         
		            <label>Cidade</label>
		            <select id="cidade" name="cidade">
		            	<option/>Selecione a cidade</option>
		            </select>   
		        </div>  
        </fieldset>
               
        <div class="botoes">            
            <div id="listar"><a href="funcionarioLista.php"><img src="imagens/listar.png"  alt="listar"/></a></div>
			<input type="image" name="deletar"   id="deletar"    src="imagens/deletar.png" value="Deletar"/>
			<input type="image" name="acao"      id="gravar"     src="imagens/gravar.png"  value="acao"/>
			<input type="image" name="novo"      id="novo"       src="imagens/novo.png"    value="Novo"/>   
        </div>
	</form>
</div>
	
<?php include_once ("footer.php"); ?>