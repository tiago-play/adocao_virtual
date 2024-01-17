<?php
class PedidoItenController extends PedidoItenModel {
	public function __construct(){}
	
	public function inserirDadosPedidoIten(){
		$this->setId_Animal(utf8_decode($_POST["id_animal"]));
		$this->setId_Pedido(utf8_decode($_POST["id_pedido"]));
		$this->setQtd_Animais(utf8_decode($_POST["qtd_animais"]));
		
		$resultado = $this->inserirPedidoIten();
		
		return $resultado;
	}
	
	public function editarDadosPedidoIten(){
		$this->setId_Animal(utf8_decode($_POST["id_animal"]));
		$this->setId_Pedido(utf8_decode($_POST["id_pedido"]));
		$this->setQtd_Animais(utf8_decode($_POST["qtd_animais"]));
		
		$resultado = $this->inserirPedidoIten();
		
		return $resultado;
	}
	
	public function consultarDadosPedidoIten(){
		$this->setId_Animal(utf8_decode($_POST["id_animal"]));
		return $this->consultarPedidoIten();
	}
	
	public function listarDadosPedidoIten(){
		$this->setId_Animal(utf8_decode($_POST["id_animal"]));
		return $this->listarPedidoIten();
	}
	
	public function deletarDadosPedidoIten(){
		$this->setId_Animal(utf8_decode($_POST["id_animal"]));
		return $this->deletarPedidoIten();
	}

	public function get_post_action($name){
		$params = func_get_args();
	    foreach ($params as $name){
	       	if (isset($_POST[$name])){
	          	return $name;
	        }
	    }
	}
}
?>