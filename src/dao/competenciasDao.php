<?php

class CompetenciasDao {
	private $con;
	
	public function __construct(){
		$this->con = Connection::getConnection();
	}
	
	public function getCompetenciasByCurriculoId($id){
		$QUERY_COMPETENCIAS_BY_IDCURRICULO = 
		"SELECT * FROM COMPETENCIAS WHERE CURRICULUM_ID = ?";
		
		try{
			$stm = $this->con->prepare($QUERY_COMPETENCIAS_BY_IDCURRICULO);
			$stm->bindParam(1, $id);
			$stm->execute();
			
			
			$result = $stm->fetchAll(PDO::FETCH_ASSOC);
			
			$dados = array();
			
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
}
