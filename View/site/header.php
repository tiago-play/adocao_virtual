<?php
	session_start();
	session_cache_expire(10);
	
	error_reporting(E_ALL ^ E_NOTICE);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/xhtml; charset=utf-8" />
<title>Adoção Virtual</title>

<link rel="stylesheet" type="text/css" href="css/estilo.css" />
<link rel="stylesheet" type="text/css" href="css/pagina.css" />
<link rel="stylesheet" type="text/css" href="css/login.css" />

<script language="javascript" type="text/javascript" src="js/jquery.js"></script>
<script language="javascript" type="text/javascript" src="js/mascara.js"></script>
<script language="javascript" type="text/javascript" src="js/cidades-estados.js"></script>
<script language="javascript" type="text/javascript" src="js/cidades-estados-auxiliar.js"></script>
<script language="javascript" type="text/javascript" src="js/jquery-validate.js"></script>
<script language="javascript" type="text/javascript" src="js/validador.js"></script>
<script language="javascript" type="text/javascript" src="js/pstrength.js"></script>
<script language="javascript" type="text/javascript" src="js/alphanumeric.js"></script>
<script type="text/javascript" src="js/funcoes.js"></script>

</head>

<body>
	<div id="header">
    	<div id="box_header">    
            <div class="logotipo">
                <a href="index.php"><img src="imagens/logotipo.png" width="185" height="146" /></a>
            </div>
    		<div class="slogan">
            	"A grandeza de uma nação pode ser julgada pelo<br />modo que seus animais são tratados."<br />(Mahatma Gandhi)
            </div>      
            <div class="buscar">
            	<p class="frase_1"><strong>Todos estão esperando por um lar.</strong></p>
                <p class="frase_2"><strong>Pra qual você vai dar uma chance hoje?</strong></p>
                <?php
                	$busca = (isset($_GET["busca"])) ? $_GET["busca"] : "";
                ?>
            	<ul class="selecionar_tipo_animal">
                	<li><a href="listaanimal.php?busca=cachorro" title="Selecionar Cães" class="<?php if ($busca == "cachorro" || $busca == "") {?>cachorro_ativo<?php } else { ?>cachorro_inativo<?php } ?>"></a></li>
                    <li><a href="listaanimal.php?busca=gato" title="Selecionar Gatos" class="<?php if ($busca == "gato") {?>gato_ativo<?php } else { ?>gato_inativo<?php } ?>"></a></li>
                    <li><a href="listaanimal.php?busca=outros" title="Selecionar Outros" class="<?php if ($busca != "" && $busca != "cachorro" && $busca != "gato") {?>outros_ativo<?php } else { ?>outros_inativo<?php } ?>"></a></li>
                </ul>
                <div class="clear"></div>
                <div class="formulario_busca">
                	<?php
                		$estado = (isset($_GET["estado"])) ? $_GET["estado"] : "";
                	?>
                	<form name="form_pesquisa" id="form_pesquisa" method="get" action="listaanimal.php">
                		<input type="hidden" name="tipo" id="tipo" value="pesquisa" />
	                    <input type="hidden" name="busca" id="busca" value="<?php echo ((isset($_GET["busca"])) ? $_GET["busca"] : "") ?>" />
	                    <select name="estado_animal" id="estado_animal" class="select_busca">
	                    	<option value="" <?php if ($estado == "") { ?>selected="selected"<?php } ?>>Selecione sua Busca</option>
	                    	<option value="AC" <?php if ($estado == "AC") { ?>selected="selected"<?php } ?>>Acre </option>
	                    	<option value="AL" <?php if ($estado == "AL") { ?>selected="selected"<?php } ?>>Alagoas </option>
	                    	<option value="AP" <?php if ($estado == "AP") { ?>selected="selected"<?php } ?>>Amapa </option>
	                    	<option value="AM" <?php if ($estado == "AM") { ?>selected="selected"<?php } ?>>Amazonas </option>
	                    	<option value="BA" <?php if ($estado == "BA") { ?>selected="selected"<?php } ?>>Bahia  </option>
	                    	<option value="CE" <?php if ($estado == "CE") { ?>selected="selected"<?php } ?>>Cear&aacute; </option>
	                    	<option value="DF" <?php if ($estado == "DF") { ?>selected="selected"<?php } ?>>Distrito Federal </option>
	                    	<option value="ES" <?php if ($estado == "ES") { ?>selected="selected"<?php } ?>>Espírito Santo </option>
	                    	<option value="GO" <?php if ($estado == "GO") { ?>selected="selected"<?php } ?>>Goi&aacute;s </option>
	                    	<option value="MA" <?php if ($estado == "MA") { ?>selected="selected"<?php } ?>>Maranhão</option>
	                    	<option value="MT" <?php if ($estado == "MT") { ?>selected="selected"<?php } ?>>Mato Grosso </option>
	                    	<option value="MS" <?php if ($estado == "MS") { ?>selected="selected"<?php } ?>>Mato Grosso do Sul </option>
	                    	<option value="MG" <?php if ($estado == "MG") { ?>selected="selected"<?php } ?>>Minas Gerais </option>
	                    	<option value="PA" <?php if ($estado == "PA") { ?>selected="selected"<?php } ?>>Par&aacute; </option>
	                    	<option value="PB" <?php if ($estado == "PB") { ?>selected="selected"<?php } ?>>Paraíba </option>
	                    	<option value="PR" <?php if ($estado == "PR") { ?>selected="selected"<?php } ?>>Paran&aacute; </option>
	                    	<option value="PE" <?php if ($estado == "PE") { ?>selected="selected"<?php } ?>>Pernambuco </option>
	                    	<option value="PI" <?php if ($estado == "PI") { ?>selected="selected"<?php } ?>>Piauí </option>
	                    	<option value="RJ" <?php if ($estado == "RJ") { ?>selected="selected"<?php } ?>>Rio de Janeiro </option>
	                    	<option value="RN" <?php if ($estado == "RN") { ?>selected="selected"<?php } ?>>Rio Grande do Norte </option>
	                    	<option value="RS" <?php if ($estado == "RS") { ?>selected="selected"<?php } ?>>Rio Grande do Sul </option>
	                    	<option value="RO" <?php if ($estado == "RO") { ?>selected="selected"<?php } ?>>Rond&ocirc;nia </option>
	                    	<option value="RR" <?php if ($estado == "RR") { ?>selected="selected"<?php } ?>>Roraima </option>
	                    	<option value="SC" <?php if ($estado == "SC") { ?>selected="selected"<?php } ?>>Santa Catarina </option>
	                    	<option value="SP" <?php if ($estado == "SP") { ?>selected="selected"<?php } ?>>S&atilde;o Paulo </option>
	                    	<option value="SE" <?php if ($estado == "SE") { ?>selected="selected"<?php } ?>>Sergipe </option>
	                    	<option value="TO" <?php if ($estado == "TO") { ?>selected="selected"<?php } ?>>Tocantins </option>
	                    </select>
                    </form>
                    <img id="btn_buscar" src="imagens/btn_buscar.png" style="cursor:pointer" onclick="document.form_pesquisa.submit();" />
                    
                </div>                  
            </div>      
            <div class="clear"></div>
            <nav id="menu_esquerdo">
            	<ul>
            		<li><a href="index.php">HOME</a></li>
            		<li><a href="cliente.php?id_cliente=<?php echo $_SESSION["cliente_id"]?>">meu cadastro</a></li>
            		<li><a href="listaanimal.php">animais</a></li>
            		<li><a href="">finais felizes</a></li>
            		<li><a href="quemsomos.php">quem somos</a></li>
            		<li><a href="evento.php">eventos</a></li>
            		<li><a href="">parceiros</a></li>
            		<li><a href="">doações</a></li>
            	</ul>
            </nav>
    	</div>
    </div>
<div class="clear"></div>