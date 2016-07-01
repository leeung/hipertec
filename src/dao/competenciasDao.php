<?php

class CompetenciasDao {
	private $con;
	
	public function __construct(){
		$this->con = Connection::getConnection();
	}
	
	public function getCompetenciasByCurriculoId($id, $dados){
		$QUERY_COMPETENCIAS_BY_IDCURRICULO = 
		"SELECT * FROM COMPETENCIAS WHERE CURRICULUM_ID = ?";
		
		try{
			$stm = $this->con->prepare($QUERY_COMPETENCIAS_BY_IDCURRICULO);
			$stm->bindParam(1, $id);
			$stm->execute();
			
			
			$result = $stm->fetchAll(PDO::FETCH_ASSOC);
			
			
			if($stm->rowCount() > 0){
				foreach ($result as $row){
					$competencias = new CompetenciasDto();
					$competencias->setId($row['id']);
					$competencias->setCurso($row['curso']);
					$competencias->setInstituicao($row['instituicao']);
					$competencias->setCargaHoraria($row['cargahoraria']);
					$competencias->setNivel($row['nivel']);
					$competencias->setStatus($row['status']);
					$competencias->setCurriculumId($row['curriculum_id']);
					$competencias->setConclusao($row['conclusao']);
					$dados[] = $competencias;
				}
				
			}
			
			return $dados;
			
		}catch (PDOException $e){
			die($e->getMessage()."competenciasDao");
		}
		
	}
	
	public function inserir(CompetenciasDto $competencia){
		$QUERY_INSERT_NOVO_COMPETENCIA ="insert into competencias(curso, instituicao, cargahoraria, nivel, status, curriculum_id, conclusao)
values(?,?,?,?,?,?,?);";
		
		echo "inserindo Competencia";
		
		try {
			$stm = $this->conn->prepare ( $QUERY_INSERT_NOVO_COMPETENCIA );
			$stm->bindParam ( 1, $competencia->getCurso() );
			$stm->bindParam ( 2, $competencia->getInstituicao() );
			$stm->bindParam ( 3, $competencia->getCargaHoraria());
			$stm->bindParam ( 4, $competencia->getNivel() );
			$stm->bindParam ( 5, $competencia->getStatus());
			$stm->bindParam ( 6, $competencia->getCurriculumId());
			$stm->bindParam ( 7, FormatData::dateToSql($competencia->getConclusao() ));
		
			$result = $stm->execute ();
		
		} catch ( PDOException $e ) {
			echo $e->getMessage ();
		}
	}
}
