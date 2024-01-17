<?php
	class Dao {
		
		/* Variáveis Globais */
		private $servidor;
		private $usuario;
		private $senha;
		private $banco;
		private $conn;
		private $resultado;
		private $sql;
		
		/* Método Construtor */
		public function __construct($server, $user, $pass, $banco) {		
			$this->setServidor($server);
			$this->setUsuario($user);
			$this->setSenha($pass);
			$this->setBanco($banco);	
		}
		
		/* Sets */
		public function setServidor($server) {
			$this->servidor = $server;
		}		
		public function setUsuario($user) {
			$this->usuario = $user;
		}		
		public function setSenha($pass) {
			$this->senha = $pass;
		}		
		public function setBanco($banco) {
			$this->banco = $banco;
		}
		
		/* Método que abre a conexão com o Banco de Dados */
		public function connDB() {		
			$this->conn = mysql_connect($this->servidor, $this->usuario, $this->senha);
			if(!$this->conn) {
				exit("<p>Não foi possível conectar-se ao servidor MySQL. <br>Erro MySQL: ".mysql_error()."</p>");
			} elseif (!mysql_select_db($this->banco, $this->conn)) {
				exit("<p>Não foi possível selecionar o banco de dados desejado. <br>Erro MySQL: ".mysql_error()."</p>");
			}
		}
		
		/* Método que fecha a conexãoo com o Banco de Dados */
		public function closeConnDB() {
			return mysql_close($this->conn);
		}
		
		/* Método que executa comando SQL */
		public function runQuery($sql) {
			$this->connDB();
			$this->sql = $sql;
			$this->resultado = mysql_query($this->sql);
			if($this->resultado) {
				$this->closeConnDB();
				return $this->resultado;
			} else {
				$this->closeConnDB();
				//exit("<p>Não foi possível executar o comando solicitado.<br>Erro MySQL: ".mysql_error()."</p>");
				exit("<p>Não foi possível executar o comando solicitado.<br>Comando com problema: ".$this->sql."</p>");
			}
		}
		
		/* Método instância um objeto da classe de conexão */
		static public function abreConexao() {
			
			$dao = new Dao("localhost", "root", "", "adocao_virtual");
			return $dao;
		}	
			
	}
?>