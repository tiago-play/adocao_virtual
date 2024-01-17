<?php
	include_once("../../Model/class.dao.php");
	include_once("../../Model/class.pedido.php");
	include_once("../../Controller/class.pedido.php");
	
	$pedido = new PedidoController();
	
	$paginaatual = (isset($_GET["pagina"])) ? $_GET["pagina"] : 1;
	
	$totalregistrospg = 10; 
	
	$listaPedido = $pedido->paginacaoDadosPedido($paginaatual, $totalregistrospg);
	
	$totalregistros = $pedido->totalPedido();
	
	$quantidaderegistros = mysql_num_rows($listaPedido);	
    	
  	$quantidadepaginas = ceil($totalregistros/$totalregistrospg);

	include_once("header.php");	
?>

<div class="titulolistap">Listagem de Pedidos</div>

<div class="clear"></div>

<div class="boxlista">
	<table class="tabela">
		<tr class="linha">
			<td class="barratitulo">Pedido    </td>
			<td class="barratitulo">Animal    </td>
			<td class="barratitulo">Cliente   </td>
			<td class="barratitulo">Data      </td>
		</tr>
		
		<?php
			$cor = 1;
			if (mysql_num_rows($listaPedido) <=0){
		?>
		
		<tr>
			<td colspan="3">Nenhum registro encontrado</td>
		</tr>
			
		<?php
		
			} else {
				while ($array_cat = mysql_fetch_assoc($listaPedido)){
					if (($cor % 2) == 1){
		?>             <tr class="claro"> 
		<?php       }else{ ?>
						<tr class="escuro"> 
		<?php		} ?>	
		
			<td width="90px"  class="barraconteudo"><?php echo utf8_encode($array_cat["id_pedido"]) ?></td>
			<td width="150px" class="barraconteudo"><?php echo utf8_encode($array_cat["nomeanimal"]); ?></td>
			<td width="150px" class="barraconteudo"><?php echo utf8_encode($array_cat["nomecliente"]); ?></td>
			<td width="150px" class="barraconteudo"><?php echo $pedido -> mostraData($array_cat["dt_adocao"]); ?></td>
		</tr>
		
		<?php
			$cor++;
			}
		}
		?>
	</table>
</div>

<div class="boxpg">
	<?php
		if ( $paginaatual > 1) { 
			echo "<a href=".$PHP_SELF."?pagina=".($paginaatual-1) ."class=pg><b>&laquo; anterior</b></a>";
		} else { 
	    	echo "&laquo; anterior";
	    }
	        
	    // Faz aparecer os números das página entre o ANTERIOR e PROXIMO
		for($i_pg=1;$i_pg<=$quantidadepaginas;$i_pg++) { 
	    	// Verifica se a página que o navegante esta e retira o link do número para identificar visualmente
	        if ($paginaatual == $i_pg) { 
	           	echo "&nbsp;<span class=pgoff>[$i_pg]</span>&nbsp;";
			} else {
	           	echo '&nbsp;<a href="'.$PHP_SELF.'?pagina='.$i_pg.'" class="pg"><b>'.$i_pg.'</b></a>&nbsp;';
	    	}
		}
	        
	    // Verifica se esta na ultima página, se nao estiver ele libera o link para próxima
		if ($paginaatual <  $quantidadepaginas) { 
			echo "<a href=".$PHP_SELF."?pagina=".($paginaatual+1)." class=pg><b>próximo &raquo;</b></a>";
		} else { 
	    	echo "próximo &raquo";
		}
	?>
</div>

<?php include_once("footer.php");?>