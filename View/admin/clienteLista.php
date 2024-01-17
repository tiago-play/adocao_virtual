<?php
	include_once("../../Model/class.dao.php");
	include_once("../../Model/class.pessoa.php");
	include_once("../../Model/class.cliente.php");
	include_once("../../Controller/class.cliente.php");
	
	$cliente = new ClienteController();
	
	$paginaatual = (isset($_GET["pagina"])) ? $_GET["pagina"] : 1;
	
	$totalregistrospg = 10; 
	
	$listaCliente = $cliente->paginacaoDadosCliente($paginaatual, $totalregistrospg);
	
	$totalregistros = $cliente->totalCliente();
	
	$quantidaderegistros = mysql_num_rows($listaCliente);	
    	
  	$quantidadepaginas = ceil($totalregistros/$totalregistrospg);
	
	include_once("header.php");
?>

<div class="titulolistac">Listagem de Clientes</div>

<div class="boxlista">
	<table class="tabela">
		<tr class="linha">
			<td class="barratitulo">Código</td>
			<td class="barratitulo">Nome</td>
			<td class="barratitulo">Sexo</td>
			<td class="barratitulo">Email</td>
			<td class="barratitulo">Telefone</td>
			<td class="barratitulo">Celular</td>
			<td class="barratitulo"></td>
			<td class="barratitulo"></td>
		</tr>
		
		<?php
			$cor = 1;
			if (mysql_num_rows($listaCliente) <=0){
		?>
		<tr>
			<td colspan="3">Nenhum Registro Encontrado</td>
		</tr>
			
		<?php
			}else{
				while ($array_cat = mysql_fetch_assoc($listaCliente)){
					if (($cor % 2) == 1){
		?>          	<tr class="claro"> 
		<?php       }else{ ?>
						<tr class="escuro"> 
		<?php	    } ?>	
		
			<td><?php echo $array_cat["id_cliente"] ?> </td>
			<td><?php echo utf8_encode($array_cat["nome"]);?></td>
			<td><?php echo utf8_encode(($array_cat["sexo"] == "M") ? "Masculino" : "Feminino" );?> </td>
			<td><?php echo utf8_encode($array_cat["email"]);?></td>
			<td><?php echo utf8_encode($array_cat["telefone"]);?></td>
			<td><?php echo utf8_encode($array_cat["celular"]);?></td>
			<td><?php echo utf8_encode(($array_cat["status"] == "A") ? "Ativo" : "Inativo" );?></td>
			
			<td><a href="cliente.php?id_cliente=<?php echo $array_cat["id_cliente"] ?>">
			  	  <img src="imagens/listar.png" alt="Visualizar Dados" title="Visualizar Dados"/>
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

<?php include_once("footer.php");?>