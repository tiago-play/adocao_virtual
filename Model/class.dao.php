<?php
	class Dao {
		
		/* Vari�veis Globais */
		private $servidor;
		private $usuario;
		private $senha;
		private $banco;
		private $conn;
		private $resultado;
		private $sql;
		
		/* M�todo Construtor */
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
		
		/* M�todo que abre a conex�o com o Banco de Dados */
		public function connDB() {		
			$this->conn = mysql_connect($this->servidor, $this->usuario, $this->senha);
			if(!$this->conn) {
				exit("<p>N�o foi poss�vel conectar-se ao servidor MySQL. <br>Erro MySQL: ".mysql_error()."</p>");
			} elseif (!mysql_select_db($this->banco, $this->conn)) {
				exit("<p>N�o foi poss�vel selecionar o banco de dados desejado. <br>Erro MySQL: ".mysql_error()."</p>");
			}
		}
		
		/* M�todo que fecha a conex�oo com o Banco de Dados */
		public function closeConnDB() {
			return mysql_close($this->conn);
		}
		
		/* M�todo que executa comando SQL */
		public function runQuery($sql) {
			$this->connDB();
			$this->sql = $sql;
			$this->resultado = mysql_query($this->sql);
			if($this->resultado) {
				$this->closeConnDB();
				return $this->resultado;
			} else {
				$this->closeConnDB();
				//exit("<p>N�o foi poss�vel executar o comando solicitado.<br>Erro MySQL: ".mysql_error()."</p>");
				exit("<p>N�o foi poss�vel executar o comando solicitado.<br>Comando com problema: ".$this->sql."</p>");
			}
		}
		
		/* M�todo inst�ncia um objeto da classe de conex�o */
		static public function abreConexao() {
			
			$dao = new Dao("localhost", "root", "", "adocao_virtual");
			return $dao;
		}	
			
	}
?>