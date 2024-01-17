<?php

class FuncionarioModel extends PessoaModel {
	private $id_Funcionario;
	private $tipo;
	
	public function getId_Funcionario() {
		return $this->id_Funcionario;
	}
	
	public function getTipo() {
		return $this->tipo;
	}

	public function setId_Funcionario($id_Funcionario) {
		$this->id_Funcionario = $id_Funcionario;
	}
	
	public function setTipo($tipo) {
		$this->tipo = $tipo;
	}

	public function __construct(){
		
	}
	
	public function inserirFuncionario(){
		if(!($this->verificarcpf())){
			echo("cpf já cadastrado");
		}else{
		
		$query = "INSERT INTO funcionarios(
		tipo,status,nome,sexo,rg,cpf,email,senha,telefone,celular,dt_nascimento,
		endereco,numero,bairro,complemento,cep,cidade,estado) VALUES(
		'".$this->getTipo()."',          '".$this->getStatus()."',      '".$this->getNome()."',  
		'".$this->getSexo()."',          '".$this->getRg()."',          '".$this->getCpf()."', 
		'".$this->getEmail()."',
		'".$this->getSenha()."',         '".$this->getTelefone()."',    '".$this->getCelular()."',
		'".$this->getDt_nascimento()."', '".$this->getEndereco()."',    '".$this->getNumero()."', 
		'".$this->getBairro()."',        '".$this->getComplemento()."', '".$this->getCep()."',
		'".$this->getCidade()."',        '".$this->getEstado()."')";
		}
		$resultado = DAO::abreConexao()->runQuery($query);
		
		return $resultado;
	}
	
	public function editarFuncionario(){
		$query = "UPDATE funcionarios SET
		tipo='".$this->getTipo()."',                   status='".$this->getStatus()."',           nome='".$this->getNome()."',       
		sexo='".$this->getSexo()."',                   rg='".$this->getRg()."',                   cpf='".$this->getCpf()."',        
		email='".$this->getEmail()."',
		senha='".$this->getSenha()."',                 telefone='".$this->getTelefone()."',       celular='".$this->getCelular()."', 
		dt_nascimento='".$this->getDt_nascimento()."', endereco='".$this->getEndereco()."',       numero='".$this->getNumero()."',  
		bairro='".$this->getBairro()."',               complemento='".$this->getComplemento()."', cep='".$this->getCep()."',        
	    cidade='".$this->getCidade()."',               estado='".$this->getEstado()."',           tipo='".$this->getTipo()."'  
	    WHERE id_funcionario='".$this->getId_Funcionario()."'";
		
		$resultado = DAO::abreConexao()->runQuery($query);
		
		return $resultado;
	}
		
	public function deletarFuncionario(){
		$query = "DELETE FROM funcionarios WHERE id_funcionario='".$this->getId_Funcionario()."'";
		
		$resultado = DAO::abreConexao()->runQuery($query);
		
		return $resultado;
	}
		
	public function consultarFuncionario(){
	    $query = "SELECT * FROM funcionarios WHERE id_funcionario='".$this->getId_Funcionario()."'";
	
	    $resultado = DAO::abreConexao()->runQuery($query);
	    
	    if (mysql_num_rows($resultado) > 0) {
	    	
	    	$dados_funcionario = mysql_fetch_assoc($resultado);
	    	
	    	$this->setId_Funcionario(utf8_encode($dados_funcionario["id_funcionario"]));
	   		$this->setTipo(utf8_encode($dados_funcionario["tipo"]));   
	   		$this->setStatus(utf8_encode($dados_funcionario["status"]));  
			$this->setNome(utf8_encode($dados_funcionario["nome"])); 
			$this->setSexo(utf8_encode($dados_funcionario["sexo"]));
	        $this->setRg(utf8_encode($dados_funcionario["rg"]));  
	        $this->setCpf(utf8_encode($dados_funcionario["cpf"])); 
		    $this->setEmail(utf8_encode($dados_funcionario["email"])); 	    
		    $this->setTelefone(utf8_encode($dados_funcionario["telefone"])); 
		    $this->setCelular(utf8_encode($dados_funcionario["celular"]));
			$this->setDt_nascimento($this->mostraData($dados_funcionario["dt_nascimento"]));
			$this->setEndereco(utf8_encode($dados_funcionario["endereco"])); 
			$this->setNumero(utf8_encode($dados_funcionario["numero"])); 
			$this->setBairro(utf8_encode($dados_funcionario["bairro"]));
   	        $this->setComplemento(utf8_encode($dados_funcionario["complemento"]));
			$this->setCep(utf8_encode($dados_funcionario["cep"]));
			$this->setEstado(utf8_encode($dados_funcionario["estado"]));
			$this->setCidade(utf8_encode($dados_funcionario["cidade"]));
			$this->setSenha(utf8_encode($dados_funcionario["senha"]));
	    }
		
		return $resultado;
	}
	
	public function listarFuncionario(){
		$query = "SELECT * FROM funcionarios ORDER BY id_funcionario";
		
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
	
	public function verificarLogin() {
		$query = "SELECT * FROM funcionarios 
				WHERE email = '".$this->getEmail()."' 
				AND senha = '".$this->getSenha()."' ";
		
		$resultado = DAO::abreConexao()->runQuery($query);
		
		if (mysql_num_rows($resultado) > 0) {
			
			$dados_funcionario = mysql_fetch_assoc($resultado);
			
			$this->setId_Funcionario($dados_funcionario["id_funcionario"]);
			$this->setNome(utf8_encode($dados_funcionario["nome"]));
			
			return true;
			
		} else {
			
			return false;
			
		}		
	}

	public function paginacaoFuncionario($inicial, $totalregistrospg){
        // Faz o Select pegando o registro inicial até a quantidade de registros para página
        $query = "SELECT * FROM funcionarios order by id_funcionario LIMIT $inicial, $totalregistrospg";
        
        $resultado = DAO::abreConexao()->runQuery($query);

        return $resultado;
        
	}
	
	public function totalFuncionario(){
		$query = "SELECT count(id_funcionario) as total FROM funcionarios";
		
		$resultado  = DAO::abreConexao()->runQuery($query);
		
		$total = mysql_fetch_assoc($resultado);
		
		return $total["total"]; //total é o "as total" que foi feito no select
	}

	public function verificarcpf(){
		$cpf = mysql_escape_string($_POST['CPF']); 
		$query = "SELECT COUNT(cpf) FROM funcionarios
				  WHERE cpf = '{$cpf}' LIMIT 1";	
		
		$resultado = DAO::abreConexao()->runQuery($query);
		
		$total = mysql_fetch_assoc($resultado);
		
		return $total;
	}

}

?>
