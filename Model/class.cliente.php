<?php

class ClienteModel extends PessoaModel  {
	private $id_cliente;
	
	public function  getId_Cliente() {
		return $this->id_cliente;
	}
	
	public function  setId_Cliente($id_cliente){
		$this->id_cliente = $id_cliente;
	}

	public function __construct()
		{
		
	}

	public function inserirCliente(){
		$query = "INSERT INTO clientes(
		status,nome,sexo,rg,cpf,email,senha,telefone,celular,dt_nascimento,
		endereco,numero,bairro,complemento,cep,cidade,estado) VALUES(
		'".$this->getStatus()."',      '".$this->getNome()."',    '".$this->getSexo()."',
		'".$this->getRg()."',          '".$this->getCpf()."',     
		'".$this->getEmail()."',	   '".$this->getSenha()."',
		'".$this->getTelefone()."',    '".$this->getCelular()."', '".$this->getDt_nascimento()."',
		'".$this->getEndereco()."',    '".$this->getNumero()."',  '".$this->getBairro()."',
		'".$this->getComplemento()."', '".$this->getCep()."',     '".$this->getCidade()."',
		'".$this->getEstado()."')";
		
		$resultado = DAO::abreConexao()->runQuery($query);
		
		if ($resultado) {
			return $this->ultimoCliente();
		} else {
			return false;
		}
	}
	
	public function ultimoCliente(){
		$query = "SELECT MAX(id_cliente) as ultimo FROM clientes";
		
		$resultado = DAO::abreConexao()->runQuery($query);
		
		$dados = mysql_fetch_assoc($resultado);
		
		return $dados["ultimo"];
	}

	public function editarCliente(){
		$query = "UPDATE clientes SET
		status='".$this->getStatus()."',           nome='".$this->getNome()."',       sexo='".$this->getSexo()."',
		rg='".$this->getRg()."',                   cpf='".$this->getCpf()."',         telefone='".$this->getTelefone()."',
		email='".$this->getEmail()."',			   senha='".$this->getSenha()."',
		celular='".$this->getCelular()."',         dt_nascimento='".$this->getDt_nascimento()."',
		endereco='".$this->getEndereco()."',       numero='".$this->getNumero()."',     bairro='".$this->getBairro()."',
		complemento='".$this->getComplemento()."', cep='".$this->getCep()."',         cidade='".$this->getCidade()."',
		estado='".$this->getEstado()."'            WHERE id_cliente='".$this->getId_Cliente()."'";
		
		$resultado = DAO::abreConexao()->runQuery($query);
		
		return $resultado;
	}
		
	public function deletarCliente(){
		$query = "DELETE FROM clientes WHERE id_cliente='".$this->getId_Cliente()."'";
		
		$resultado = DAO::abreConexao()->runQuery($query);
		
		return $resultado;
	}
		
	public function consultarCliente(){
	    $query = "SELECT * FROM clientes WHERE id_cliente='".$this->getId_Cliente()."'";
		
	    $resultado = DAO::abreConexao()->runQuery($query);
	    
	    
	     if (mysql_num_rows($resultado) > 0) {
	    	
	    	$dados_cliente = mysql_fetch_assoc($resultado);
	    	
	        $this->setStatus($dados_cliente["status"]);  //usar o utf8 somente onde for alfa numerico
	    	$this->setNome($dados_cliente["nome"]); 
	    	$this->setSexo($dados_cliente["sexo"]);
	        $this->setRg(utf8_encode($dados_cliente["rg"]));  
	        $this->setCpf(utf8_encode($dados_cliente["cpf"])); 
	        $this->setEmail(utf8_encode($dados_cliente["email"]));
		    $this->setSenha(utf8_encode($dados_cliente["senha"])); 
	        $this->setTelefone(utf8_encode($dados_cliente["telefone"])); 
	        $this->setCelular(utf8_encode($dados_cliente["celular"]));
	    	$this->setDt_nascimento($this->mostraData($dados_cliente["dt_nascimento"])); 
	    	$this->setEndereco(utf8_encode($dados_cliente["endereco"])); 
	    	$this->setNumero(utf8_encode($dados_cliente["numero"])); 
	    	$this->setBairro(utf8_encode($dados_cliente["bairro"]));
            $this->setComplemento(utf8_encode($dados_cliente["complemento"]));
	    	$this->setCep(utf8_encode($dados_cliente["cep"]));
	    	$this->setCidade(utf8_encode($dados_cliente["cidade"]));
	        $this->setEstado(utf8_encode($dados_cliente["estado"]));
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

	public function verificarLogin(){
		$query = "SELECT * FROM clientes 
				WHERE email = '".$this->getEmail()."' 
				AND senha = '".$this->getSenha()."' ";
		
		$resultado = DAO::abreConexao()->runQuery($query);
		
		if (mysql_num_rows($resultado) > 0) {
			
			$dados_cliente = mysql_fetch_assoc($resultado);
			
			$this->setId_Cliente($dados_cliente["id_cliente"]);
			$this->setNome(utf8_encode($dados_cliente["nome"]));
			
			return true;
			
		} else {
			
			return false;
			
		}	
		
	}
	
	public function listarCliente(){
		$query = "SELECT * FROM clientes ORDER BY id_cliente";
		
		$resultado = DAO::abreConexao()->runQuery($query);
		
		return $resultado;
	}
	
	public function paginacaoCliente($inicial, $totalregistrospg){
        // Faz o Select pegando o registro inicial até a quantidade de registros para página
        $query = "SELECT * FROM clientes order by id_cliente LIMIT $inicial, $totalregistrospg";
        
        $resultado = DAO::abreConexao()->runQuery($query);

        return $resultado;
        
	}
	
	public function totalCliente(){
		$query = "SELECT count(id_cliente) as total FROM clientes";
		
		$resultado  = DAO::abreConexao()->runQuery($query);
		
		$total = mysql_fetch_assoc($resultado);
		
		return $total["total"]; //total é o "as total" que foi feito no select
	}
	
}

?>