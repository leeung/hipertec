<?php
class alunoBo {
	private $conn;
	private $alunoDao;
	
	public function __construct() {
		include 'dao/AlunoDAO.php';
		include 'DTO/AlunoDTO.php';
		
		$this->alunoDao = new AlunoDao();
	}
	public function novo() {
		$alunoDto = new alunoDto();
		self::montarAluno($alunoDto);
		
		$alunoDao = new AlunoDao();
		
		$id =  $alunoDao->inserir($alunoDto);
		
		return $id;
		
	}
	
	public function listar() {
		
		$alunos = $this->alunoDao->listar();
		
		$dados = array();
		$dados['alunos'] = $alunos;
		
		View::getGui("alunoList", $dados);
	}
	
	public function listAlunoByCpf($cpf){
		$result = $this->alunoDao->listAlunoByCpf($cpf);
		$aluno = new alunoDto();
		$aluno->setId($result['id']);
		$aluno->setCpf($result['cpf']);
		$aluno->setNome($result['nome']);
		$aluno->setSobreNome($result['sobreNome']);
		$aluno->setIdade($result['idade']);
		$aluno->setNacionalidade($result['nacionalidade']);
		$aluno->setSexo($result['sexo']);
		$aluno->setFoto($result['foto']);
		$aluno->setEmail($result['email']);
		$aluno->setLinkedin($result['linkedin']);
		$aluno->setFacebook($result['facebook']);
		$aluno->setEndereco($this->alunoDao->listEnderecoByCpf($cpf));
		
		return $aluno;
	}
	
	
	
	public static function montarAluno(alunoDto $aluno){
		
		
		try{
			validaCampos("cpf");
			validaCampos("nome");
			validaCampos("idade");
			validaCampos("telefone");
			validaCampos("email");
			validaCampos("nacionalidade");
			validaCampos("sexo");
			validaCampos("estadoCivil");
			//validaCampos("foto");
			//validaCampos("email");
			//validaCampos("linkedin");
			//validaCampos("facebook");
				
				
				
			$aluno->setCpf($_REQUEST['cpf']);
			$aluno->setNome($_REQUEST['nome']);
			$aluno->setIdade($_REQUEST['idade']);
			$aluno->setTelefone($_REQUEST['telefone']);
			$aluno->setEmail($_REQUEST['email']);
			$aluno->setNacionalidade($_REQUEST['nacionalidade']);
			$aluno->setSexo($_REQUEST['sexo']);
			$aluno->setFoto($_REQUEST['foto']);
			$aluno->setEmail($_REQUEST['email']);
			$aluno->setLinkedin($_REQUEST['linkedin']);
			$aluno->setFacebook($_REQUEST['facebook']);
			
			EnderecoBo::montarEndereco($aluno->getEndereco());
			
		}catch (Exception $e){
			die($e->getMessage());
		}
	}
	
	public static function validaCamposAluno(){
		$retorno = false;
		
		if(!isset($_REQUEST['cpf'])) throw  new Exception("Falta campo CPF");
		if(!isset($_REQUEST['nome'])) throw  new Exception("Falta campo NOME");
		if(!isset($_REQUEST['idade'])) throw  new Exception("Falta campo IDADE");
		$retorno = EnderecoBo::validaCamposEndereco();
		if(!isset($_REQUEST['telefone'])) throw  new Exception("Falta campo TELEFONE");
		if(!isset($_REQUEST['email'])) throw  new Exception("Falta campo EMAIL");
		if(!isset($_REQUEST['nacionalidade'])) throw  new Exception("Falta campo NACIONALIDADE");
		if(!isset($_REQUEST['sexo'])) throw  new Exception("Falta campo SEXO");
		if(!isset($_REQUEST['estadoCivil'])) throw  new Exception("Falta campo ESTADO CIVIL");
		//if(!isset($_REQUEST['foto'])) throw  new Exception("Falta campo FOTO");
		//if(!isset($_REQUEST['linkedin'])) throw  new Exception("Falta campo LINKEDIN");
		//if(!isset($_REQUEST['facebook'])) throw  new Exception("Falta campo FACEBOOK");
		
		return $retorno;
		
	}
	
	
}