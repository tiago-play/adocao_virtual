<?php
/**
 * Essa é a classe base de Cliente e Funcionario.
 *
 */

abstract class PessoaModel {
   private   $status;
   private   $nome;
   private   $sexo;
   private   $rg;
   private   $cpf;
   private	 $email;
   private   $senha;
   private   $telefone;
   private   $celular;
   private   $dt_nascimento;
   private   $endereco;
   private   $numero;
   private   $bairro;
   private   $complemento;
   private   $cep;
   private   $cidade;
   private   $estado;
	
	public function getBairro() {
		return $this->bairro;
	}
	
	public function getCelular() {
		return $this->celular;
	}
	
	public function getCep() {
		return $this->cep;
	}
	
	public function getCidade() {
		return $this->cidade;
	}
	
	public function getComplemento() {
		return $this->complemento;
	}
	
	public function getCpf() {
		return $this->cpf;
	}
	
	public function getDt_nascimento() {
		return $this->dt_nascimento;
	}
	
	public function getEndereco() {
		return $this->endereco;
	}
	
	public function getEstado() {
		return $this->estado;
	}
	
	public function getNome() {
		return $this->nome;
	}
	
	public function getRg() {
		return $this->rg;
	}
	
	public function getNumero() {
		return $this->numero;
	}

	public function getSenha() {
		return $this->senha;
	}
	
	public function getSexo() {
		return $this->sexo;
	}
	
	public function getStatus() {
		return $this->status;
	}
	
	public function getTelefone() {
		return $this->telefone;
	}

	public function getEmail() {
		return $this->email;
	}
	
	public function setEmail($email) {
		$this->email = $email;
	}

	public function setNumero($numero) {
		$this->numero = $numero;
	}
	
	public function setBairro($bairro) {
		$this->bairro = $bairro;
	}
	
	public function setCelular($celular) {
		$this->celular = $celular;
	}
	
	public function setCep($cep) {
		$this->cep = $cep;
	}
	
	public function setCidade($cidade) {
		$this->cidade = $cidade;
	}
	
	public function setComplemento($complemento) {
		$this->complemento = $complemento;
	}
	
	public function setCpf($cpf) {
		$this->cpf = $cpf;
	}
	
	public function setDt_nascimento($dt_nascimento) {
		$this->dt_nascimento = $dt_nascimento;
	}
	
	public function setEndereco($endereco) {
		$this->endereco = $endereco;
	}
	
	public function setEstado($estado) {
		$this->estado = $estado;
	}
	
	public function setNome($nome) {
		$this->nome = $nome;
	}
	
	public function setRg($rg) {
		$this->rg = $rg;
	}
	
	public function setSenha($senha) {
		$this->senha = $senha;
	}
	
	public function setSexo($sexo) {
		$this->sexo = $sexo;
	}
	
	public function setStatus($status) {
		$this->status = $status;
	}
	
	public function setTelefone($telefone) {
	    $this->telefone = $telefone;
	}
	
    function __construct(){
    	
 	}
}

?>
