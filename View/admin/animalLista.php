<?php
	include_once("../../Model/class.dao.php");
	include_once("../../Model/class.animal.php");
	include_once("../../Controller/class.animal.php");
	
	$animal = new AnimalController();
	
	$paginaatual = (isset($_GET["pagina"])) ? $_GET["pagina"] : 1;
	
	$totalregistrospg = 10; 
	
	$listaAnimal = $animal->paginacaoAnimal($paginaatual, $totalregistrospg);
	
	$totalregistros = $animal->totalAnimal();
	
	$quantidaderegistros = mysql_num_rows($listaAnimal);	
    	
  	$quantidadepaginas = ceil($totalregistros/$totalregistrospg);
	
	include_once("header.php");
?>	

<div class="titulolistaa">Listagem de Animais</div>
<div class="botaonovoa"><a href="animal.php"><img src="imagens/novo.png" title="Cadastrar Novo"></a></div>
	
<div class="clear"></div>

<div class="boxlista">
	<table class="tabela">
		<tr class="linha">
			<td class="barratitulo">Código	        </td>
			<td class="barratitulo">Funcionário     </td>
			<td class="barratitulo">Animal		    </td>
			<td class="barratitulo">Data Nascimento </td>
			<td class="barratitulo">Cor             </td>
			<td class="barratitulo">Raça		    </td>
			<td class="barratitulo">Sexo		    </td>
			<td class="barratitulo">Tipo		    </td>
			<td class="barratitulo">Estado		    </td>
			<td class="barratitulo"></td>
		</tr>
		
		<?php
			$cor = 1;
			if (mysql_num_rows($listaAnimal) <=0){
		?>
		
		<tr>
			<td colspan="3">Nenhum Registro Encontrado</td>
		</tr>
		
		<?php
			}else{
				while ($array_cat = mysql_fetch_assoc($listaAnimal)){
					if (($cor % 2) == 1){
		?>             <tr class="claro"> 
		<?php       }else{ ?>
						<tr class="escuro"> 
		<?php		} ?>	
			
			<td><?php echo utf8_encode($array_cat["id_animal"]); ?>            </td>
			<td><?php echo utf8_encode($array_cat["nomefuncionario"]);?>       </td>
			<td><?php echo utf8_encode($array_cat["nome"]);?>			       </td>
			<td><?php echo $animal->mostraData($array_cat["dt_nascimento"]);?> </td>
			<td><?php echo utf8_encode($array_cat["cor"]);?>                   </td>
			<td><?php echo utf8_encode($array_cat["raca"]);?>		           </td>
			<td><?php echo utf8_encode(($array_cat["sexo"] == "M") ? "Masculino" : "Feminino" );?></td>
			<td><?php echo utf8_encode($array_cat["tipo"]);?></td>
			<td><?php echo utf8_encode($array_cat["estado"]);?></td>
			
			<td><a href="animal.php?id_animal=<?php echo $array_cat["id_animal"] ?>">
			    	<img src="imagens/listar.png" title="Visualizar Dados"/>
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