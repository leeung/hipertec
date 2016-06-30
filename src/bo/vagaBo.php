<?php

class VagaBo {
	private $conn;
	private $vagaDao;
	
	public function __construct() {
	
		$this->vagaDao = new VagaDao();
	}
	
	public function listar() {
		$dados = array();
		
		$vagas = $this->vagaDao->listar();
		$dados['vagas'] = $vagas;
				
		//echo "<pre>";
		//var_dump($vagas);
		View::getGui("vagas",$dados );
		
	}
	
	public function novo(){
		$vagaDao = new VagaDao();
		$vaga = new VagaDto();
		
		self::montarVaga($vaga);
		
		$vagaDao->novo($vaga);
		
		$this->listar();
		
	}
	
	public static function montarVaga(VagaDto $vaga){
		
		validaCampos('titulo');
		validaCampos('descricao');
		validaCampos('empresa');
		validaCampos('postagem');
		validaCampos('vencimento');
		validaCampos('situacao');
		validaCampos('email');
		
		$vaga->setTitulo($_REQUEST['id']);
		$vaga->setTitulo($_REQUEST['titulo']);
		$vaga->setTitulo($_REQUEST['descricao']);
		$vaga->setTitulo($_REQUEST['empresa']);
		$vaga->setTitulo($_REQUEST['postagem']);
		$vaga->setTitulo($_REQUEST['vencimento']);
		$vaga->setTitulo($_REQUEST['situacao']);
		$vaga->setTitulo($_REQUEST['email']);
	
	}
}