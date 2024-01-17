<?php
	session_start();
	session_cache_expire(10);

	include_once("../../Model/class.dao.php");
	include_once("../../Model/class.vacina.php");
	include_once("../../Controller/class.vacina.php");
	
	$vacina = new VacinaController();
	
	if(isset($_GET["id_vacina"]) && ($_GET["id_vacina"] > 0)){
		$vacina->setId_Vacina($_GET["id_vacina"]);
		$vacina->consultarVacina();
	}
	
	$codigo = ($vacina->getId_Vacina()) ? $vacina->getId_Vacina() : $_POST["id_vacina"];
	
	switch ($vacina->get_post_action('novo','acao','deletar')){
		case 'novo';
			echo "<script>window.location = 'vacina.php';</script>";
		break;
		
		case 'acao';
			if($codigo != ""){
				if($vacina->editarDadosVacina()){
					echo "<script>alert('Vacina Alterada!')</script>";
					echo "<script>window.location = 'vacinaLista.php';</script>";				
				} else {
					echo "<scipt>('Erro ao cadastrar')</script>";
				}	
			} else {
				if($vacina->inserirDadosVacina()){
					echo "<script>alert('Vacina Cadastrada!')</script>";
					echo "<script>window.location = 'vacinaLista.php';</script>";
				} else {
					echo "<scipt>('Erro ao cadastrar')</script>";
				}
			}
		break;
			
		case 'deletar';
			if($vacina->deletarDadosVacina()){
				echo "<script>alert('Vacina Deletada!')</script>";
				echo "<script>window.location = 'vacinaLista.php';</script>";				
			} else {
				echo "<scipt>('Erro ao deletar')</script>";
			}
		break;
	}
	
	include_once("header.php");
?>
<div class="titulo">Cadastro de Vacinas</div>

<div class="formulario">
	<form name="form_vacina" id="form_vacina" method="post" action="vacina.php">
		<fieldset>
			<div class="campo">
				<label for="id_vacina">Codigo</label>
				<input type="text" name="id_vacina" id="id_vacina" readonly="readonly" value="<?php echo $vacina->getId_Vacina() ?>"/>
			</div>
		</fieldset>
		
		<fieldset>
			<div class="campo">
				<label for="nome">Nome</label>
				<input type="text" name="nome" id="nome" value="<?php echo $vacina->getNome() ?>"/>
			</div>
			
			<div class="reset"></div>
			
			<div class="campo">
				<label for="validade">Validade</label>
				<input type="text" name="validade" id="validade" value="<?php echo $vacina->getValidade() ?>"/>
			</div>
			
			<div class="reset"></div>
			
			<div class="campo">	
				<label for="doenca">Doenca</label>
				<input type="text" name="doenca" id="doenca" value="<?php echo $vacina->getDoenca() ?>"/>
			</div>
		</fieldset>
		
		<div class="botoes">            
            <div class="botoes">            
            <div id="listar"><a href="vacinaLista.php"><img src="imagens/listar.png"  alt="listar"/></a></div>
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
		

