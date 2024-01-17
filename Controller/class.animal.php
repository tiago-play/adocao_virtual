<?php
class AnimalController extends AnimalModel {
	public function __construct() {}
	
	public function inserirDadosAnimal(){
		$this->setId_Funcionario(utf8_decode($_POST["id_funcionario"]));
		$this->setNome(utf8_decode($_POST["nome"]));  
		$this->setCor(utf8_decode($_POST["cor"]));
		$this->setRaca(utf8_decode($_POST["raca"]));  
		$this->setProcedencia(utf8_decode($_POST["procedencia"])); 
		$this->setSexo(utf8_decode($_POST["sexo"]));
		$this->setPorte(utf8_decode($_POST["porte"]));
		$this->setTipo(utf8_decode($_POST["tipo"]));
		$this->setEstado(utf8_decode($_POST["estado"]));
		$this->setNome_Imagem(utf8_decode($_POST["nome_imagem"]));
		
		$data = $this->gravaData($_POST["dt_nascimento"]);
		$this->setDt_nascimento($data);
		
		$foto = $_FILES["foto"];
		
		if($foto['type'] == 'image/jpeg'){
			$name = md5(uniqid(rand(), true)).".jpg";            
	        $this->Redimensionar($foto, $name, 150, "animalpequeno");
	        $this->Redimensionar($foto, $name, 600, "animalgrande");
   		}
   		
   		$this->setNome_Imagem($name);
		
		$resultado = $this->inserirAnimal();
		
		return $resultado;
	}
	
	public function editarDadosAnimal(){
		$this->setId_Animal(utf8_decode($_POST["id_animal"]));
		$this->setId_Funcionario(utf8_decode($_POST["id_funcionario"]));
		$this->setDt_Nascimento(utf8_decode($_POST["dt_nascimento"])); 
		$this->setNome(utf8_decode($_POST["nome"]));  
		$this->setCor(utf8_decode($_POST["cor"]));
		$this->setRaca(utf8_decode($_POST["raca"]));  
		$this->setProcedencia(utf8_decode($_POST["procedencia"])); 
		$this->setSexo(utf8_decode($_POST["sexo"]));
		$this->setPorte(utf8_decode($_POST["porte"]));
		$this->setTipo(utf8_decode($_POST["tipo"]));
		$this->setEstado(utf8_decode($_POST["estado"]));
		
		$data = $this->gravaData($_POST["dt_nascimento"]);
		$this->setDt_nascimento($data);
		
		$foto = $_FILES["foto"];
		
		if($foto['type'] == 'image/jpeg'){
			$name = md5(uniqid(rand(), true)).".jpg";            
	        $this->Redimensionar($foto, $name, 150, "animalpequeno");
	        $this->Redimensionar($foto, $name, 600, "animalgrande");
   		}
   		
   		$this->setNome_Imagem($name);
		
		$resultado = $this->editarAnimal();
		
		return $resultado;		
	}
	
	public function consultarDadosAnimal($id){
		$this->setId_Animal($id = $_POST["id_animal"]);
		return $this->consultarAnimal();
	}
	
	public function listarDadosAnimal(){
		$this->setId_Animal(utf8_decode($_POST["id_animal"]));
		return $this->listarAnimal();
	}
	
	public function buscaEstado(){
		$this->setEstado(utf8_decode($_POST["estado"]));
		return $this->listarAnimalPaginacao();
	}
	
	public function deletarDadosAnimal(){
		$this->setId_Animal(utf8_decode($_POST["id_animal"]));
		return $this->deletarAnimal();
	}
	
	public function listarDadosPaginacao($paginaatual = 1, $totalregistrospg = 9){
		$busca = $_GET["busca"];
		//$busca = ($busca == "outros") ? "" : $busca;
		
		$estado = $_GET["estado_animal"];
		
		$paginaatual = ($paginaatual <= 0) ? 1 : $paginaatual; 
		
        $inicial = ($paginaatual-1) * $totalregistrospg;
        
        return $this->listarAnimalPaginacao($busca, $estado, $inicial, $totalregistrospg);
	}
	
	public function redimensionar($imagem, $name, $largura, $pasta){
		$img = imagecreatefromjpeg($imagem['tmp_name']);
	  	$x   = imagesx($img);
	  	$y   = imagesy($img);
		$altura = ($largura * $y)/$x;
		$nova = imagecreatetruecolor($largura, $altura);
		imagecopyresampled($nova, $img, 0, 0, 0, 0, $largura, $altura, $x, $y);
		imagejpeg($nova, "$pasta/$name");
		imagedestroy($img);
		imagedestroy($nova); 
  
   		return $name;
	}
	
	//metodo que faz funcionar os botões do formulário em uma única página
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
}
?>