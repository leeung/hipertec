<?php
class InformacaoAdicionalDao {
	private $con;
	
	public function __construct() {
		$this->con = Connection::getConnection ();
	}
	
	public function getInfoAddByCurriculumId($id, $dados) {
		$QUERY_INFORADD_BY_CURRICULUMID = "SELECT * FROM INFORMACAOADICIONAL WHERE CURRICULUM_ID = ?";
		
		try {
			$stm = $this->con->prepare ( $QUERY_INFORADD_BY_CURRICULUMID );
			$stm->bindParam ( 1, $id );
			$stm->execute ();
			
			$result = $stm->fetchAll ( PDO::FETCH_ASSOC );
			
			if ($stm->rowCount () > 0) {
				foreach ( $result as $row )
					$infoAdd = new InformacaoAdicionalDto ();
				$infoAdd->setId ( $row ['id'] );
				$infoAdd->setDescricao ( $row ['descricao'] );
				$infoAdd->setCurriculumId ( $row ['curriculum_id'] );
				
				$dados [] = $infoAdd;
			}
			
			return $dados;
		} catch ( PDOException $e ) {
			die ( $e->getMessage () );
		}
	}
	public function alterar($infoAdicionais, $cpf) {
		foreach ( $infoAdicionais as $row ) {
			
			$QUERY_ALTERAR_INFOADD = "update informacaoadicional set descricao=? where curriculum_id = (select id from curriculum where aluno_id=(select id from aluno where cpf=?))";
			
			try {
				
				$stm = $this->con->prepare($QUERY_ALTERAR_INFOADD);
				$stm->bindParam(1, $row->getDescricao ());
				$stm->bindParam ( 2, $cpf );
				
				$stm->execute ();
				
				if ($stm->rowCount () <= 0)
				 	return false;
				
			} catch ( PDOException $e ) {
				die ( $e->getMessage () );
			}
			
		}
	}
}