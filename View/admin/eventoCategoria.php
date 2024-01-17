	<?php
	session_start();
	session_cache_expire(10);
	
	include_once ("../../Model/class.dao.php");
	include_once ("../../Model/class.eventoCategoria.php");
	include_once ("../../Controller/class.eventoCategoria.php");
	

	$eventoCategoria = new EventoCategoriaController();
	
	if (isset($_GET["id_categoria"]) && ($_GET["id_categoria"] > 0)) {
		$eventoCategoria->setId_Categoria($_GET["id_categoria"]);
		$eventoCategoria->consultarEventoCategoria();
	}
	
	$codigo = ($eventoCategoria->getId_Categoria()) ? $eventoCategoria->getId_Categoria() : $_POST["id_categoria"];
	
	
	switch ($eventoCategoria->get_post_action('novo','acao','deletar')){
		case 'novo';
			echo "<script>window.location = 'eventoCategoria.php';</script>";
		break;
		
		case 'acao';
			if($codigo != ""){
				if($eventoCategoria->editarDadosEventoCategoria()){
					echo "<script>alert('Categoria Alterada!')</script>";
					echo "<script>window.location = 'eventoCategoriaLista.php';</script>";				
				} else {
					echo "<scipt>('Erro ao cadastrar')</script>";
				}
			} else {			
				if($eventoCategoria->inserirDadosEventoCategoria()){
					echo "<script>alert('Categoria Cadastrada!')</script>";
					echo "<script>window.location = 'eventoCategoriaLista.php';</script>";
				} else {
					echo "<scipt>('Erro ao cadastrar')</script>";
				}
			}
		break;
			
		case 'deletar';
			if($eventoCategoria->deletarDadosEventoCategoria()){
				echo "<script>alert('Categoria Deletada!')</script>";
				echo "<script>window.location = 'eventoCategoriaLista.php';</script>";				
			} else {
				echo "<scipt>('Erro ao deletar')</script>";
			}
		break;
	}
	
	include_once("header.php");
?>

<div class="titulo">Cadastro de Categorias de Eventos</div>

<div class="formulario">
	<form name="form_eventoCategoria" id="form_eventoCategoria" method="post" action="eventoCategoria.php">
		<fieldset>
			<div class="campo">
				<label for="id_categoria">Código</label>
				<input type="text" name="id_categoria" id="id_categoria"  readonly="readonly" value="<?php echo $eventoCategoria->getId_Categoria() ?>"/>
			</div>
		</fieldset>
		
		<fieldset>
			<div class="campo">
				<label for="descricao">Descrição</label>
				<input type="text" name="descricao" id="descricaocategoria" value="<?php echo $eventoCategoria->getDescricao() ?>"/>
			</div>
		</fieldset>
		
		<div class="botoes">            
            <div class="botoes">            
            <div id="listar"><a href="eventoCategoriaLista.php"><img src="imagens/listar.png"  alt="listar"/></a></div>
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