<?php

	include("header.php");
	
	$hoje = getdate();
	$dia = $hoje["mday"];
	$mes = $hoje["mon"];
	$ano = $hoje["year"];
	$data = $ano."-".$mes."-".$dia;
	
	include_once ("../../Model/class.dao.php");
	include_once ("../../Model/class.animal.php");
	include_once ("../../Controller/class.animal.php");
	include_once ("../../Model/class.pedidoIten.php");
	include_once ("../../Controller/class.pedidoIten.php");
	include_once ("../../Model/class.pedido.php");
	include_once ("../../Controller/class.pedido.php");
	
	
	$animal = new AnimalController();
	$pedido = new PedidoController();
	$pedidoIten = new PedidoItenController();
	
	if(isset($_GET['id_animal']) && ($_GET["id_animal"]>0)){
		$animal -> setId_Animal($_GET["id_animal"]);
	}
	
	if ($_POST["acao"] != "") {
		if ($_POST["acao"] == "adotar") {
			if($pedido->inserirDadosPedido()){
				echo "<script>alert('Pedido Gravado com Sucesso!')</script>";
				echo "<script>window.location = 'index.php';</script>";
			} else {
				echo "<scipt>('Erro ao cadastrar')</script>";
			}
		}
	}
	
	
	/*if($pedidoIten->inserirPedidoIten()){
	} else {
		echo "<scipt>('Erro ao cadastrar')</script>";
	}*/
	
	


?>

<div class="ossotermo"><img src="imagens/osso.png"></div> <div class="titulotermo">Termo de Responsabilidade</div>

<div class="reset"></div>  

<div class="termo">
		
<pre>
	Por livre e espont&acircnea vontade do Adotante, sem coa&ccedil&atildeo ou influ&ecircncia de quem quer que seja, realiza
e aceita este contrato, inter vivos, com o segundo dos acima qualificados, de hora em diante denominado
PROTETOR(A) DOADOR (A), gratuitamente, mas com condi&ccedil&atildees e encargos denominados a seguir: 
<b>o ADOTANTE declara que, ao aceitar este contrato, ap&oacutes sua leitura completa, est&aacute ciente,
&eacute maior de 18 anos e fica de acordo com as cl&aacuteusulas hora presentes, sendo respons&aacutevel
por seu cumprimento, assumindo a responsabilidade plena sobre a vida, sa&uacutede e educa&ccedil&atildeo 
do animal. </b>
<b>
     Em caso de neglign&ecirccia ou imprud&ecircncia com o animal adotado, que venha acarretar 
necessidade de qualquer tratamento para doen&ccedilas, bem como medidas de busca e procura do 
animal, em caso de fuga, o protetor doador estar&aacute autorizado a tomar as medidas cab&iacuteveis,
como recolher o animal, lev&aacute-lo para tratamento veterin&aacuterio, distribuir panfletos e fazer
divulga&ccedil&atildeo por meio midi&aacutetico dentre outras quest$otildees necess&aacuterias, a fim de ach&aacute-lo
ou trat&aacute-lo, sendo todos os custos de responsabilidade plena e total do adotante negligente 
ou imprudente.
</b>	
	Ao adotar este animal, declaro-me apto para assumir a guarda e a responsabilidade sobre ele, eximindo o
doador por atos que ele venha a praticar a partir desta data.

	Declaro ainda estar ciente de todos os cuidados que este animal exige no que se refere &agrave sua guarda e
manuten&ccedil&atildeo, al&eacutem de conhecer todos os riscos inerentes &agrave esp&eacutecie e ra&ccedila no conv&iacutevio com humanos, estando
apto a guard&aacute-lo e vigi&aacute-lo, comprometendo-me a proporcionar boas condi&ccedil&otildees de alojamento e alimenta&ccedil&atildeo,
assim como, espa&ccedilo f&iacutesico que possibilite o animal se exercitar. Responsabilizo-me por preservar a sa&uacutede
e integridade do animal e a submet&ecirc-lo aos cuidados m&ecircdico-veterin&aacuterio sempre que necess&aacuterio. Estou ciente 
de que n&atildeo posso transmitir a posse deste animal a outrem, nem vend&ecirc-lo, muito menos abandon&aacute-lo.

	Comprometo-me, ainda, a permitir o acesso do doador ao local onde se encontra o animal para 
averigua&ccedil&atildeo de suas condi&ccedil&otildees. Tenho conhecimento de que caso seja constatado por parte do doador situa&ccedil&atildeo 
inadequada para o bem estar do animal, perderei a sua guarda, sem preju&iacutezo das penalidades legais.

Tenho ci&ecircncia de que estou obrigado a entregar o animalzinho, quando ele atingir 6 meses de idade, para ser 
Castrado, contribuindo assim para diminuir a popula&ccedil&atildeo de animais abandonados em nossa cidade.
	Comprometo-me a cumprir toda a legisla&ccedil&atildeo vigente, municipal, estadual e federal, relativa &agrave posse 
de animais.

Declaro-me assim, ciente das normas acima, as quais concordo, aceitando o presente Termo de Responsabilidade,
assumindo plenamente os deveres que dele constam, bem como outros relacionados &agrave posse respons&aacutevel e que 
n$atildeo estejam inclu&iacutedos neste Termo.

Abandonar ou maltratar animais &eacute crime! 
Pena: 3 meses a 1 ano de deten&ccedil&atildeo e multa (Lei 9605/98)
</pre>

<br>

<form name="form_termo" id="form_termo" method="post" action="termo.php">
	<input type="hidden" name="acao" id="acao" value="adotar">
	<input type="hidden" name="id_cliente" id="id_cliente" value="<?php echo $_SESSION["cliente_id"]?>">
	<input type="hidden" name="dt_adocao" id="dt_adocao" value="<?php echo $data?>">
	<input type="hidden" name="id_animal" id="id_animal" value="<?php echo $animal->getId_Animal()?>">
	<input type="hidden" name="termo_adocao" id="termo_adocao" value="S" >
	<input type="submit" name="enviar" id="enviar" value="Aceitar o Termo de Adocao">
</form>


<br>

</div>

<br>
<br>

<script type="text/javascript">
jQuery(document).ready(function(){

	jQuery('html, body').delay(1000).animate({
		scrollTop : jQuery(".titulotermo").offset().top
	}, 2000);

});
</script>

<?php include_once ("footer.php"); ?>
