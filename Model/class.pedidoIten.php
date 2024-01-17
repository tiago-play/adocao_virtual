<?php

class PedidoItenModel {
	private $id_Animal;
	private $id_Pedido;
	private $qtd_Animais;
	
	public function getId_Animal() {
		return $this->id_Animal;
	}
	
	public function getId_Pedido() {
		return $this->id_Pedido;
	}
	
	public function getQtd_Animais() {
		return $this->qtd_Animais;
	}
	
	public function setId_Animal($id_Animal) {
		$this->id_Animal = $id_Animal;
	}
	
	public function setId_Pedido($id_Pedido) {
		$this->id_Pedido = $id_Pedido;
	}
	
	public function setQtd_Animais($qtd_Animais) {
		$this->qtd_Animais = $qtd_Animais;
	}
	
	function __construct() {
	
	}
	
	public function inserirPedidoIten() {
		$query = "INSERT INTO pedidos_itens(
		id_animal, id_pedido, qtd_animais) VALUES(
		'".$this->getId_Animal()."', '".$this->getId_Pedido()."', '".$this->getQtd_Animais()."')";
	
		$resultado = DAO::abreConexao()->runQuery($query);
		
		return $resultado;
	}
	
	public function editarPedidoIten() {
		$query = "UPDATE pedidos_itens SET
		id_animal='".$this->getId_Animal()."', id_pedido='".$this->getId_Pedido()."'
		qtd_animais='".$this->getQtd_Animais()."'
		WHERE id_pedido ='".$this->getId_Pedido()."'";
		
		$resultado = DAO::abreConexao()->runQuery($query);
		
		return $resultado;
	}
	
	public function deletarPedidoIten() {
		$query = "DELETE FROM pedidos_itens WHERE id_pedido='".$this->getId_Pedido()."'";
		
		$resultado = DAO::abreConexao()->runQuery($query);
		
		return $resultado;
	}
	
	public function consultarPedidoIten() {
		$query = "SELECT * FROM pedidos_itens WHERE id_pedido='".$this->getId_Pedido()."'";
	
	    $resultado = DAO::abreConexao()->runQuery($query);
		
		if (mysql_num_rows($resultado) > 0) {
	    	
	    	$dados_pedidoIten = mysql_fetch_assoc($resultado);
			$this->setId_Animal(utf8_encode($dados_pedidoIten["id_animal"]));
			$this->setId_Pedido(utf8_encode($dados_pedidoIten["id_pedido"]));
			$this->setQtd_Animais(utf8_encode($dados_pedidoIten["qtd_animais"]));
	    }
		return $resultado;
	}
	
	public function listarAnimal(){
		$query = "SELECT * FROM animais";
		
		$resultado = DAO::abreConexao()->runQuery($query);
		
		return $resultado;
	}
	
	public function listarPedidoIten() {
		$query = "SELECT * FROM pedidos_itens ORDER BY id_pedido";
		
		$resultado = DAO::abreConexao()->runQuery($query);
		
		return $resultado;
	}

	public function paginacaoPedidoIten($paginaatual = 1, $totalregistrospg = 10){
		$paginaatual = ($paginaatual <= 0) ? 1 : $paginaatual; 

		$inicial = ($paginaatual-1) * $totalregistrospg;

		$query = "SELECT * FROM pedidos_itens order by id_pedido LIMIT $inicial, $totalregistrospg";

		$resultado = DAO::abreConexao()->runQuery($query);
        
		return $resultado;
	}
	
	public function totalPedidoIten(){
		$query = "SELECT count(id_pedido) as total FROM pedidos_itens";
		
		$resultado  = DAO::abreConexao()->runQuery($query);
		
		$total = mysql_fetch_assoc($resultado);
		
		return $total["total"]; //total é o "as total" que foi feito no select
	}
}
?>