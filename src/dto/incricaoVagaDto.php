<?php

class InscricaoVagaDto{
	private $id;
	private $aluno;
	private $dataInscricao;
	private $situacao;
	private $vaga;

	public function __construct(){
		$this->aluno = new alunoDto();
		$this->vaga = new VagasDto();
		$this->situacao = true;
		$this->dataInscricao = data();
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
	public function getDataInscricao() {
		return $this->dataInscricao;
	}
	public function setDataInscricao($dataInscricao) {
		$this->dataInscricao = $dataInscricao;
		return $this;
	}
	public function getSituacao() {
		return $this->situacao;
	}
	public function setSituacao($situacao) {
		$this->situacao = $situacao;
		return $this;
	}
	public function getVaga() {
		return $this->vaga;
	}
	public function setVaga($vaga) {
		$this->vaga = $vaga;
		return $this;
	}
	
	
	
}