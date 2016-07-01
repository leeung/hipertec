<?php
class CompetenciasBo {
	
	public static function montaCompetencias($competencias = array()) {
		$existeCurso = true;
		$nCurso = 0;

		while ( $existeCurso ) {
			$nCurso += 1;
			if (! isset ( $_REQUEST ['curso' . $nCurso] )) {
				break;
			} else {
				
				try {
					
					validaCampos ( "curso" . $nCurso );
					validaCampos ( "instituicao" . $nCurso );
					validaCampos("cargaHoraria".$nCurso);
					validaCampos("nivel".$nCurso);
					validaCampos ( "status" . $nCurso );
					validaCampos ( "conclusao" . $nCurso );
					
					$competencia = new CompetenciasDto();
					$competencia->setCurso($_REQUEST["curso" . $nCurso]);
					$competencia->setInstituicao($_REQUEST["instituicao" . $nCurso]);
					$competencia->setInstituicao($_REQUEST["cargaHoraria" . $nCurso]);
					$competencia->setStatus($_REQUEST["nivel" . $nCurso]);
					$competencia->setStatus($_REQUEST["status" . $nCurso]);
					$competencia->setConclusao($_REQUEST["conclusao" . $nCurso]);
					
					$competencias[] = $competencia;
					
					
				} catch ( Exception $e ) {
					die ( $e->getMessage () );
				}
			}
		}
		
		return $competencias;
	}
	
	public function novo(){
		$competenciaDao = new CompetenciasDao();
		$competencias = array();
		
		self::montaCompetencias($competencias);
		
		foreach ($competencias as $competencia){
			print_r($competencia);
		}
		
	}

}

