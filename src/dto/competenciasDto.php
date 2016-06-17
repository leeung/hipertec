<?php

class CompetenciasDto{
	private $id ;
	private $curso;
	private $instituicao;
	private $cargaHoraria;
	private $nivel;
	private $status;
	private $curriculum_id;
	private $conclusao;
	
	
	public function getId() {
		return $this->id;
	}
	public function setId($id) {
		$this->id = $id;
		return $this;
	}
	public function getCurso() {
		return $this->curso;
	}
	public function setCurso($curso) {
		$this->curso = $curso;
		return $this;
	}

	public function getCargaHoraria() {
		return $this->cargaHoraria;
	}
	public function setCargaHoraria($cargaHoraria) {
		$this->cargaHoraria = $cargaHoraria;
		return $this;
	}
	public function getNivel() {
		return $this->nivel;
	}
	public function setNivel($nivel) {
		$this->nivel = $nivel;
		return $this;
	}
	public function getStatus() {
		return $this->status;
	}
	public function setStatus($status) {
		$this->status = $status;
		return $this;
	}
	public function getCurriculumId() {
		return $this->curriculum_id;
	}
	public function setCurriculumId($curriculum_id) {
		$this->curriculum_id = $curriculum_id;
		return $this;
	}
	public function getConclusao() {
		return $this->conclusao;
	}
	public function setConclusao($conclusao) {
		$this->conclusao = $conclusao;
		return $this;
	}
	public function getInstituicao() {
		return $this->instituicao;
	}
	public function setInstituicao($instituicao) {
		$this->instituicao = $instituicao;
		return $this;
	}
	
	
}