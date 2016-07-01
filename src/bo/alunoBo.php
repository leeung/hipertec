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
	
	public function delete($cpf){
		
		$alunoDao = new AlunoDao();
		return $alunoDao->delete($cpf);
		
	}
	
	public function existeAluno($cpf){
		$alunoDao = new AlunoDao();
		return $alunoDao->existeAluno($cpf);
		
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
			$aluno->setEstadoCivil($_REQUEST['estadoCivil']);
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
	
	
	
}