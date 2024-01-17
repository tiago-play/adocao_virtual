<?php

class PedidoModel {
	private $id_Pedido;
	private $id_Cliente;
	private $dt_Adocao;
	private $termo_Adocao;
	
	public function getDt_Adocao() {
		return $this->dt_Adocao;
	}
	
	public function getId_Cliente() {
		return $this->id_Cliente;
	}
	
	public function getId_Pedido() {
		return $this->id_Pedido;
	}
	
	public function getTermo_Adocao() {
		return $this->termo_Adocao;
	}
	
	public function setDt_Adocao($dt_Adocao) {
		$this->dt_Adocao = $dt_Adocao;
	}
	
	public function setId_Cliente($id_Cliente) {
		$this->id_Cliente = $id_Cliente;
	}
	
	public function setId_Pedido($id_Pedido) {
		$this->id_Pedido = $id_Pedido;
	}
	
	public function setTermo_Adocao($termo_Adocao) {
		$this->termo_Adocao = $termo_Adocao;
	}

	function __construct() {
	
	}
	
	public function inserirPedido() {
		$query = "INSERT INTO pedidos(
		id_cliente, dt_adocao, termo_adocao) VALUES(
		'".$this->getId_Cliente()."', '".$this->getDt_Adocao()."', '".$this->getTermo_Adocao()."')";
	
		$resultado = DAO::abreConexao()->runQuery($query);
		
		if($resultado){
			return $this->ultimoPedido();
		}else{
			return false;
		}
	}

	public function ultimoPedido(){
		$query = "select MAX(id_pedido) as ultimo FROM pedidos";
		
		$resultado = DAO::abreConexao()->runQuery($query);
		
		$dados = mysql_fetch_assoc($resultado);
		
		return $dados["ultimo"];
	}
	
	public function editarPedido() {
		$query = "UPDATE pedidos SET
		id_cliente='".$this->getTipo()."', dt_adocao='".$this->getDt_Adocao()."'
		termo_adocao='".$this->getTermo_Adocao()."'
		WHERE id_pedido ='".$this->getId_Pedido()."'";
		
		$resultado = DAO::abreConexao()->runQuery($query);
		
		return $resultado;
	}
	
	public function deletarPedido() {
		$query = "DELETE FROM pedidos WHERE id_pedido='".$this->getId_Pedido()."'";
		
		$resultado = DAO::abreConexao()->runQuery($query);
		
		return $resultado;
	}
	
	public function consultarPedido() {
		$query = "SELECT * FROM pedidos WHERE id_pedido='".$this->getId_Pedido()."'";
	
	    $resultado = DAO::abreConexao()->runQuery($query);
	    
	    if (mysql_num_rows($resultado) > 0) {
	    	
	    	$dados_pedido = mysql_fetch_assoc($resultado);
	    	
	    	$this->setId_Pedido(utf8_encode($dados_pedido["id_pedido"]));
			$this->setId_Cliente(utf8_encode($dados_pedido["id_cliente"]));
			$this->setDt_Adocao(utf8_encode($dados_pedido["dt_adocao"]));
			$this->setTermo_Adocao(utf8_encode($dados_pedido["termo_adocao"]));
	    }
		
		return $resultado;
	}
	
	public function listarPedido() {
		$query = "SELECT * FROM pedidos ORDER BY id_pedido";
		
		$resultado = DAO::abreConexao()->runQuery($query);
		
		return $resultado;
	}

	public function paginacaoPedido($inicial, $totalregistrospg){
		$query = "SELECT a.id_pedido, c.nome as nomeanimal, d.nome as nomecliente, a.dt_adocao
				  FROM pedidos a
				  INNER JOIN pedidos_itens b ON (a.id_pedido = b.id_pedido)
				  INNER JOIN animais       c ON (c.id_animal = b.id_animal)
				  INNER JOIN clientes      d ON (a.id_cliente = d.id_cliente)
			      LIMIT $inicial, $totalregistrospg";

		$resultado = DAO::abreConexao()->runQuery($query);
        
		return $resultado;
	}
	
	public function totalPedido(){
		$query = "SELECT count(id_pedido) as total FROM pedidos";
		
		$resultado  = DAO::abreConexao()->runQuery($query);
		
		$total = mysql_fetch_assoc($resultado);
		
		return $total["total"]; //total é o "as total" que foi feito no select
	}
	
	public function mostraData($data){
		if ($data != '') {
			$espaco = explode(" ",$data);
			$dataformatada = explode("-",$espaco[0]);
			return $dataformatada[2]."/".$dataformatada[1]."/".$dataformatada[0]." ".$espaco[1];
		}else {
			return false;
		}
	}
}

?>
