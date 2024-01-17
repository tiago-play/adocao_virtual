<?php
	include_once("../../Model/class.dao.php");
	include_once("../../Model/class.vacina.php");
	include_once("../../Controller/class.vacina.php");
	
	$vacina = new VacinaController();
	
	$paginaatual = (isset($_GET["pagina"])) ? $_GET["pagina"] : 1;
	
	$totalregistrospg = 10; 
	
	$listaVacina = $vacina->paginacaoDadosVacina($paginaatual, $totalregistrospg);
	
	$totalregistros = $vacina->totalVacina();
	
	$quantidaderegistros = mysql_num_rows($listaVacina);	
    	
  	$quantidadepaginas = ceil($totalregistros/$totalregistrospg);
	
	include_once("header.php");
?>

<div class="titulolistav">Listagem de Vacinas</div>
<div class="botaonovov"><a href="vacina.php"><img src="imagens/novo.png" title="Cadastrar Novo"></a></div>
	
<div class="clear"></div>

<div class="boxlista">
	<table class="tabela">
		<tr class="linha">
			<td class="barratitulo">Vacina   </td>
			<td class="barratitulo">Nome     </td>
			<td class="barratitulo">Validade </td>
			<td class="barratitulo">Doenca   </td>
			<td class="barratitulo">         </td>
		</tr>
		
		<?php
			$cor = 1;
			if (mysql_num_rows($listaVacina) <=0){
		?>
			
			<tr>
				<td colspan="3">Nenhum registro encontrado</td>
			</tr>
				
		<?php
			} else {
				while ($array_cat = mysql_fetch_assoc($listaVacina)){
					if (($cor % 2) == 1){
		?>             <tr class="claro"> 
		<?php       }else{ ?>
						<tr class="escuro"> 
		<?php		} ?>	
		
			<td width="90px"><?php echo utf8_encode($array_cat["id_vacina"]) ?></td>
			<td width="90px"><?php echo utf8_encode($array_cat["nome"]); ?></td>
			<td width="90px"><?php echo $vacina->mostraData($array_cat["validade"]) ?></td>
			<td width="90px"><?php echo utf8_encode(($array_cat["doenca"])) ?></td>
				
			<td><a href="vacina.php?id_vacina=<?php echo $array_cat["id_vacina"] ?>">
			  	<img src="imagens/listar.png" alt="listar"/>
				</a>
			</td>
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

<?php include_once("footer.php"); ?>
		
		