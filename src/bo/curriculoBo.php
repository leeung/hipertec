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
				
			$infoAdd = new InformacaoAdicionalDao ();
			$curriculo->setInfoAdicionais ( $infoAdd->getInfoAddByCurriculumId ( $curriculo->getId (), $curriculo->getInfoAdicionais() ) );
				

			$dados ['curriculo'] = $curriculo;
			$dados ['operacao'] = "ALTERAR";
			View::getGui ( 'curriculo', $dados );
			
		} catch ( Exception $e ) {
			die ( $e->getMessage () );
		}
	}
	
	
	public function alterar() {
		
		try{
			
			validaCampos('resumo');
			
			$curriculo = new CurriculoDto();
			$curriculo->setResumo($_REQUEST['resumo']);
			alunoBo::montarAluno($curriculo->getAluno());
			$curriculo->setCompetencias(CompetenciasBo::montaCompetencias());
			$curriculo->setExperiencias(ExperienciasBo::montaExperiencias());
			$curriculo->setInfoAdicionais(InformacaoAdicionalBo::montaInformacaoAdd());
			
			$curriculoDao = new CurriculoDao();
			$curriculoDao->alterar($curriculo);
			
			$alunoDao = new AlunoDao();
			$alunoDao->alterar($curriculo->getAluno());
			
			$infAdd = new InformacaoAdicionalDao();
			$infAdd->alterar($curriculo->getInfoAdicionais(), $curriculo->getAluno()->getCpf());
			
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
		
		$curriculoDao = new CurriculoDao();
		$result = $curriculoDao->existeCurriculo($_REQUEST['cpf']);
		
		if ($result){
			View::getGui ( HOME, null );
			return false;
		}
		
		$alunoBo = new alunoBo();
		$id_aluno = $alunoBo->novo();
		
		$endereco = new EnderecoBo();
		$endereco->novo($id_aluno);
		
		$curriculo = new CurriculoDto();
		self::montarCurriculo($curriculo);
		$curriculo->getAluno()->setId($id_aluno);
		
		$curriculoDao->novoCurriculo($curriculo);
		
		//if($alunoBo->listAlunoByCpf($cu))
		
		View::getGui ( HOME, null );
		
	}
	
	public static function montarCurriculo(CurriculoDto $curriculo){
	
	
		try{
			validaCampos("resumo");

			$curriculo->setResumo($_REQUEST['resumo']);
			
		}catch (Exception $e){
			die($e->getMessage());
		}
	}
	
}

