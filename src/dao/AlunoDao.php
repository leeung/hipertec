<?php
class AlunoDao {
	private $conn;
	public function __construct() {
		$this->conn = Connection::getConnection ();
	}
	public function inserir(AlunoDTO $aluno) {
		$result = null;
		$sql = 'insert into aluno
				(nome, idade, telefone, nacionalidade,estadoCivil, sexo, foto, email, linkedin, facebook, cpf)
				values(?,?,?,?,?,?,?,?,?,?,?);';
		echo "tentando inserir um aluno";
		
		try {
			$stm = $this->conn->prepare ( $sql );
			$stm->bindParam ( 1, $aluno->getNome () );
			$stm->bindParam ( 2, $aluno->getIdade () );
			$stm->bindParam ( 3, $aluno->getTelefone () );
			$stm->bindParam ( 4, $aluno->getNacionalidade () );
			$stm->bindParam ( 5, $aluno->getEstadoCivil() );			
			$stm->bindParam ( 6, $aluno->getSexo () );
			$stm->bindParam ( 7, $aluno->getFoto () );
			$stm->bindParam ( 8, $aluno->getEmail () );
			$stm->bindParam ( 9, $aluno->getLinkedin () );
			$stm->bindParam ( 10, $aluno->getFacebook () );
			$stm->bindParam ( 11, $aluno->getCpf() );
			
			$result = $stm->execute ();
			
			
		} catch ( PDOException $e ) {
			die( $e->getMessage ()."alunoDao");
		}
		
		return $id = $this->conn->lastInsertId();
	}
	public function listar() {
		$alunos = array ();
		$enderecoDao = new enderecoDao ();
		
		$QUERY_ALUNO_LISTAR = "SELECT * FROM ALUNO";
		
		try {
			
			$stm = $this->conn->prepare ( $QUERY_ALUNO_LISTAR );
			$stm->execute ();
			$result = $stm->fetchAll ( PDO::FETCH_ASSOC );
			
			if (! $result)
				throw new Exception ( "somente um tese" );
			
			foreach ( $result as $row ) {
				$aluno = new alunoDto ();
				
				$aluno->setId ( $row ['id'] );
				$aluno->setNome ( $row ['nome'] );
				$aluno->setSobreNome ( $row ['sobreNome'] );
				$aluno->setIdade ( $row ['idade'] );
				$aluno->setEndereco ( $enderecoDao->getEnderecoById ( $row ['id'] ) );
				$aluno->setTelefone ( $row ['telefone'] );
				$aluno->setEmail ( $row ['email'] );
				$aluno->setNacionalidade ( $row ['nacionalidade'] );
				$aluno->setSexo ( $row ['sexo'] );
				$aluno->setEstadoCivil($row['estadoCivil']);
				$aluno->setFoto ( $row ['foto'] );
				$aluno->setLinkedin ( $row ['linkedin'] );
				$aluno->setNacionalidade ( $row ['facebook'] );
				
				$alunos [] = $aluno;
			}
			
			return $alunos;
		} catch ( Exception $e ) {
			die( $e->getMessage ()."alunoDao");
		}
	}
	
	
	public function alterar(AlunoDto $aluno) {
		$QUERY_ALTERAR_ALUNO = "UPDATE ALUNO SET NOME=? WHERE CPF=?";
		
		$QUERY_ALTERAR_ALUNO = "UPDATE ALUNO SET 
				NOME=?, IDADE=?, TELEFONE=?,NACIONALIDADE=?,
				ESTADOCIVIL=?, SEXO=?, FOTO=?, EMAIL=?, LINKEDIN=?, FACEBOOK=? WHERE CPF=?";
		
		
		try {
			$stm = $this->conn->prepare ( $QUERY_ALTERAR_ALUNO );
			$stm->bindParam ( 1, $aluno->getNome());
			$stm->bindParam ( 2, $aluno->getIdade());
			$stm->bindParam ( 3, $aluno->getTelefone());
			$stm->bindParam ( 4, $aluno->getNacionalidade());
			$stm->bindParam ( 5, $aluno->getEstadoCivil());
			$stm->bindParam ( 6, $aluno->getSexo());
			$stm->bindParam ( 7, $aluno->getFoto());
			$stm->bindParam ( 8, $aluno->getEmail());
			$stm->bindParam ( 9, $aluno->getLinkedin());
			$stm->bindParam ( 10, $aluno->getFacebook());
			$stm->bindParam ( 11, $aluno->getCpf());
			
			$result = $stm->execute ();
			
			if (!$stm->rowCount() > 0) return false;
		
		} catch ( PDOException $e ) {
			die( $e->getMessage ()."alunoDao");
		}
	}
	
	
	public function delete($cpf) {
		$QUERY_ALUNO_DELETE = "delete from aluno where cpf=?";
	
		try {
				
			$stm = $this->conn->prepare ( $QUERY_ALUNO_DELETE );
			$stm->bindParam ( 1, $cpf );
			$stm->execute ();
			
			if($stm->rowCount() > 0)
				return true;
			
			return false;
				
		} catch ( PDOException $e ) {
			die( $e->getMessage ()."alunoDao");
		}
		
		
	}
	
	public function listAlunoByCpf($cpf) {
		$QUERY_LIST_ALUNO_BY_CPF = "SELECT * FROM ALUNO WHERE CPF= ?";
		
		try {
			
			$stm = $this->conn->prepare ( $QUERY_LIST_ALUNO_BY_CPF );
			$stm->bindParam ( 1, $cpf );
			$stm->execute ();
			
			$result = $stm->fetch ( PDO::FETCH_ASSOC );
			
			$alunoDto = new alunoDto ();
			$alunoDto->setId ( $result['id'] );
			$alunoDto->setCpf($result['cpf']);
			$alunoDto->setNome($result['nome']);
			$alunoDto->setSobreNome($result['sobreNome']);
			$alunoDto->setIdade($result['idade']);
			
			$enderecoDao = new EnderecoDao();
			$alunoDto->setEndereco($enderecoDao->getEnderecoById($alunoDto->getId()));
			$alunoDto->setTelefone($result['telefone']);
			$alunoDto->setEmail($result['email']);
			$alunoDto->setNacionalidade($result['nacionalidade']);
			$alunoDto->setSexo($result['sexo']);
			$alunoDto->setEstadoCivil($result['estadoCivil']);
			$alunoDto->setFoto($result['foto']);
			$alunoDto->setLinkedin($result['linkedin']);
			$alunoDto->setFacebook($result['facebook']);
			
			return $alunoDto;
			
		} catch ( PDOException $e ) {
			die( $e->getMessage ()."alunoDao");
		}
	}
	
	public function existeAluno($cpf) {
		$QUERY_EXISTE_ALUNO = "select id from aluno where cpf=?";
		
		try {
			$stm = $this->conn->prepare ( $QUERY_EXISTE_ALUNO );
			$stm->bindParam ( 1, $cpf, PDO::PARAM_STR );
			$stm->execute ();
			
			if ($stm->rowCount() > 0)
				return true;
			
			return false;
			
		} catch ( Exception $e ) {
			die( $e->getMessage ()."alunoDao");
		}
	}
}