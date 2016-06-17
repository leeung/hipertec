<?php
class InformacaoAdicionalBo {
	
	public static function montaInformacaoAdd() {
		$infoAdicionais = array();
		$existeInfoAdd = true;
		$nInfoAdd = 0;

		while ( $existeInfoAdd ) {
			$nInfoAdd += 1;
			if (! isset ( $_REQUEST ['infoAdd' . $nInfoAdd] )) {
				break;
			} else {
				
				try {
					
					self::validaCamposInfoAdd ( "infoAdd" . $nInfoAdd );
						
					$infoAdicional = new InformacaoAdicionalDto();
					$infoAdicional->setDescricao($_REQUEST["infoAdd" . $nInfoAdd]);
					
					$infoAdicionais[] = $infoAdicional;
					
					
				} catch ( Exception $e ) {
					die ( $e->getMessage () );
				}
			}
		}
		
		return $infoAdicionais;
	}
	
	
	public static function validaCamposInfoAdd($campo) {
		if (! isset ( $_REQUEST [$campo] ))
			throw new Exception ( "Falta campo " . $campo );
		
		return true;
	}
}

