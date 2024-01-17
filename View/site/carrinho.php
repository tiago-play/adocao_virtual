<?php
	include_once("header.php");

	include_once ("../../Model/class.dao.php");
	include_once ("../../Model/class.animal.php");
	include_once ("../../Controller/class.animal.php");
	
	$animal = new AnimalController();
	
	if(isset($_GET['id_animal']) && ($_GET["id_animal"]>0)){
		$animal->setId_Animal($_GET["id_animal"]);
		$listaAnimal = $animal ->listarAnimal($_GET["id_animal"]);
	}
?>

<div class="ossocarrinho"><img src="imagens/osso.png"></div> <div class="titulocarrinho">Dados do Animal Selecionado</div>
<div class="clear"></div>	

<div class="boxdetalhe">
	<table class="tabeladetalhe">
		<tr>
			<td class="barratituloc">Nome		     </td>
			<td class="barratituloc">Data Nascimento </td>
			<td class="barratituloc">Cor             </td>
			<td class="barratituloc">Ra&ccedila		 </td>
			<td class="barratituloc">Sexo		     </td>
			<td class="barratituloc">Tipo		     </td>
			<td class="barratituloc">Proced&ecircncia     </td>
			<td class="barratituloc">Porte		     </td>
			<td class="barratituloc"></td>
		</tr>
		
		<?php
			while ($array_cat = mysql_fetch_assoc($listaAnimal)){
					
		?>              
		<tr>
			<td><?php echo utf8_encode($array_cat["nome"]);?>			       </td>
			<td><?php echo $animal->mostraData($array_cat["dt_nascimento"]);?> </td>
			<td><?php echo utf8_encode($array_cat["cor"]);?>                   </td>
			<td><?php echo utf8_encode($array_cat["raca"]);?>		           </td>
			<td><?php echo utf8_encode(($array_cat["sexo"] == "M") ? "Masculino" : "Feminino" );?></td>
			<td><?php echo utf8_encode($array_cat["tipo"]);?></td>
			<td><?php echo utf8_encode($array_cat["procedencia"]);?></td>
			<td><?php if ($array_cat["porte"] == "P"){
					  	 echo "Pequeno";
					  }else if ($array_cat["porte"] == "M"){ 
						 echo "M&eacutedio";
					  }else{
					     echo "Grande";
					  }
			    ?> 
			</td>
		</tr>
		<table>
			<tr>
				<td><a href="termo.php?id_animal=<?php echo $animal->getId_Animal() ?>">
				    <div id="confirmar">Confirmar Ado&ccedil&atildeo</div>
					</a>
				</td>

				<td><a href="listaanimal.php">
				    <div id="cancelar">Cancelar Ado&ccedil&atildeo</div>
					</a>
				</td>
			</tr>
			
		</table>
		<br>
		<?php
		}
		?>
	</table>	
</div>

<br>
<br>

<script type="text/javascript">
jQuery(document).ready(function(){

	jQuery('html, body').delay(1000).animate({
		scrollTop : jQuery(".titulocarrinho").offset().top
	}, 2000);

});
</script>

<?php include_once("footer.php"); ?>


