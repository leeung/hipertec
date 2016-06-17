<?php
include 'functions.php';

include BO.'curriculoBo.php';
include BO.'alunoBo.php';
include UTIL.'view.php';
		
$entidade = null;
$funcao = null;
$obj = null;

if(isset($_REQUEST['entidade']) && isset($_REQUEST['funcao'])){
	$entidade = $_REQUEST['entidade'].'Bo'; 
	$funcao = $_REQUEST['funcao'];
	
	//echo $entidade. "//".$funcao;
	
	eval('$obj = new $entidade();');
	eval('$obj->$funcao();');
	
	
	
	
}else{
	$pagina = null;
	if(isset($_REQUEST['pagina'])){
		$pagina = $_REQUEST['pagina'];
	}else{
		$pagina = HOME;
	}
	
	View::getGui($pagina, null);
}

