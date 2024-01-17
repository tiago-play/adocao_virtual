<?php
	session_start();
	session_cache_expire(10);

	include_once("header.php");

	include_once ("../../Model/class.dao.php");
	include_once ("../../Model/class.animal.php");
	include_once ("../../Controller/class.animal.php");
	
	$animal = new AnimalController();
	
	if(isset($_GET["id_animal"]) && ($_GET["id_animal"] >0 )){
		$animal->setId_Animal($_GET["id_animal"]);
		$animal->consultarAnimal();
		
		$_SESSION[animal_id]=$animal->getId_Animal();
	}
	
?>

<div class="ossodetalheanimal"><img src="imagens/osso.png"></div> <div class="titulodetalheanimal">Detalhes</div>
<div class="clear"></div>	

<div class="boxdetalhe">
	<table class="tabeladetalhe">
	
		<tr>
			<td><img src="../admin/animalgrande/<?php echo $animal->getNome_imagem()?>"/></td>
		</tr>
	</table>
	
	<table class="tabeladetalhe">
		<tr>
			<td>Nome		    </td>
			<td>Data Nascimento </td>
			<td>Cor             </td>
			<td>Ra&ccedila		    </td>
			<td>Sexo		    </td>
			<td>Tipo		    </td>
		</tr>	
		
		<tr>
			<td><?php echo $animal->getNome(); ?>            </td>
			<td><?php echo $animal->getDt_Nascimento();?>	 </td>
			<td><?php echo $animal->getCor();?>              </td>
			<td><?php echo $animal->getRaca();?>		     </td>
			<td><?php echo $animal->getSexo() == "M" ? "Macho" : "F&ecircmea";?>      		 </td>
			<td><?php echo $animal->getTipo();?>      		 </td>
	
		
			<td>
				<div id="dadotar">
				<?php if(!isset($_SESSION["acesso"]) || $_SESSION["acesso"] != "Liberado"){ ?>
					<a href="identificacao.php">Adotar </a>
				<?php }else{ ?>
					<a href="carrinho.php?id_animal=<?php echo $animal->getId_Animal() ?>">Adotar </a>
				<?php } ?>
				</div>
			</td>
			
			<td><a href="listaanimal.php">
			    <div id="dvoltar">Voltar</div>
				</a>
			</td>
			
		</tr>
	</table>	
</div>	
<br>
<br>

<script type="text/javascript">
jQuery(document).ready(function(){

	jQuery('html, body').delay(1000).animate({
		scrollTop : jQuery(".titulodetalheanimal").offset().top
	}, 2000);

});
</script>

<?php include_once("footer.php"); ?>