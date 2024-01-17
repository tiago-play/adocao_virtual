<?php
class VacinaController extends VacinaModel {
	public function __construct(){}
	
	public function inserirDadosVacina(){
		$this->setNome(utf8_decode($_POST["nome"]));
		$this->setDoenca(utf8_decode($_POST["doenca"]));
		
		$validade = $this->gravaData($_POST["validade"]);
		$this->setValidade($validade);
		
		$resultado = $this->inserirVacina();
		
		return $resultado;
	}
	
	public function editarDadosVacina(){
		$this->setId_Vacina(utf8_decode($_POST["id_vacina"]));
		$this->setNome(utf8_decode($_POST["nome"]));
		$this->setDoenca(utf8_decode($_POST["doenca"]));
		
		$validade = $this->gravaData($_POST["validade"]);
		$this->setValidade($validade);
		
		$resultado = $this->editarVacina();
		
		return $resultado;
	}
	
	public function consultarDadosVacina(){
		$this->setId_Vacina(utf8_decode($_POST["id_vacina"]));
		return $this->consultarVacina();
	}
	
	public function listarDadosVacina(){
		return $this->listarVacina();
	}
	
	public function deletarDadosVacina(){
		$this->setId_Vacina(utf8_decode($_POST["id_vacina"]));
		return $this->deletarVacina();
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

	public function paginacaoDadosVacina($paginaatual = 1, $totalregistrospg = 10){
		$paginaatual = ($paginaatual <= 0) ? 1 : $paginaatual; 

		$inicial = ($paginaatual-1) * $totalregistrospg;
		
		return $this->paginacaoVacina($inicial, $totalregistrospg);
	}

}
?>