<?php
class VacinacaoController extends VacinacaoModel {
	public function __construct(){}
	
	public function inserirDadosVacinacao(){
		$this->setId_Animal(utf8_decode($_POST["id_animal"]));
		$this->setId_Vacina(utf8_decode($_POST["id_vacina"]));
		$this->setId_Funcionario(utf8_decode($_POST["id_funcionario"]));
		
		$dt_vacinacao = $this->gravaData($_POST["dt_vacinacao"]);
		$this->setDt_Vacinacao($dt_vacinacao);
		
		$resultado = $this->inserirVacinacao();
		
		return $resultado;
	}
	
	public function editarDadosVacinacao(){
		$this->setId_Vacina_Animal(utf8_decode($_POST["id_vacina_animal"]));
		$this->setId_Animal(utf8_decode($_POST["id_animal"]));
		$this->setId_Vacina(utf8_decode($_POST["id_vacina"]));
		$this->setId_Funcionario(utf8_decode($_POST["id_funcionario"]));
		$this->setDt_Vacinacao(utf8_decode($_POST["dt_vacinacao"]));
		
		$dt_vacinacao = $this->gravaData($_POST["dt_vacinacao"]);
		$this->setDt_Vacinacao($dt_vacinacao);
		
		$resultado = $this->editarVacinacao();
		
		return $resultado;
	}
	
	public function consultarDadosVacinacao(){
		$this->setId_Vacina_Animal(utf8_decode($_POST["id_animal"]));
		return $this->consultarVacinacao();
	}
	
	
	public function deletarDadosVacinacao(){
		$this->setId_Vacina_Animal(utf8_decode($_POST["id_animal"]));
		return $this->deletarVacinacao();
	}
	
	public function get_post_action($name){
		$params = func_get_args();
	    foreach ($params as $name){
	       	if (isset($_POST[$name])){
	          	return $name;
	        }
	    }
	}

	public function gravaData($data){
		if ($data != '') {
			$dataformatada = explode("/",$data);
			return $dataformatada[2]."-".$dataformatada[1]."-".$dataformatada[0];
		}else {
			return false;
		}
	}

	public function paginacaoDadosVacinacao($paginaatual = 1, $totalregistrospg = 10){
		$paginaatual = ($paginaatual <= 0) ? 1 : $paginaatual; 

		$inicial = ($paginaatual-1) * $totalregistrospg;
		
		return $this->paginacaoVacinacao($inicial, $totalregistrospg);
	}

}
?>