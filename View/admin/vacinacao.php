<?php
	session_start();
	session_cache_expire(10);

	include_once("../../Model/class.dao.php");
	include_once("../../Model/class.vacinacao.php");
	include_once("../../Controller/class.vacinacao.php");
	
	$vacinacao = new VacinacaoController();
	$listaNomeAnimal = $vacinacao->listaNomeAnimal();
	$listaNomeVacina = $vacinacao->listaNomeVacina();
	
	if(isset($_GET["id_vacina_animal"]) && ($_GET["id_vacina_animal"] > 0)){
		$vacinacao->setId_Vacina_Animal($_GET["id_vacina_animal"]);
		$vacinacao->consultarVacinacao();
	}
	
	$codigo = ($vacinacao->getId_Vacina_Animal()) ? $vacinacao->getId_Vacina_Animal() : $_POST["id_vacina_animal"];
	
	switch ($vacinacao->get_post_action('novo','acao','deletar')){
		case 'novo';
			echo "<script>window.location = 'vacinacao.php';</script>";
		break;
		
		case 'acao';
			if($codigo != ""){	
				if($vacinacao->editarDadosVacinacao()){
					echo "<script>alert('Vacinacao Alterada!')</script>";
					echo "<script>window.location = 'vacinacaoLista.php';</script>";				
				} else {
					echo "<scipt>('Erro ao alterar')</script>";
				}
			} else {
				if($vacinacao->inserirDadosVacinacao()){
					echo "<script>alert('Vacinacao Cadastrada!')</script>";
					echo "<script>window.location = 'vacinacaoLista.php';</script>";
				} else {
					echo "<scipt>('Erro ao cadastrar')</script>";
				}
			}
		break;
			
		case 'deletar';
			if($vacinacao->deletarDadosVacinacao()){
				echo "<script>alert('Vacinacao Deletada!')</script>";
				echo "<script>window.location = 'vacinacaoLista.php';</script>";				
			} else {
				echo "<scipt>('Erro ao deletar')</script>";
			}
		break;
	}
	
	include_once("header.php");
	
?>
<div class="titulo">Cadastro de Vacinações</div>

<div class="formulario">
	<form name="form_vacinacao" id=form_vacinacao method="post" action="vacinacao.php">
		<input type="hidden" name="id_funcionario" id="id_funcionario" value="<?php echo $_SESSION["funcionario_id"] ?>" >
		
		<fieldset>
			<div class="campo">
				<label for="id_vacina_animal">Código</label> 
				<input type="text" name="id_vacina_animal" id="id_vacina_animal" readonly="readonly" value="<?php	echo $vacinacao->getId_Vacina_Animal()?>"/> <br>
			</div>
		</fieldset>
		
		<fieldset>
			<div class="campo">
				<label for="id_animal">Animal</label>
				<select name="id_animal" id="id_animalselecao">	
					<option>Selecione...</option>	
						<?php while ($array_nomeAnimal = mysql_fetch_array($listaNomeAnimal)) { ?>
					 		<option value="<?php echo $array_nomeAnimal["id_animal"] ?>" <?php if ($array_nomeAnimal["id_animal"] == $vacinacao->getId_Animal()) { ?>selected="selected"<?php } ?>> <?php echo $array_nomeAnimal["nome"] ?></option>
						<?php } ?>	
				</select>
			</div>
			
			<div class="campo">	
				<label for="id_vacina">Vacina</label>
				<select name="id_vacina" id="id_vacinaselecao">
					<option>Selecione...</option>
						<?php while ($array_nomeVacina = mysql_fetch_array($listaNomeVacina)) {?>
							<option value="<?php echo $array_nomeVacina["id_vacina"] ?>" <?php if ($array_nomeVacina["id_vacina"] == $vacinacao->getId_Vacina()){ ?>selected="selected"<?php } ?>> <?php echo $array_nomeVacina["nome"] ?></option>
						<?php } ?>
				</select>
			</div>
			
			<div class="reset"></div>
			
			<div class="campo">
				<label for="dt_vacinacao">Data da Vacinação</label>
				<input type="text" name="dt_vacinacao" id="dt_vacinacao" value="<?php echo $vacinacao->getDt_Vacinacao() ?>"/>
			</div>
		</fieldset>
		
		<div class="botoes">            
            <div class="botoes">            
            <div id="listar"><a href="vacinacaoLista.php"><img   src="imagens/listar.png"  alt="listar"/></a></div>
			<input type="image" name="deletar"   id="deletar"    src="imagens/deletar.png" value="Deletar"/>
			<input type="image" name="acao"      id="gravar"     src="imagens/gravar.png"  value="acao"/>
			<input type="image" name="novo"      id="novo"       src="imagens/novo.png"    value="Novo"/>   
        </div>    
	</form>
</div>
	   
<br>
<br>	   
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<?php include_once ("footer.php"); ?>
		
		
	
	
