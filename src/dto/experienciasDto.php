<?php
class ExperienciasDto{
	
	private $id ;
	private $empresa;
	private $funcao;
	private $inicio;
	private $fim;
	private $curriculumId;
	
	
	public function getId() {
		return $this->id;
	}
	public function setId($id) {
		$this->id = $id;
		return $this;
	}
	public function getEmpresa() {
		return $this->empresa;
	}
	public function setEmpresa($empresa) {
		$this->empresa = $empresa;
		return $this;
	}
	public function getFuncao() {
		return $this->funcao;
	}
	public function setFuncao($funcao) {
		$this->funcao = $funcao;
		return $this;
	}
	public function getInicio() {
		return $this->inicio;
	}
	public function setInicio($inicio) {
		$this->inicio = $inicio;
		return $this;
	}
	public function getFim() {
		return $this->fim;
	}
	public function setFim($fim) {
		$this->fim = $fim;
		return $this;
	}
	public function getCurriculumId() {
		return $this->curriculumId;
	}
	public function setCurriculumId($curriculumId) {
		$this->curriculumId = $curriculumId;
		return $this;
	}
	
	
	
}