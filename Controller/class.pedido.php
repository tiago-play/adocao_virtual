<?php
class PedidoController extends PedidoModel {
	public function __construct(){}
	
	public function inserirDadosPedido(){
		$this->setId_Cliente(utf8_decode($_POST["id_cliente"]));
		$this->setDt_Adocao(utf8_decode($_POST["dt_adocao"]));
		$this->setTermo_Adocao(utf8_decode($_POST["termo_adocao"]));
		
		$id_pedido = $this->inserirPedido();
		
	 	$item = new PedidoItenController();
	 	$item->setId_Animal($_POST["id_animal"]);
	    $item->setId_Pedido($id_pedido);
	    $item->setQtd_Animais(1);
	    $item->inserirPedidoIten();
	    
	    if($id_pedido){
	    	return true;
	    }else{
	    	return false;
	    }
		
	}
	
	public function editarDadosPedido(){
		$this->setId_Pedido(utf8_decode($_POST["id_pedido"]));
		$this->setId_Cliente(utf8_decode($_POST["id_cliente"]));
		$this->setDt_Adocao(utf8_decode($_POST["dt_adocao"]));
		$this->setTermo_Adocao(utf8_decode($_POST["termo_adocao"]));
		
		$resultado = $this->editarPedido();
		
		return $resultado;
	}
	
	public function consultarDadosPedido(){
		$this->setId_Pedido(utf8_decode($_POST["id_pedido"]));
		return $this->consultarPedido();
	}
	
	public function listarDadosPedido(){
		$this->setId_Pedido(utf8_decode($_POST["id_pedido"]));
		return $this->listarPedido();
	}
	
	public function deletarDadosPedido(){
		$this->setId_Pedido(utf8_decode($_POST["id_pedido"]));
		return $this->deletarPedido();
	}

	public function get_post_action($name){
		$params = func_get_args();
	    foreach ($params as $name){
	       	if (isset($_POST[$name])){
	          	return $name;
	        }
	    }
	}

	public function paginacaoDadosPedido($paginaatual = 1, $totalregistrospg = 10){
		$paginaatual = ($paginaatual <= 0) ? 1 : $paginaatual; 

		$inicial = ($paginaatual-1) * $totalregistrospg;
		
		return $this->paginacaoPedido($inicial, $totalregistrospg);
	}
}
?>