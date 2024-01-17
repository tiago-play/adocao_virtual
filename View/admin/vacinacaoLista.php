<?php
	include_once("../../Model/class.dao.php");
	include_once("../../Model/class.vacinacao.php");
	include_once("../../Controller/class.vacinacao.php");
	
	$vacinacao = new VacinacaoController();
	
	$paginaatual = (isset($_GET["pagina"])) ? $_GET["pagina"] : 1;
	
	$totalregistrospg = 10; 
	
	$listaVacinacao = $vacinacao->paginacaoDadosVacinacao($paginaatual, $totalregistrospg);
	
	$totalregistros = $vacinacao->totalVacinacao();
	
	$quantidaderegistros = mysql_num_rows($listaVacinacao);	
    	
  	$quantidadepaginas = ceil($totalregistros/$totalregistrospg);
	
	include_once("header.php");
?>

<div class="titulolistavc">Listagem de Vacinações</div>
<div class="botaonovovc"><a href="vacinacao.php"><img src="imagens/novo.png" title="Cadastrar Novo"></a></div>

<div class="clear"></div>	

<div class="boxlista">
	<table class="tabela">
		<tr class="linha">
			<td class="barratitulo">Código da Vacinação   </td>
			<td class="barratitulo">Nome do Animal		  </td>
			<td class="barratitulo">Nome da Vacina		  </td>
			<td class="barratitulo">Nome do Funcionario   </td>
			<td class="barratitulo">Data da Vacinação     </td>
			<td class="barratitulo"></td>
		</tr>
			
		<?php
			if (mysql_num_rows($listaVacinacao) <=0){
		?>
			
			<tr>
				<td colspan="3">Nenhum registro encontrado</td>
			</tr>
			
		<?php
			$cor = 1;
			}else{
				while ($array_cat = mysql_fetch_assoc($listaVacinacao)){
					if (($cor % 2) == 1){
		?>             <tr class="claro"> 
		<?php       }else{ ?>
						<tr class="escuro"> 
		<?php		} ?>
		
			<td><?php echo utf8_encode($array_cat["id_vacina_animal"])?></td>
			<td><?php echo utf8_encode($array_cat["nomeanimal"])      ?></td>
			<td><?php echo utf8_encode($array_cat["nomevacina"])      ?></td>
			<td><?php echo utf8_encode($array_cat["nomefuncionario"]) ?></td>
			<td><?php echo $vacinacao->mostraData($array_cat["dt_vacinacao"]) ?></td>
			
			<td><a href="vacinacao.php?id_vacina_animal=<?php echo $array_cat["id_vacina_animal"] ?>">
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
		
		
		
		