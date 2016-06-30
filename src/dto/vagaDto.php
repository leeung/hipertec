<?php

class VagaDto{
	
	private $id;
	private $titulo;
	private $descricao;
	private $empresa;
	private $postagem ;
	private $vencimento;
	private $situacao;
	private $email;
	
	
	public function getId() {
		return $this->id;
	}
	public function setId($id) {
		$this->id = $id;
		return $this;
	}
	public function getTitulo() {
		return $this->titulo;
	}
	public function setTitulo($titulo) {
		$this->titulo = $titulo;
		return $this;
	}
	public function getDescricao() {
		return $this->descricao;
	}
	public function setDescricao($descricao) {
		$this->descricao = $descricao;
		return $this;
	}
	public function getEmpresa() {
		return $this->empresa;
	}
	public function setEmpresa($empresa) {
		$this->empresa = $empresa;
		return $this;
	}
	public function getPostagem() {
		return $this->postagem;
	}
	public function setPostagem($postagem) {
		$this->postagem = $postagem;
		return $this;
	}
	public function getVencimento() {
		return $this->vencimento;
	}
	public function setVencimento($vencimento) {
		$this->vencimento = $vencimento;
		return $this;
	}

	public function getSituacao() {
		return $this->situacao;
	}
	public function setSituacao($situacao) {
		$this->situacao = $situacao;
		return $this;
	}
	public function getEmail() {
		return $this->email;
	}
	public function setEmail($email) {
		$this->email = $email;
		return $this;
	}
	
	
	
	
	
}