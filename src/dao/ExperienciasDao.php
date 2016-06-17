<?php
class ExperienciasDao {
	private $con;
	public function __construct() {
		$this->con = Connection::getConnection ();
	}
	public function listExperienciasByCurriculumId($id) {
		$QUERY_EXPERIENCIAS_BY_CURRICULUMID = "SELECT * FROM EXPERIENCIAS WHERE CURRICULUM_ID = ?";
		
		try {
			$stm = $this->con->prepare ( $QUERY_EXPERIENCIAS_BY_CURRICULUMID );
			$stm->bindParam ( 1, $id );
			$stm->execute ();
			
			$result = $stm->fetchAll ( PDO::FETCH_ASSOC );
			
			$dados = array ();
			if ($stm->rowCount () > 0) {
				foreach ( $result as $row ) {
					$exper = new ExperienciasDto ();
					$exper->setId ( $row ['id'] );
					$exper->setEmpresa ( $row ['empresa'] );
					$exper->setFuncao ( $row ['funcao'] );
					$exper->setInicio ( $row ['inicio'] );
					$exper->setFim ( $row ['fim'] );
					$exper->setCurriculumId ( $row ['curriculum_id'] );
					
					$dados [] = $exper;
				}
			}
			
			return $dados;
		} catch ( PDOException $e ) {
			die ( $e->getMessage () );
		}
	}
	
	public function alterar($experiencias, $cpf) {
		
		foreach ( $experiencias as $row ) {
	
			$QUERY_ALTERAR_EXP = "update experiencias set empresa=? where id=? and curriculum_id = (select id from curriculum where aluno_id=(select id from aluno where cpf=?))";

			try {
	
				$stm = $this->con->prepare($QUERY_ALTERAR_EXP);
				$stm->bindParam(1, $row->getEmpresa());
				$stm->bindParam(2, $row->getId());
				$stm->bindParam ( 3, $cpf );
	
				$stm->execute ();
	

			} catch ( PDOException $e ) {
				die ( $e->getMessage () );
			}
			
		}
		
	}
}