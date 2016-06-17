<?php
class CompetenciasBo {
	public static function montaCompetencias() {
		$competencia = array();
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
					// validaCampos("cargahoraria".$nCurso);
					// validaCampos("nivel".$nCurso);
					validaCampos ( "status" . $nCurso );
					validaCampos ( "anoConclusao" . $nCurso );
					
					$competencia = new CompetenciasDto();
					$competencia->setCurso($_REQUEST["curso" . $nCurso]);
					$competencia->setInstituicao($_REQUEST["instituicao" . $nCurso]);
					$competencia->setStatus($_REQUEST["status" . $nCurso]);
					$competencia->setConclusao($_REQUEST["anoConclusao" . $nCurso]);
					
					$competencias[] = $competencia;
					
					
				} catch ( Exception $e ) {
					die ( $e->getMessage () );
				}
			}
		}
		
		return $competencias;
	}

}

