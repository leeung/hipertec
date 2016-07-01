<?php
class CurriculoDao {
	private $conn;
	public function __construct() {
		$this->conn = Connection::getConnection ();
	}
	public function novoCurriculo(CurriculoDto $curriculoDto) {
		$QUERY_INSERT_CURRICULO = "INSERT INTO curriculum( aluno_id, resumo, infoAdd ) VALUES (?,?,?)";
		
		try {
			$stm = $this->conn->prepare ( $QUERY_INSERT_CURRICULO );
			$stm->bindParam ( 1, $curriculoDto->getAluno()->getId() );
			$stm->bindParam ( 2, $curriculoDto->getResumo () );
			$stm->bindParam ( 3, $curriculoDto->getInfoAdicional() );
			$result = $stm->execute ();
			
			return $result;
		} catch ( PDOException $e ) {
			die( $e->getMessage ()."curriculoDao");
		}
	}
	
	
	public function existeCurriculo($cpf) {
		$QUERY_EXISTE_CURRICULO = "SELECT ID FROM curriculum WHERE ALUNO_ID=(SELECT ID FROM ALUNO WHERE CPF=?)";
		
		try {
			$stm = $this->conn->prepare ( $QUERY_EXISTE_CURRICULO );
			$stm->bindParam ( 1, $cpf, PDO::PARAM_STR );
			$stm->execute ();
			
			if ($stm->rowCount() > 0)
				return true;
			
			return false;
			
		} catch ( Exception $e ) {
			die( $e->getMessage ()."curriculoDao");
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
			$curriculo->setInfoAdicional( $result ['infoAdd'] );
			
			return $curriculo;
			
		} catch ( PDOException $e ) {
			die( $e->getMessage ()."curriculoDao");
		}
	}
	
	
	public function alterar(CurriculoDto $curriculo) {
		$QUERY_ALTERAR_CURRICULO = "update curriculum set resumo=?, infoAdd=? where aluno_id=(select id from aluno where cpf=?)";
		
		try {
			$stm = $this->conn->prepare ( $QUERY_ALTERAR_CURRICULO );
			$stm->bindParam ( 1, $curriculo->getResumo());
			$stm->bindParam ( 2, $curriculo->getInfoAdicional());
			$stm->bindParam ( 3, $curriculo->getAluno ()->getCpf ());
			
			$result = $stm->execute ();
			
			if (!$stm->rowCount() > 0) return false;
		
		} catch ( PDOException $e ) {
			die( $e->getMessage ()."curriculoDao");
		}
	}
}