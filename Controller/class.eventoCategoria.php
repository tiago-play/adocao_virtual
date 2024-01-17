<?php
class EventoCategoriaController extends EventoCategoriaModel {
	public function __construct(){}
	
	public function inserirDadosEventoCategoria(){
		$this->setDescricao(utf8_decode($_POST['descricao']));
		
		$resultado = $this->inserirEvetoCategoria();
		
		return $resultado;
	}

	public function editarDadosEventoCategoria(){
		$this->setId_Categoria(utf8_decode($_POST['id_categoria']));
		$this->setDescricao(utf8_decode($_POST['descricao']));
		
		$resultado = $this->editarEventoCategoria();
		
		return $resultado;
	}	


	public function consultarDadosEventoCategoria(){
		$this->setId_Categoria(utf8_decode($_POST['id_categoria']));
		return $this->consultarEventoCategoria();
	}

	public function listarDadosEventoCategoria(){
		$this->setId_Categoria(utf8_decode($_POST['id_categoria']));
		return $this->listarEventoCategoria();
	}

	public function deletarDadosEventoCategoria(){
		$this->setId_Categoria(utf8_decode($_POST['id_categoria']));
		$this->setId_Categoria(utf8_decode($_POST['id_categoria']));
		return $this->deletarEventoCategoria();
	}

	public function get_post_action($name){
		$params = func_get_args();
	    foreach ($params as $name){
	       	if (isset($_POST[$name])){
	          	return $name;
	        }
	    }
	}

	public function paginacaoDadosEventoCategoria($paginaatual = 1, $totalregistrospg = 10){
		$paginaatual = ($paginaatual <= 0) ? 1 : $paginaatual; 

		$inicial = ($paginaatual-1) * $totalregistrospg;
		
		return $this->paginacaoEventoCategoria($inicial, $totalregistrospg);
	}
}
?>