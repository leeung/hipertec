<?php
class CurriculoBo {
	private $curriculoDao;
	public function __construct() {
		$this->curriculoDao = new CurriculoDao ();
	}
	public function salvar() {
		$dados = array ();
		
		try {
			
			if (! isset ( $_POST ['operacao'] ))
				die ( "Não existe operação" );
			$operacao = $_POST ['operacao'];
			
			switch ($operacao) {
				case "ALTERAR" :
					$this->alterar();
					break;
				case "NOVO" :
					$this->novo();
					break;
			}
		} catch ( Exception $e ) {
			die ( $e->getMessage () );
		}
	}
	
	
	public function getCurriculoByCpf() {
		$dados = array ();
		
		try {
			
			if (! isset ( $_POST ['cpf'] ))
				die ( "faltando parametro CPF" );
			$cpf = $_POST ['cpf'];
			
			if (! $this->curriculoDao->existeCurriculo ( $cpf )) {
				
				$alunoBo = new alunoBo();
				if($alunoBo->existeAluno($cpf)){
					$alunoDao = new AlunoDao();
					$alunoDao->delete($cpf);
				}
					
				$curriculo = new CurriculoDto ();
				$curriculo->getAluno()->setCpf ( $cpf );
				
				$dados ['curriculo'] = $curriculo;
				$dados ['operacao'] = "NOVO";
				
				View::getGui ( 'curriculo', $dados );
				return false;
			}
			
			$curriculo = new CurriculoDto ();
			$curriculo = $this->curriculoDao->listCurriculoByCpf ( $cpf );
			
			$aluno = new AlunoDao ();
			$curriculo->setAluno ( $aluno->listAlunoByCpf ( $cpf ) );
				
			$competencias = new CompetenciasDao ();
			$curriculo->setCompetencias ( $competencias->getCompetenciasByCurriculoId ( $curriculo->getId (), $curriculo->getCompetencias() ) );
				
			$experiencias = new ExperienciasDao ();
			$curriculo->setExperiencias ( $experiencias->listExperienciasByCurriculumId ( $curriculo->getId (), $curriculo->getExperiencias() ) );
				
			$dados ['curriculo'] = $curriculo;
			$dados ['operacao'] = "ALTERAR";

			
			View::getGui ( 'curriculo', $dados );
			
		} catch ( Exception $e ) {
			die ( $e->getMessage () );
		}
	}
	
	
	public function alterar() {
		
		try{
			
	
			$curriculo = new CurriculoDto();
			self::montarCurriculo($curriculo);
			alunoBo::montarAluno($curriculo->getAluno());
			$curriculo->setCompetencias(CompetenciasBo::montaCompetencias());
			$curriculo->setExperiencias(ExperienciasBo::montaExperiencias());
			
			$curriculoDao = new CurriculoDao();
			$curriculoDao->alterar($curriculo);
			
			$alunoDao = new AlunoDao();
			$alunoDao->alterar($curriculo->getAluno());
			
			$competencias = new CompetenciasBo();
			$competencias->novo();
		
			$experiencias = new ExperienciasDao();
			$experiencias->alterar($curriculo->getExperiencias(), $curriculo->getAluno()->getCpf());
			
			$this->getCurriculoByCpf($curriculo->getAluno()->getCpf());
			
			
			//echo "<pre>";
			//print_r($curriculo);
			//die();
			
			
		}catch (Exception $e){
			die($e->getMessage());
		}
	}
	
	public function novo(){
		
		
		$alunoBo = new alunoBo();
		$id_aluno = $alunoBo->novo();
		
		$endereco = new EnderecoBo();
		$endereco->novo($id_aluno); 
		
		$curriculo = new CurriculoDto();
		$curriculoDao = new CurriculoDao();
		self::montarCurriculo($curriculo);	
		
		$curriculo->getAluno()->setId($id_aluno);
		$curriculoDao->novoCurriculo($curriculo);
		
		if(!$curriculoDao->existeCurriculo($curriculo->getAluno()->getCpf())){
			$alunoDao = new AlunoDao();
			$alunoDao->delete($curriculo->getAluno()->getCpf());
		}
			
		View::getGui ( HOME, null );
		
	}
	
	public static function montarCurriculo(CurriculoDto $curriculo){
	
	
		try{
			validaCampos("resumo");

			$curriculo->setResumo($_REQUEST['resumo']);
			$curriculo->setInfoAdicional($_REQUEST['infoAdd']);
			
		}catch (Exception $e){
			die($e->getMessage());
		}
	}
		
}

