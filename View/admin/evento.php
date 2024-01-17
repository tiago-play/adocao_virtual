<?php
	session_start();
	session_cache_expire(10);

	include_once ("../../Model/class.dao.php");
	include_once ("../../Model/class.evento.php");
	include_once ("../../Controller/class.evento.php");
	
	$evento = new EventoController();
	
	$listaDescricaoCategoria = $evento->listaDescricaoCategoria();
	
	if(isset($_GET["id_evento"]) && ($_GET["id_evento"] > 0)){
		$evento->setId_Evento($_GET["id_evento"]);
		$evento->consultarEvento();
	}
	
	$codigo = ($evento->getId_Evento()) ? $evento->getId_Evento() : $_POST["id_evento"];
	
	switch ($evento->get_post_action('novo','acao','deletar')){
		case 'novo';
			echo "<script>window.location = 'evento.php';</script>";
		break;
			
		case 'acao';
			if($codigo != ""){
				if($evento->editarDadosEvento()){
					echo "<script>alert('Evento Alterado!')</script>";
					echo "<script>window.location = 'eventoLista.php';</script>";				
				} else {
					echo "<scipt>('Erro ao cadastrar')</script>";
				}	
			} else {	
				if($evento->inserirDadosEvento()){
					echo "<script>alert('Evento Cadastrado!')</script>";
					echo "<script>window.location = 'eventoLista.php';</script>";
				} else {
					echo "<scipt>('Erro ao cadastrar')</script>";
				}
			}
		break;
		
		case 'deletar';
			if($evento->deletarDadosEvento()){
				echo "<script>alert('Evento Deletado!')</script>";
				echo "<script>window.location = 'eventoLista.php';</script>";				
			} else {
				echo "<scipt>('Erro ao deletar')</script>";
			}
		break;
	}
	
	include_once("header.php");
?>

<div class="titulo">Cadastro de Eventos</div>

<div class="formulario">
	<form name="form_evento" id="form_evento" method="post" action="evento.php">
		<input type="hidden" name="id_funcionario" id="id_funcionario" value="<?php echo $_SESSION["funcionario_id"]?>" >
		
		<fieldset>
			<div class="campo">
				<label for="id_evento">Codigo</label>
				<input type="text" name="id_evento" id="id_evento" readonly="readonly" value="<?php echo $evento->getId_Evento() ?>"/>
			</div>
		</fieldset>
		
		<fieldset>
			<div class="campo">
				<label for="local">Local</label>
				<input type="text" name="local" id="local" value="<?php echo $evento->getLocal() ?>"/>
			</div>
			
			<div class="reset"></div>
			
			<div class="campo">
				<label for="data_horario">Data/Horario</label>
				<input type="text" name="data_horario" id="data_horario" value="<?php echo $evento->getData_Horario() ?>"/>
			</div>
			
			<div class="reset"></div>
			
			<div class="campo">
				<label for="descricao">Descricao</label>
				<input type="text" name="descricao" id="descricaoevento" value="<?php echo $evento->getDescricao() ?>"/></textarea>
			</div>
			
			<div class="reset"></div>
			
			<div class="campo">
				<label for="id_categoria">Selecione a Categoria</label>
				<select name="id_categoria" id="id_selecaocategoria">
					<option>Selecione...</option>
						<?php while ($array_descricaoCategoria = mysql_fetch_array($listaDescricaoCategoria)) { ?>
							<option value="<?php echo $array_descricaoCategoria["id_categoria"] ?>" <?php if ($array_descricaoCategoria["id_categoria"] == $evento->getId_Categoria()){ ?> selected="selected" <?php } ?> > <?php echo $array_descricaoCategoria["descricao"] ?></option>
						<?php } ?>	
				</select>		
			</div>
		</fieldset>
		
		<div class="botoes">            
            <div class="botoes">            
            <div id="listar"><a href="eventoLista.php"><img src="imagens/listar.png"  alt="listar"/></a></div>
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