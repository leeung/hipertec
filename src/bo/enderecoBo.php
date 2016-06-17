<?php

class EnderecoBo{
	public static function montarEndereco(EnderecoDto $Endereco){
	
	
		try{
			validaCampos("logradouro");
			validaCampos("numero");
			validaCampos("bairro");
			validaCampos("cidade");
			validaCampos("estado");
			validaCampos("cep");
				
		
			$Endereco->setLogradouro($_REQUEST['logradouro']);
			$Endereco->setNumero($_REQUEST['numero']);
			$Endereco->setBairro($_REQUEST['bairro']);
			$Endereco->setCidade($_REQUEST['cidade']);
			$Endereco->setEstado($_REQUEST['estado']);
			$Endereco->setCep($_REQUEST['cep']);
				
			return $Endereco;
			
		}catch (Exception $e){
			die($e->getMessage());
		}
	}
	
	
}

