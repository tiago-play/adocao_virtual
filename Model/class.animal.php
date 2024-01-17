<?php

class AnimalModel {
	private $id_Animal;
	private $id_Funcionario;
	private $dt_Nascimento;
	private $nome;
	private $cor;
	private $raca;
	private $procedencia;
	private $sexo;
	private $porte;
	private $nome_imagem;
	private $tipo;
	private $estado;
	

	public function getEstado() {
		return $this->estado;
	}
	
	public function setEstado($estado) {
		$this->estado = $estado;
	}

	
	public function getTipo() {
		return $this->tipo;
	}
	
	public function getNome_imagem() {
		return $this->nome_imagem;
	}

	public function getCor() {
		return $this->cor;
	}
	
	public function getDt_Nascimento() {
		return $this->data_Nascimento;
	}
	
	public function getId_Animal() {
		return $this->id_Animal;
	}
	
	public function getId_Funcionario() {
		return $this->id_Funcionario;
	}
	
	public function getNome() {
		return $this->nome;
	}
	
	public function getProcedencia() {
		return $this->procedencia;
	}
	
	public function getRaca() {
		return $this->raca;
	}
	
	public function getSexo() {
		return $this->sexo;
	}
	
	public function getPorte() {
		return $this->porte;
	}
	
	public function setTipo($tipo) {
		$this->tipo = $tipo;
	}
	
	public function setNome_Imagem($nome_imagem) {
		$this->nome_imagem = $nome_imagem;
	}
	
	public function setCor($cor) {
		$this->cor = $cor;
	}
	
	public function setDt_Nascimento($data_Nascimento) {
		$this->data_Nascimento = $data_Nascimento;
	}
	
	public function setId_Animal($id_Animal) {
		$this->id_Animal = $id_Animal;
	}
	
	public function setId_Funcionario($id_Funcionario) {
		$this->id_Funcionario = $id_Funcionario;
	}
	
	public function setNome($nome) {
		$this->nome = $nome;
	}
	
	public function setProcedencia($procedencia) {
		$this->procedencia = $procedencia;
	}
	
	public function setRaca($raca) {
		$this->raca = $raca;
	}
	
	public function setSexo($sexo) {
		$this->sexo = $sexo;
	}

	public function setPorte($porte) {
		$this->porte = $porte;
	}
	
	function __construct() {
	
	}
	
	public function inserirAnimal() {
		$query = "INSERT INTO animais(id_funcionario,
		dt_nascimento,nome,cor,raca,procedencia,sexo,porte, nome_imagem, tipo, estado) VALUES(
		'".$this->getId_Funcionario()."',
		'".$this->getDt_Nascimento()."', '".$this->getNome()."',         '".$this->getCor()."',
		'".$this->getRaca()."',          '".$this->getProcedencia()."',  '".$this->getSexo()."',
		'".$this->getPorte()."',		 '".$this->getNome_imagem()."',  '".$this->getTipo()."',
		'".$this->getEstado()."')";
		
		$resultado = DAO::abreConexao()->runQuery($query);
		
		return $resultado;
		
		
	}
	
	public function editarAnimal() {
		$query = "UPDATE animais SET
		id_funcionario='".$this->getId_Funcionario()."', dt_nascimento='".$this->getDt_Nascimento()."',
		nome='".$this->getNome()."',                     cor='".$this->getCor()."',  raca='".$this->getRaca()."',
		procedencia='".$this->getProcedencia()."',       sexo='".$this->getSexo()."', porte='".$this->getPorte()."',                    
		nome_imagem='".$this->getNome_imagem()."',		 tipo='".$this->getTipo()."', estado='".$this->estado."'
		WHERE id_animal='".$this->getId_Animal()."'";
		
		$resultado = DAO::abreConexao()->runQuery($query);
		
		return $resultado;
	}
	
	public function deletarAnimal() {
		$query = "DELETE FROM animais WHERE id_animal='".$this->getId_Animal()."'";
		
		$resultado = DAO::abreConexao()->runQuery($query);
		
		return $resultado;	
	}
	
	public function consultarAnimal() {
		$query = "SELECT * FROM animais WHERE id_animal='".$this->getId_Animal()."'";
	
	    $resultado = DAO::abreConexao()->runQuery($query);
	    
	    if(mysql_num_rows($resultado) > 0){
	    	
	    	$dados_animal = mysql_fetch_assoc($resultado);
	    	
	    	$this->setId_Animal(utf8_encode($dados_animal["id_animal"]));
			$this->setId_Funcionario(utf8_encode($dados_animal["id_funcionario"]));
			$this->setNome(utf8_encode($dados_animal["nome"]));  
			$this->setDt_Nascimento($this->mostraData($dados_animal["dt_nascimento"]));
			$this->setCor(utf8_encode($dados_animal["cor"]));
			$this->setRaca(utf8_encode($dados_animal["raca"]));  
			$this->setProcedencia(utf8_encode($dados_animal["procedencia"])); 
			$this->setSexo(utf8_encode($dados_animal["sexo"]));
			$this->setPorte(utf8_encode($dados_animal["porte"]));
			$this->setTipo(utf8_encode($dados_animal["tipo"]));
			$this->setEstado(utf8_encode(($dados_animal["estado"])));
			$this->setNome_Imagem(utf8_encode($dados_animal["nome_imagem"]));
	    }
		
		return $resultado;
	}
	
	public function listarAnimal($id_animal) {
		$query = "SELECT * FROM animais WHERE id_animal='".$id_animal."'";
		
		$resultado = DAO::abreConexao()->runQuery($query);
		
		return $resultado;
	}
	
	public function listarAnimalId($id_animal) {
		$query = "SELECT * FROM animais WHERE id_animal = $id_animal";
		
		$resultado = DAO::abreConexao()->runQuery($query);
		
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
	
	public function paginacaoAnimal($paginaatual = 1, $totalregistrospg = 10){
		$paginaatual = ($paginaatual <= 0) ? 1 : $paginaatual; 

		$inicial = ($paginaatual-1) * $totalregistrospg;

		$query = "SELECT   a.id_animal,
					       a.id_funcionario, b.nome AS nomefuncionario,
					       a.dt_nascimento,
					       a.nome,
					       a.cor,
					       a.raca,
					       a.sexo,
					       a.tipo,
					       a.estado
				  FROM animais a
					       INNER JOIN funcionarios b ON (a.id_funcionario = b.id_funcionario)
					       ORDER BY a.id_animal LIMIT $inicial, $totalregistrospg";

		$resultado = DAO::abreConexao()->runQuery($query);
        
		return $resultado;
	}

	public function listarAnimalPaginacao($busca, $estado, $inicial, $totalregistrospg){
		$query = "SELECT * FROM animais "; 
		
		if($busca == "outros"){
			$query .= "WHERE tipo != 'cachorro' and  tipo != 'gato'";
		
		}else if($busca != ""){
			$query .= "WHERE upper(tipo) LIKE upper('%$busca%') ";
		
		}else if(($busca == "outros") and ($estado != "")){
			$query .= "WHERE tipo != 'cachorro' and  tipo != 'gato' and estado = '$estado'";
		
		}else if(($busca != "") and ($estado != "")){
			$query .= "WHERE upper(tipo) LIKE upper('%$busca%') AND estado = '$estado'";
		
		}else if($estado != ""){
			$query .= "WHERE estado = '$estado'";	
		}
			
		
		
		$query .= " ORDER BY id_animal LIMIT $inicial, $totalregistrospg";
		
		$resultado = DAO::abreConexao()->runQuery($query);
		
		return $resultado;
	}
	
	public function totalAnimal(){
		$query = "SELECT count(id_animal) as total FROM animais";
		
		$resultado  = DAO::abreConexao()->runQuery($query);
		
		$total = mysql_fetch_assoc($resultado);
		
		return $total["total"]; //total é o "as total" que foi feito no select
	}


}

?>

