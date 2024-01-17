<?php

class VacinaModel {
	private $id_Vacina;
	private $nome;
	private $validade;
	private $doenca;
	
	public function getDoenca() {
		return $this->doenca;
	}
	
	public function getId_Vacina() {
		return $this->id_Vacina;
	}
	
	public function getNome() {
		return $this->nome;
	}

	public function getValidade() {
		return $this->validade;
	}
	
	public function setDoenca($doenca) {
		$this->doenca = $doenca;
	}
	
	public function setId_Vacina($id_Vacina) {
		$this->id_Vacina = $id_Vacina;
	}
	
	public function setNome($nome) {
		$this->nome = $nome;
	}
	
	public function setValidade($validade) {
		$this->validade = $validade;
	}
	
	function __construct() {
	
	}
	
	public function inserirVacina(){
		$query = "INSERT INTO vacinas(
		nome,validade,doenca) VALUES(
		'".$this->getNome()."', '".$this->getValidade()."', '".$this->getDoenca()."')";
		
		$resultado = DAO::abreConexao()->runQuery($query);
		
		return $resultado;
	}
	
	public function editarVacina(){
		$query = "UPDATE vacinas SET
		nome='".$this->getNome()."', validade='".$this->getValidade()."',  
		doenca='".$this->getDoenca()."'   
		WHERE id_vacina='".$this->getId_Vacina()."'";
		
		$resultado = DAO::abreConexao()->runQuery($query);
		
		return $resultado;	
	}
	
	public function deletarVacina(){
		$query = "DELETE FROM vacinas WHERE id_vacina='".$this->getId_Vacina()."'";
		
		$resultado = DAO::abreConexao()->runQuery($query);
		
		return $resultado;
	}
	
	public function consultarVacina(){
		$query = "SELECT * FROM vacinas WHERE id_Vacina='".$this->getId_Vacina()."'";
	
	    $resultado = DAO::abreConexao()->runQuery($query);
	    
		if (mysql_num_rows($resultado) > 0) {
	    	
	    	$dados_vacina = mysql_fetch_assoc($resultado);
			
	    	$this->setId_Vacina(utf8_encode($dados_vacina["id_vacina"]));
	    	$this->setValidade($this->mostraData($dados_vacina["validade"]));
			$this->setNome(utf8_encode($dados_vacina["nome"]));
			$this->setDoenca(utf8_encode($dados_vacina["doenca"]));
	    }
		
		return $resultado;
	}
	
	public function mostraData($data){
		if ($data!='') {
		   $dataformatada = explode("-",$data);
		return $dataformatada[2]."/".$dataformatada[1]."/".$dataformatada[0];
		}else{
			return false; 
		}
	}
	
	public function listarVacina(){
		$query = "SELECT * FROM vacinas ORDER BY id_vacina";
		
		$resultado = DAO::abreConexao()->runQuery($query);
		
		return $resultado;
	}

	public function paginacaoVacina($inicial, $totalregistrospg){
		$paginaatual = ($paginaatual <= 0) ? 1 : $paginaatual; 

		$inicial = ($paginaatual-1) * $totalregistrospg;

		$query = "SELECT * FROM vacinas order by id_vacina LIMIT $inicial, $totalregistrospg";

		$resultado = DAO::abreConexao()->runQuery($query);
        
		return $resultado;
	}
	
	public function totalVacina(){
		$query = "SELECT count(id_vacina) as total FROM vacinas";
		
		$resultado  = DAO::abreConexao()->runQuery($query);
		
		$total = mysql_fetch_assoc($resultado);
		
		return $total["total"]; //total é o "as total" que foi feito no select
	}
}

?>
