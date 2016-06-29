<?php

//REGISTRA FUNCÃO AUTOLOAD, PARA FAZER LOAD DE ARQUIVOS EM TEMPO DE EXECUCAO
spl_autoload_register('loadFile');


//DIRETÓRIOS DO PROJETO
define('DIR_PROJETO', __DIR__."/");
define('APP_CONTROL', DIR_PROJETO.'index.php');
define('BO', DIR_PROJETO."bo/");
define('DTO', DIR_PROJETO."dto/");
define('DAO', DIR_PROJETO."dao/");
define('UTIL', DIR_PROJETO."util/");

//VARIÁVEIS DE CONFIGURAÇÃO
define('HOME', 'alunoHome');


//FUNÇÃO CARREGA ARQUIVO CSS DA PAGINA
function getStyle($pagina){
	return "gui/css/".$pagina.".css"; 
}

//FUNÇÃO CARREGA ARQUIVO JS DA PAGINA
function getJs($pagina){
	return "gui/js/".$pagina.".js";
}


function validaCampos($campo) {
	if (! isset ( $_REQUEST [$campo] ))
		throw new Exception ( "Falta campo " . $campo );

		return true;
}

function loadFile($classe){
	$file = $classe.".php";
	
	if(file_exists(DIR_PROJETO.$file))	require_once DIR_PROJETO.$file;
	if(file_exists(BO.$file))	require_once BO.$file;
	if(file_exists(DTO.$file))	require_once DTO.$file;
	if(file_exists(DAO.$file))	require_once DAO.$file;
	if(file_exists(UTIL.$file))	require_once UTIL.$file;
}

function data(){
	return date("d/m/Y");
}
