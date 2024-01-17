<?php
	session_start();
	session_cache_expire(10);
	
	include_once ("../../Model/class.dao.php");
	include_once ("../../Model/class.animal.php");
	include_once ("../../Controller/class.animal.php");

	$animal = new AnimalController();
	
	if(isset($_GET['id_animal']) && ($_GET["id_animal"]>0)){
		$animal->setId_Animal($_GET["id_animal"]);
		$animal->consultarAnimal();
	}
	
	$codigo = ($animal->getId_Animal()) ? $animal->getId_Animal() : $_POST["id_animal"];
	
	switch ($animal->get_post_action('novo','acao','deletar')){
		case 'novo';
			echo "<script>window.location = 'animal.php';</script>";
		break;
		
		case 'acao';
			if ($codigo != ""){
				if($animal->editarDadosAnimal()){
					echo "<script>alert('Animal Alterado!')</script>";
					echo "<script>window.location = 'animalLista.php';</script>";				
				} else {
					echo "<scipt>('Erro ao editar')</script>";
				}	
			} else {
				if($animal->inserirDadosAnimal()){
					echo "<script>alert('Animal Cadastrado!')</script>";
					echo "<script>window.location = 'animalLista.php';</script>";
				} else {
					echo "<scipt>('Erro ao cadastrar')</script>";
				}
			}
		break;
			
		case 'deletar';
			if($animal->deletarDadosAnimal()){
				echo "<script>alert('Animal Deletado!')</script>";
				echo "<script>window.location = 'animalLista.php';</script>";				
			} else {
				echo "<scipt>('Erro ao deletar')</script>";
			}
		break;
	}
	
	include_once("header.php");
?>

<div class="titulo">Cadastro de Animais</div>

<div class="formulario">
	<form name="form_animal" id="form_animal" method="post" action="animal.php" enctype="multipart/form-data">			
		<input type="hidden" name="id_funcionario" id="id_funcionario" value="<?php echo $_SESSION["funcionario_id"] ?>" >                                
			
		<fieldset>
			<div class="campo">
				<label for="id_animal">Código</label> 
				<input type="text" name="id_animal" id="id_animal"  readonly="readonly" value="<?php	echo $animal->getId_Animal()?>"/> <br>
			</div>
		</fieldset>
		
		<fieldset>			
			<div class="radio">
				Porte<br>
				<input type="radio" name="porte" id="pequeno" value="P" <?php if ($animal->getPorte() == "P") { ?>checked="checked"<?php } ?> />Pequeno<br>
				<input type="radio" name="porte" id="medio"   value="M" <?php if ($animal->getPorte() == "M") { ?>checked="checked"<?php } ?> />Medio<br>
				<input type="radio" name="porte" id="grande"  value="G" <?php if ($animal->getPorte() == "G") { ?>checked="checked"<?php } ?> />Grande<br>
			</div>
			
			<div class="radio">
				Sexo<br>
		    	<input type="radio" name="sexo" id="masculino" value="M" <?php if ($animal->getSexo() == "M") { ?>checked="checked"<?php } ?> />Macho<br>
				<input type="radio" name="sexo" id="feminino"  value="F" <?php if ($animal->getSexo() == "F") { ?>checked="checked"<?php } ?> />Fêmea<br>
			</div>
			
			<div class="reset"></div>
			
			<div class="campo">
	    		<label for="nome">Nome</label> 
	    		<input type="text" name="nome" id="nome" value="<?php echo $animal->getNome()?>"/> <br>
			</div>
			
			<div class="reset"></div>
			
			<div class="campo">
	    		<label for="dt_nascimento">Data de nascimento</label> 
	    		<input type="text" name="dt_nascimento" id="dt_nascimento" value="<?php echo $animal->getDt_Nascimento()?>"/> <br>
			</div>
			
			<div class="campo">
	    		<label for="cor">Cor</label>
	    		<input type="text" name="cor" id="cor" value="<?php echo $animal->getCor()?>"/> <br>
			</div>
	    	
	    	<div class="reset"></div>
	    	
	    	<div class="campo">
		    	<label for="raca">Raça</label> 
		    	<input type="text" name="raca" id="raca" value="<?php echo $animal->getRaca()?>"/> <br>
			</div>
			
			<div class="campo">
	    		<label for="procedencia">Procedência</label>
	    		<input type="text" name="procedencia" id="procedencia" value="<?php echo $animal->getProcedencia()?>"/> <br>
			</div>
			
			<div class="reset"></div>
			
			<div class="campo">
				<label for="tipo">Tipo de Animal</label> 
				<input type="text" name="tipo" id="tipo" value="<?php echo $animal->getTipo()?>"/> <br>
			</div>
			
			<div class="reset"></div>
			
			<div class="campo">
				<label for="nome_imagem">Nome da Imagem</label> 
				<input type="text" name="nome_imagem" id="nome_imagem"  readonly="readonly" value="<?php echo $animal->getNome_imagem()?>"/> <br>
			</div>
			
			<select name="estado" id="busca_animal">
	            <option value="0">Selecione o Estado</option>
	            <option value="AC">Acre </option>
	            <option value="AL">Alagoas </option>
	            <option value="AP">Amapá </option>
	            <option value="AM">Amazonas </option>
	            <option value="BA">Bahia  </option>
	            <option value="CE">Ceará </option>
	            <option value="DF">Distrito Federal </option>
	            <option value="ES">Espírito Santo </option>
	            <option value="GO">Goiás </option>
	            <option value="MA">Maranhão</option>
	            <option value="MT">Mato Grosso </option>
	            <option value="MS">Mato Grosso do Sul </option>
	            <option value="MG">Minas Gerais </option>
	            <option value="PA">Pará </option>
	            <option value="PB">Paraíba </option>
	            <option value="PR">Paraná </option>
	            <option value="PE">Pernambuco </option>
	            <option value="PI">Piauí </option>
	            <option value="RJ">Rio de Janeiro </option>
	            <option value="RN">Rio Grande do Norte </option>
	            <option value="RS">Rio Grande do Sul </option>
	            <option value="RO">Rondônia </option>
	            <option value="RR">Roraima </option>
	            <option value="SC">Santa Catarina </option>
	            <option value="SP">São Paulo </option>
	            <option value="SE">Sergipe </option>
	            <option value="TO">Tocantins </option>
            </select>
			
			<div class="reset"></div>
			
			<div class="campo">
				<label>Foto</label>
				<input type="file" name="foto" />
			</div>
		
		</fieldset>

		<div class="botoes">                    
            <div id="listar"><a href="animalLista.php"><img src="imagens/listar.png"  alt="listar"/></a></div>
			<input type="image" name="deletar"   id="deletar"    src="imagens/deletar.png" value="Deletar"/>
			<input type="image" name="acao"      id="gravar"     src="imagens/gravar.png"  value="acao"/>
			<input type="image" name="novo"      id="novo"       src="imagens/novo.png"    value="Novo"/>   
        </div>
    
	</form>
</div>

<?php include_once ("footer.php"); ?>