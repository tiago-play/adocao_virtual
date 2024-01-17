<?php
	include_once ("../../Model/class.dao.php");
	include_once ("../../Model/class.evento.php");
	include_once ("../../Controller/class.evento.php");
	
	$evento = new EventoController();
	
	$paginaatual = (isset($_GET["pagina"])) ? $_GET["pagina"] : 1;
	
	$totalregistrospg = 5; 
	
	$listaEvento = $evento->paginacaoEvento($paginaatual, $totalregistrospg);
	
	$totalregistros = $evento->totalEvento();
	
	$quantidaderegistros = mysql_num_rows($listaEvento);	
    	
  	$quantidadepaginas = ceil($totalregistros/$totalregistrospg);
	
	include_once("header.php");
?>

<div class="ossoevento"><img src="imagens/osso.png"></div> <div class="tituloevento">Eventos</div>

<div class="clear"></div>	

<div class="boxlista">
	<table class="tabela">
		
		<?php
			if(mysql_num_rows($listaEvento) <=0 ){
		?>
		
		<tr>
			<td colspan="3">Nenhum registro encontrado</td>
		</tr>
		
		<?php
			}else{
				while($array_cat = mysql_fetch_assoc($listaEvento)){

		?>
		<tr>
			<td><?php echo $evento->mostraData($array_cat["data_horario"])?></td>
			
		</tr>
		
		<tr>
			<td><?php echo utf8_encode($array_cat["descricao"])?></td>
		</tr>
		
		<tr>
			<td>Local: <?php echo utf8_encode($array_cat["local"])?></td>
		</tr>
		
		<tr>
			<td><div class="espaco"></div></td>
		</tr>
		
		<?php
			}
		}
		?>
		
			<tr>
				<td>
					<div class="boxpg">
						<?php
							for($i_pg=1;$i_pg<=$quantidadepaginas;$i_pg++) { 
							    // Verifica se a página que o navegante esta e retira o link do número para identificar visualmente
							    if ($paginaatual == $i_pg) { 
							   		echo "<span class=pgoff>[$i_pg]</span>";
									} else {
							 	  		echo '<a href="'.$PHP_SELF.'?pagina='.$i_pg.'" class="pg"<b>'." ".''.$i_pg.'</b></a>';
							    	}
							}
						?>
					</div>
				</td>
			</tr>
		</table>
</div>
<br>
<br>

<script type="text/javascript">
jQuery(document).ready(function(){

	jQuery('html, body').delay(1000).animate({
		scrollTop : jQuery(".tituloevento").offset().top
	}, 2000);

});
</script>

<?php include_once("footer.php");?>
	
	
	