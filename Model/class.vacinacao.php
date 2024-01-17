<?php


class VacinacaoModel {
	private $id_Vacina_Animal;
	private $id_Animal;
	private $id_Vacina;
	private $id_Funcionario;	
	private $dt_Vacinacao;
	
	public function getDt_Vacinacao() {
		return $this->dt_Vacinacao;
	}
	
	public function getId_Animal() {
		return $this->id_Animal;
	}
	
	public function getId_Funcionario() {
		return $this->id_Funcionario;
	}
	
	public function getId_Vacina() {
		return $this->id_Vacina;
	}
	
	public function getId_Vacina_Animal() {
		return $this->id_Vacina_Animal;
	}
	
	public function setDt_Vacinacao($dt_Vacinacao) {
		$this->dt_Vacinacao = $dt_Vacinacao;
	}
	
	public function setId_Animal($id_Animal) {
		$this->id_Animal = $id_Animal;
	}
	
	public function setId_Funcionario($id_Funcionario) {
		$this->id_Funcionario = $id_Funcionario;
	}
	
	public function setId_Vacina($id_Vacina) {
		$this->id_Vacina = $id_Vacina;
	}
	
	public function setId_Vacina_Animal($id_Vacina_Animal) {
		$this->id_Vacina_Animal = $id_Vacina_Animal;
	}

	function __construct() {
	
	}
	
	public function inserirVacinacao() {
		$query = "INSERT INTO vacinacoes(
		id_animal, id_vacina, id_funcionario, dt_vacinacao) VALUES(
		'".$this->getId_Animal()."',      '".$this->getId_Vacina()."', 
		'".$this->getId_Funcionario()."', '".$this->getDt_Vacinacao()."')";
	
		$resultado = DAO::abreConexao()->runQuery($query);
		
		return $resultado;
	}
	
	public function editarVacinacao() {
		$query = "UPDATE vacinacoes SET
		id_animal='".$this->getId_Animal()."', id_vacina='".$this->getId_Vacina()."',
		id_funcionario='".$this->getId_Funcionario()."', dt_vacinacao='".$this->getDt_Vacinacao()."'
		WHERE id_vacina_animal ='".$this->getId_Vacina_Animal()."'";
		
		$resultado = DAO::abreConexao()->runQuery($query);
		
		return $resultado;
	}
	
	public function deletarVacinacao() {
		$query = "DELETE FROM vacinacoes WHERE id_vacina_animal='".$this->getId_Vacina_Animal()."'";
		
		$resultado = DAO::abreConexao()->runQuery($query);
		
		return $resultado;
	}
	
	public function consultarVacinacao() {
		$query = "SELECT * FROM vacinacoes WHERE id_vacina_animal='".$this->getId_Vacina_Animal()."'";
	
	    $resultado = DAO::abreConexao()->runQuery($query);
		
		 if (mysql_num_rows($resultado) > 0) {
	    	
	    	$dados_vacinacao = mysql_fetch_assoc($resultado);

			$this->setId_Vacina_Animal(utf8_encode($dados_vacinacao["id_vacina_animal"]));
			$this->setId_Animal(utf8_encode($dados_vacinacao["id_animal"]));
			$this->setId_Vacina(utf8_encode($dados_vacinacao["id_vacina"]));
			$this->setId_Funcionario(utf8_encode($dados_vacinacao["id_funcionario"]));
			$this->setDt_Vacinacao($this->mostraData($dados_vacinacao["dt_vacinacao"]));
	    }
	    
		return $resultado;
	}

	public function listaNomeAnimal(){
		$query = "select id_animal, nome from animais ORDER	BY nome";
		
		$resultado = DAO::abreConexao()->runQuery($query);

		return $resultado;
	}
	
	public function listaNomeVacina(){
		$query = "select id_vacina, nome from vacinas ORDER BY nome";
		
		$resultado = DAO::abreConexao()->runQuery($query);
		
		return $resultado;
	}
	
	public function mostraData($data){
		if ($data!='') {
		   $dataformatada = explode("-",$data);
		return $dataformatada[2]."/".$dataformatada[1]."/".$dataformatada[0];
		}else{
			return ''; 
		}
	}
	
	public function paginacaoVacinacao($inicial, $totalregistrospg){
		$query = "SELECT a.id_vacina_animal,
						 a.id_animal, b.nome AS nomeanimal,
						 a.id_vacina, c.nome AS nomevacina,
      					 a.id_funcionario, d.nome AS nomefuncionario,
      					 a.dt_vacinacao
				  FROM vacinacoes a 
				  	INNER JOIN animais b ON (a.id_animal = b.id_animal)
				  	INNER JOIN vacinas c ON (a.id_vacina = c.id_vacina)
				  	INNER JOIN funcionarios d ON (a.id_funcionario = d.id_funcionario)
				  	ORDER BY a.id_vacina_animal LIMIT $inicial, $totalregistrospg";
		
		$resultado = DAO::abreConexao()->runQuery($query);
        
		return $resultado;
	}
	
	public function totalVacinacao(){
		$query = "SELECT count(id_vacina_animal) as total FROM vacinacoes";
		
		$resultado  = DAO::abreConexao()->runQuery($query);
		
		$total = mysql_fetch_assoc($resultado);
		
		return $total["total"]; //total é o "as total" que foi feito no select
	}	
}

?>
