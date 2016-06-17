<?php
class ExperienciasBo {
	
	public static function montaExperiencias() {
		$experiencias = array();
		$existeExp = true;
		$nExp = 0;

		while ( $existeExp ) {
			$nExp += 1;
			if (! isset ( $_REQUEST ['curso' . $nExp] )) {
				break;
			} else {
				
				try {
					
					validaCampos ( "empresa" . $nExp );
					validaCampos ( "cargo" . $nExp );
					validaCampos ( "periodoIni" . $nExp );
					validaCampos ( "periodoFim" . $nExp );
				//	validaCampos ( "nomeReferencia" . $nExp );
				//	validaCampos ( "telReferencia" . $nExp );
						
					$experiencia = new ExperienciasDto();
					$experiencia->setEmpresa($_REQUEST["empresa" . $nExp]);
					$experiencia->setFuncao($_REQUEST["cargo" . $nExp]);
					$experiencia->setInicio($_REQUEST["periodoIni" . $nExp]);
					$experiencia->setFim($_REQUEST["periodoFim" . $nExp]);
				//	$experiencia->set($_REQUEST["nomeReferencia" . $nExp]);
				//	$experiencia->setFim($_REQUEST["telReferencia" . $nExp]);
					
					$experiencias[] = $experiencia;
					
					
				} catch ( Exception $e ) {
					die ( $e->getMessage () );
				}
			}
		}
		
		return $experiencias;
	}
		
}

