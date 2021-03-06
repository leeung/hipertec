<?php

class CurriculoDto{
	
	private $id;
	private $aluno;
	private $resumo = null;
	private $competencias;
	private $experiencias;
	private $infoAdicional = null;
	
	public function __construct(){
		$this->aluno = new alunoDto();
		$this->competencias = array(new CompetenciasDto());
		$this->experiencias = array(new ExperienciasDto());

	}
	
	public function getId() {
		return $this->id;
	}
	public function setId($id) {
		$this->id = $id;
		return $this;
	}
	public function getAluno() {
		return $this->aluno;
	}
	public function setAluno($aluno) {
		$this->aluno = $aluno;
		return $this;
	}
	public function getResumo() {
		return $this->resumo;
	}
	public function setResumo($resumo) {
		$this->resumo = $resumo;
		return $this;
	}
	public function getCompetencias() {
		return $this->competencias;
	}
	public function setCompetencias($competencias) {
		$this->competencias = $competencias;
		return $this;
	}
	public function getExperiencias() {
		return $this->experiencias;
	}
	public function setExperiencias($experiencias) {
		$this->experiencias = $experiencias;
		return $this;
	}
	public function getInfoAdicional() {
		return $this->infoAdicional;
	}
	public function setInfoAdicional($infoAdicional) {
		$this->infoAdicional = $infoAdicional;
		return $this;
	}
	
	
	
	
}