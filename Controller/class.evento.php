<?php

class EventoController extends EventoModel {
	
	public function __construct() {}
	
	//este medoto pega o que foi passado formulario
	public function inserirDadosEvento(){
		$this->setId_Funcionario(utf8_decode($_POST["id_funcionario"]));
		$this->setId_Categoria(utf8_decode($_POST["id_categoria"]));
		$this->setLocal(utf8_decode($_POST["local"]));
		$this->setDescricao(utf8_decode($_POST["descricao"]));
		
		$data = $_POST["data_horario"];
		$this->setData_Horario($this->gravaData($data));
		
		$resultado = $this->inserirEvento();//aqui esta chamando o metodo inserir evento classe EventoModel
		
		return $resultado;
	}
	
	public function editarDadosEvento(){
		$this->setId_Evento(utf8_decode($_POST["id_evento"]));
		$this->setId_Funcionario(utf8_decode($_POST["id_funcionario"]));
		$this->setId_Categoria(utf8_decode($_POST["id_categoria"]));
		$this->setLocal(utf8_decode($_POST["local"]));
		$this->setDescricao(utf8_decode($_POST["descricao"]));
		
		$data = $_POST["data_horario"];
		$this->setData_Horario($this->gravaData($data));
		
		$resultado = $this->editarEvento();
		
		return $resultado;
	}
	
	public function consultarDadosEvento(){
		$this->setId_Evento(utf8_decode($_POST["id_evento"]));
		return $this->consultarEvento();
	}
	
	public function listarDadosEvento(){
		$this->setId_Evento(utf8_decode($_POST["id_evento"]));
		return $this->listarEvento();
	}
	
	public function deletarDadosEvento(){
		$this->setId_Evento(utf8_decode($_POST["id_evento"]));
		return $this->deletarEvento();
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
			$espaco = explode(" ",$data);
			$dataformatada = explode("/",$espaco[0]);
			return $dataformatada[2]."-".$dataformatada[1]."-".$dataformatada[0]." ".$espaco[1];
		}else {
			return false;
		}
	}

	public function paginacaoDadosEvento($paginaatual = 1, $totalregistrospg = 10){
		$paginaatual = ($paginaatual <= 0) ? 1 : $paginaatual; 

		$inicial = ($paginaatual-1) * $totalregistrospg;
		
		return $this->paginacaoEvento($inicial, $totalregistrospg);
	}

}

?>
