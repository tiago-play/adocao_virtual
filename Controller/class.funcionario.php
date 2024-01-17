<?php

class FuncionarioController extends FuncionarioModel {
	
	public function __construct() {}
	
	public function inserirDadosFuncionario(){
		$this->setTipo(utf8_decode($_POST["tipo"]));   
	    $this->setStatus(utf8_decode($_POST["status"]));  
		$this->setNome(utf8_decode($_POST["nome"])); 
		$this->setSexo(utf8_decode($_POST["sexo"]));
	    $this->setRg(utf8_decode($_POST["rg"]));  
	    $this->setCpf(utf8_decode($_POST["cpf"])); 
	    $this->setEmail(utf8_decode($_POST["email"])); 	    
		$this->setSenha(md5(utf8_decode($_POST["senha"]))); 
	    $this->setTelefone(utf8_decode($_POST["telefone"])); 
	    $this->setCelular(utf8_decode($_POST["celular"]));
		$this->setEndereco(utf8_decode($_POST["endereco"])); 
		$this->setNumero(utf8_decode($_POST["numero"])); 
		$this->setBairro(utf8_decode($_POST["bairro"]));
        $this->setComplemento(utf8_decode($_POST["complemento"]));
		$this->setCep(utf8_decode($_POST["cep"]));
		$this->setEstado(utf8_decode($_POST["estado"]));
		$this->setCidade(utf8_decode($_POST["cidade"]));
	    
	    //$data = implode("-", array_reverse(explode("/", $_POST["data"])));
		//$this->setDt_nascimento($data);
		
		$data = $_POST["dt_nascimento"];
		$this->setDt_nascimento($this->gravaData($data));
		
	    $resultado = $this->inserirFuncionario();
	    
	    return $resultado;
	}
	
	public function editarDadosFuncionario(){
				
		$this->setId_Funcionario(utf8_decode($_POST["id_funcionario"]));
		$this->consultarFuncionario();
		
		$this->setTipo(utf8_decode($_POST["tipo"]));   
	    $this->setStatus(utf8_decode($_POST["status"]));  
		$this->setNome(utf8_decode($_POST["nome"])); 
		$this->setSexo(utf8_decode($_POST["sexo"]));
	    $this->setRg(utf8_decode($_POST["rg"]));  
	    $this->setCpf(utf8_decode($_POST["cpf"])); 
		$this->setEmail(utf8_decode($_POST["email"]));
	    $this->setTelefone(utf8_decode($_POST["telefone"])); 
	    $this->setCelular(utf8_decode($_POST["celular"]));
		$this->setEndereco(utf8_decode($_POST["endereco"])); 
		$this->setNumero(utf8_decode($_POST["numero"])); 
		$this->setBairro(utf8_decode($_POST["bairro"]));
        $this->setComplemento(utf8_decode($_POST["complemento"]));
		$this->setCep(utf8_decode($_POST["cep"]));
		$this->setEstado(utf8_decode($_POST["estado"]));
		$this->setCidade(utf8_decode($_POST["cidade"]));
	    
		/*essa linha faz com que a senha do funcionario cujo id_funcionario foi verificado acima, pelo
		*  metodo consultar funcionario da classe FuncionarioModel.
		*/
		$senha = ($_POST["senha"] != "") ? md5($_POST["senha"]) : $this->getSenha();
		$this->setSenha($senha);
		
		$data = $this->gravaData($_POST["dt_nascimento"]);
		$this->setDt_nascimento($data);
		
		$resultado = $this->editarFuncionario();
		
	    return $resultado;
	}
	
	public function consultarDadosFuncionario(){
		$this->setId_Funcionario(utf8_decode($_POST["id_funcionario"]));
		return $this->consultarFuncionario();
	}
	
	public function listarDadosFuncionario(){
		return $this->listarFuncionario();	
	}
	
	public function deletarDadosFuncionario(){
		$this->setId_Funcionario(utf8_decode($_POST["id_funcionario"]));   
	    return $this->deletarFuncionario();
	}
	
	public function get_post_action($name){
		$params = func_get_args();
	    foreach ($params as $name){
	       	if (isset($_POST[$name])){
	          	return $name;
	        }
	    }
	}

	// Passando data do text box "DD/MM/AAAA" para "AAAA-MM-DD"
	public function gravaData($data){
		if ($data != '') {
			$dataformatada = explode("/",$data);
			return $dataformatada[2]."-".$dataformatada[1]."-".$dataformatada[0];
		}else {
			return false;
		}
	}

	public function paginacaoDadosFuncionario($paginaatual = 1, $totalregistrospg = 10){
		//$totalregistrospg é o total de registros por página
		
      	$paginaatual = ($paginaatual <= 0) ? 1 : $paginaatual; 
		
        $inicial = ($paginaatual-1) * $totalregistrospg;
        
        return $this ->paginacaoFuncionario($paginaatual, $totalregistrospg);
	}
}

?>