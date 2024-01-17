<?php

class EventoModel {
	private $id_Evento;
	private $id_Funcionario;
	private $id_Categoria;
	private $local;
    private $data_Horario;
 	private $descricao;

	public function getId_Evento() {
		return $this->id_Evento;
	}   
	
	public function getId_Funcionario(){
		return $this->id_Funcionario;	
	}
	
	public function getId_Categoria(){
		return $this->id_Categoria;
	}
	
	public function getData_Horario() {
		return $this->data_Horario;
	}
	
	public function getDescricao() {
		return $this->descricao;
	}
	
	public function getLocal() {
		return $this->local;
	}
	
	public function setId_Evento($id_Evento) {
		$this->id_Evento = $id_Evento;
	}
	
	public function setId_Funcionario($id_Funcionario) {
		$this->id_Funcionario = $id_Funcionario;
	}
	
	public function setId_Categoria($id_Categoria) {
		$this->id_Categoria = $id_Categoria;
	}
	
	public function setData_Horario($data_Horario) {
		$this->data_Horario = $data_Horario;
	}
	
	public function setDescricao($descricao) {
		$this->descricao = $descricao;
	}
	
	public function setLocal($local) {
		$this->local = $local;
	}
	
	function __construct() {
	
	}

	public function inserirEvento(){
		$query = "INSERT INTO eventos(
		id_funcionario,id_categoria,local,data_horario,descricao) VALUES(
		'".$this->getId_Funcionario()."', '".$this->getId_Categoria()."', 
		'".$this->getLocal()."',          '".$this->getData_Horario()."',
		'".$this->getDescricao()."')";
		
		$resultado = DAO::abreConexao()->runQuery($query);
		
		return $resultado;
	}
	
	public function editarEvento(){
		$query = "UPDATE eventos SET
		id_funcionario='".$this->getId_Funcionario()."', id_categoria='".$this->getId_Categoria()."',
		local='".$this->getLocal()."',                   data_horario='".$this->getData_Horario()."',  
		descricao='".$this->getDescricao()."'   
		WHERE id_evento='".$this->getId_Evento()."'";
		
		$resultado = DAO::abreConexao()->runQuery($query);
		
		return $resultado;
	}
	
	public function deletarEvento(){
		$query = "DELETE FROM eventos WHERE id_evento='".$this->getId_Evento()."'";
		
		$resultado = DAO::abreConexao()->runQuery($query);
		
		return $resultado;
	}
	
	public function consultarEvento(){
		$query = "SELECT * FROM eventos WHERE id_Evento='".$this->getId_Evento()."'";
	
	    $resultado = DAO::abreConexao()->runQuery($query);
	    
	    if (mysql_num_rows($resultado) > 0) {
	    	$dados_evento = mysql_fetch_assoc($resultado);
	  		$this->setId_Evento(utf8_encode($dados_evento["id_evento"]));
	  		$this->setId_Funcionario(utf8_encode($dados_evento["id_funcionario"]));
	  		$this->setId_Categoria(utf8_encode($dados_evento["id_categoria"]));
			$this->setLocal(utf8_encode($dados_evento["local"]));
			$this->setData_Horario($this->mostraData($dados_evento["data_horario"]));
			$this->setDescricao(utf8_encode($dados_evento["descricao"]));	
	    }
		
		return $resultado;
	}
	
	public function listarEvento(){
		$query = "SELECT * FROM eventos ORDER BY id_evento";
		$resultado = DAO::abreConexao()->runQuery($query);
		return $resultado;
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
	
	public function listaDescricaoCategoria(){
		$query = "select * from eventos_categorias ORDER BY descricao";
		$resultado = DAO::abreConexao()->runQuery($query);
		return $resultado;
	}

	public function paginacaoEvento($inicial, $totalregistrospg){
		$query = "SELECT  a.id_evento,
					a.id_funcionario, b.nome AS nomefuncionario,
					a.id_categoria, c.descricao AS descricaocategoria,
					a.local,
					a.data_horario,
					a.descricao
				FROM eventos a
					INNER JOIN funcionarios b  ON (a.id_funcionario = b.id_funcionario)
					INNER JOIN eventos_categorias c ON (a.id_categoria = c.id_categoria)
					ORDER BY a.id_evento LIMIT $inicial, $totalregistrospg";

		$resultado = DAO::abreConexao()->runQuery($query);
        
		return $resultado;
	}
	
	public function totalEvento(){
		$query = "SELECT count(id_evento) as total FROM eventos";
		
		$resultado  = DAO::abreConexao()->runQuery($query);
		
		$total = mysql_fetch_assoc($resultado);
		
		return $total["total"]; //total é o "as total" que foi feito no select
	}
}

?>
