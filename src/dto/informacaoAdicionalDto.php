<?php
class InformacaoAdicionalDto{
	private $id;
	private $descricao;
	private $curriculum_id;
	
	public function getId() {
		return $this->id;
	}
	public function setId($id) {
		$this->id = $id;
		return $this;
	}
	public function getDescricao() {
		return $this->descricao;
	}
	public function setDescricao($descricao) {
		$this->descricao = $descricao;
		return $this;
	}
	public function getCurriculumId() {
		return $this->curriculum_id;
	}
	public function setCurriculumId($curriculum_id) {
		$this->curriculum_id = $curriculum_id;
		return $this;
	}
	
	
}