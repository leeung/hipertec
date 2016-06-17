<?php

class alunoDto{

	private $id;
	private $cpf;
	private $nome;
	private $sobreNome;
	private $idade;
	private $endereco;
	private $telefone;
	private $email;
	private $nacionalidade;
	private $sexo;
	private $estadoCivil ;
	private $foto ;
	private $linkedin ;
	private $facebook ;
	
	public function __construct(){
		$this->endereco = new EnderecoDto();
	}
	
	public function getId() {
		return $this->id;
	}
	public function setId($id) {
		$this->id = $id;
		return $this;
	}
	public function getNome() {
		return $this->nome;
	}
	public function setNome($nome) {
		$this->nome = $nome;
		return $this;
	}
	
	
	public function getIdade() {
		return $this->idade;
	}
	public function setIdade($idade) {
		$this->idade = $idade;
		return $this;
	}
	public function getEndereco() {
		return $this->endereco;
	}
	public function setEndereco($endereco) {
		$this->endereco = $endereco;
		return $this;
	}
	public function getTelefone() {
		return $this->telefone;
	}
	public function setTelefone($telefone) {
		$this->telefone = $telefone;
		return $this;
	}
	public function getEmail() {
		return $this->email;
	}
	public function setEmail($email) {
		$this->email = $email;
		return $this;
	}
	public function getNacionalidade() {
		return $this->nacionalidade;
	}
	public function setNacionalidade($nacionalidade) {
		$this->nacionalidade = $nacionalidade;
		return $this;
	}
	public function getSexo() {
		return $this->sexo;
	}
	public function setSexo($sexo) {
		$this->sexo = $sexo;
		return $this;
	}
	public function getEstadoCivil() {
		return $this->estadoCivil;
	}
	public function setEstadoCivil($estadoCivil) {
		$this->estadoCivil = $estadoCivil;
		return $this;
	}
	public function getLinkedin() {
		return $this->linkedin;
	}
	public function setLinkedin($linkedin) {
		$this->linkedin = $linkedin;
		return $this;
	}
	public function getFacebook() {
		return $this->facebook;
	}
	public function setFacebook($facebook) {
		$this->facebook = $facebook;
		return $this;
	}
	public function getFoto() {
		return $this->foto;
	}
	public function setFoto($foto) {
		$this->foto = $foto;
		return $this;
	}
	public function getSobreNome() {
		return $this->sobreNome;
	}
	public function setSobreNome($sobreNome) {
		$this->sobreNome = $sobreNome;
		return $this;
	}
	public function getCpf() {
		return $this->cpf;
	}
	public function setCpf($cpf) {
		$this->cpf = $cpf;
		return $this;
	}
	
	
	
	
	
	


}