<?php
class CurriculoDao {
	private $conn;
	public function __construct() {
		$this->conn = Connection::getConnection ();
	}
	public function novoCurriculo(CurriculoDto $curriculoDto) {
		$QUERY_INSERT_CURRICULO = "INSERT INTO curriculum( aluno_id, resumo ) VALUES (?, ?)";
		
		try {
			$stm = $this->conn->prepare ( $QUERY_INSERT_CURRICULO );
			$stm->bindParam ( 1, $curriculoDto->getAluno () );
			$stm->bindParam ( 2, $curriculoDto->getResumo () );
			$result = $stm->execute ();
			
			return $result;
		} catch ( PDOException $e ) {
			echo $e->getMessage ();
		}
	}
	
	
	public function existeCurriculo($cpf) {
		$QUERY_EXISTE_CURRICULO = "SELECT ID FROM curriculum WHERE ALUNO_ID=(SELECT ID FROM ALUNO WHERE CPF=?)";
		
		try {
			$stm = $this->conn->prepare ( $QUERY_EXISTE_CURRICULO );
			$stm->bindParam ( 1, $cpf, PDO::PARAM_STR );
			
			if (! $stm->execute ())
				throw new Exception ( "Um erro fatal foi gerado" );
			
			if ($stm->rowCount () > 0)
				return true;
			
			return false;
			
		} catch ( Exception $e ) {
			echo $e->getMessage ();
		}
	}
	
	
	public function listCurriculoByCpf($cpf) {
		$curriculo = new CurriculoDto ();
		
		try {
			$QUERY_CURRICULO = "SELECT * FROM curriculum WHERE ALUNO_ID=(SELECT ID FROM ALUNO WHERE CPF=?)";
			$stm = $this->conn->prepare ( $QUERY_CURRICULO );
			$stm->bindParam ( 1, $cpf );
			$stm->execute ();
			
			$result = $stm->fetch ( PDO::FETCH_ASSOC );
			
			$curriculo->setId ( $result ['id'] );
			$curriculo->setResumo ( $result ['resumo'] );
			
			return $curriculo;
			
		} catch ( PDOException $e ) {
			die ( $e->getMessage () );
		}
	}
	
	
	public function alterar(CurriculoDto $curriculo) {
		$QUERY_ALTERAR_CURRICULO = "update curriculum set resumo=? where aluno_id=(select id from aluno where cpf=?)";
		
		try {
			$stm = $this->conn->prepare ( $QUERY_ALTERAR_CURRICULO );
			$stm->bindParam ( 1, $curriculo->getResumo());
			$stm->bindParam ( 2, $curriculo->getAluno ()->getCpf ());
			
			$result = $stm->execute ();
			
			if (!$stm->rowCount() > 0) return false;
		
		} catch ( PDOException $e ) {
			die($e->getMessage());
		}
	}
}