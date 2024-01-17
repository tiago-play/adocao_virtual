<?php
class ClienteController extends ClienteModel {
	public function __construct(){}
	
	public function inserirDadosCliente(){
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
		$this->setCidade(utf8_decode($_POST["cidade"]));
	    $this->setEstado(utf8_decode($_POST["estado"]));
	    
	    $data = $this->gravaData($_POST["dt_nascimento"]);
		$this->setDt_nascimento($data);
	    
	    $id_cliente = $this->inserirCliente();
	    	    
	    if ($id_cliente) {
	    	$_SESSION["acesso"] = "Liberado";
			$_SESSION["cliente_id"] = $id_cliente;
			$_SESSION["cliente_nome"] = $this->getNome();
	    	return true;
	    } else {
	    	return false;
	    }
	}
	
	public function editarDadosCliente(){
		$this->setId_Cliente(utf8_decode($_POST["id_cliente"]));
		$this->consultarCliente();
		
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
		$this->setCidade(utf8_decode($_POST["cidade"]));
	    $this->setEstado(utf8_decode($_POST["estado"]));
	    
	  	$senha = ($_POST["senha"] != "") ? md5($_POST["senha"]) : $this->getSenha();
		$this->setSenha($senha);
		
		$data = $this->gravaData($_POST["dt_nascimento"]);
		$this->setDt_nascimento($data);
	   
	    $resultado = $this->editarCliente();
	    
	    return $resultado;
	}
	
	public function consultarDadosCliente(){
		$this->setId_Cliente(utf8_decode($_POST["id_cliente"]));
		return $this->consultarCliente();
	}
	
	public function listarDadosCliente(){
		return $this->listarCliente();
	}
	
	public function deletarDadosCliente(){
		$this->setId_Cliente(utf8_decode($_POST["id_cliente"]));
		return $this->deletarCliente();
	}

	public function get_post_action($name){
		$params = func_get_args();
	    foreach ($params as $name){
	       	if (isset($_POST[$name])){
	          	return $name;
	        }
	    }
	}

	public function gravaData($data){
		if ($data != '') {
			$dataformatada = explode("/",$data);
			return $dataformatada[2]."-".$dataformatada[1]."-".$dataformatada[0];
		}else {
			return false;
		}
	}
	
	public function paginacaoDadosCliente($paginaatual = 1, $totalregistrospg = 10){
		//$totalregistrospg é o total de registros por página
		
      	$paginaatual = ($paginaatual <= 0) ? 1 : $paginaatual; 
		
        $inicial = ($paginaatual-1) * $totalregistrospg;
        
        return $this->paginacaoCliente($inicial, $totalregistrospg);
	}
}
?>