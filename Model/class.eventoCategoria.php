<?php

class EventoCategoriaModel{
	private $id_categoria;
	private $descricao;
	
	public function getDescricao() {
		return $this->descricao;
	}
	
	public function getId_Categoria() {
		return $this->id_categoria;
	}

	public function setDescricao($descricao) {
		$this->descricao = $descricao;
	}
	
	public function setId_Categoria($id_Categoria) {
		$this->id_categoria = $id_Categoria;
	}

	public function __construct(){}
	
	public function inserirEvetoCategoria(){
		$query = "INSERT INTO eventos_categorias(
		descricao) VALUES(
		'".$this->getDescricao()."')";
		$resultado = DAO::abreConexao()->runQuery($query);
		
		return $resultado;
	}
	
	public function editarEventoCategoria(){
		$query = "UPDATE eventos_categorias SET
		descricao='".$this->getDescricao()."' 
		where id_categoria='".$this->getId_Categoria()."'";
		
		$resultado = DAO::abreConexao()->runQuery($query);
		
		return $resultado;
	}
	
	public function deletarEventoCategoria(){
		$query = "DELETE FROM eventos_categorias WHERE id_categoria='".$this->getId_Categoria()."'";
	
		$resultado = DAO::abreConexao()->runQuery($query);
		
		return $resultado;
	}
	
	public function consultarEventoCategoria(){
		$query = "SELECT * FROM eventos_categorias WHERE id_categoria='".$this->getId_categoria()."'";

		$resultado = DAO::abreConexao()->runQuery($query);
		
		if (mysql_num_rows($resultado) > 0) {
	    	
	    	$dados_eventoCategoria= mysql_fetch_assoc($resultado);
	    	$this->setId_Categoria(utf8_encode($dados_eventoCategoria['id_categoria']));
			$this->setDescricao(utf8_encode($dados_eventoCategoria['descricao']));
	    }
		
		return $resultado;
	}
	
	public function listarEventoCategoria(){
		$query = "SELECT * FROM eventos_categorias ORDER BY id_categoria";
		
		$resultado = DAO::abreConexao()->runQuery($query);
		
		return $resultado;
	}

	public function paginacaoEventoCategoria($inicial, $totalregistrospg){
	

		$query = "SELECT * FROM eventos_categorias order by id_categoria LIMIT $inicial, $totalregistrospg";

		$resultado = DAO::abreConexao()->runQuery($query);
        
		return $resultado;
	}
	
	public function totalEventoCategoria(){
		$query = "SELECT count(id_categoria) as total FROM eventos_categorias";
		
		$resultado  = DAO::abreConexao()->runQuery($query);
		
		$total = mysql_fetch_assoc($resultado);
		
		return $total["total"]; //total é o "as total" que foi feito no select
	}
}

?>