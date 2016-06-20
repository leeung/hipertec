<?php
class enderecoDao {
	private $conn;
	public function __construct() {
		$this->conn = Connection::getConnection ();
	}
	public function getEnderecoById($id) {
		$ENDERECO_BY_ID = "SELECT * FROM ENDERECO WHERE ALUNO=?";
		
		try {
			$stm = $this->conn->prepare ( $ENDERECO_BY_ID );
			$stm->bindParam ( 1, $id );
			$stm->execute();
			
			$result = $stm->fetch ( PDO::FETCH_ASSOC );
	
			$endereco = new EnderecoDto ();
			
			$endereco->setId ( $result ['id'] );
			$endereco->setLogradouro ( $result ['logradouro'] );
			$endereco->setNumero ( $result ['numero'] );
			$endereco->setBairro ( $result ['bairro'] );
			$endereco->setCidade ( $result ['cidade'] );
			$endereco->setEstado ( $result ['estado'] );
			$endereco->setCep ( $result ['cep'] );
			$endereco->setComplemento ( $result ['complemento'] );
			$endereco->setAluno ( $result ['aluno'] );
		
			return $endereco;
			
		} catch ( Exception $e ) {
			echo $e->getMessage ();
		}
	}
	
	
	public function novo(EnderecoDto $endereco){
	
		$QUERY_INSERT_NOVO_ENDERECO ="insert into 
				endereco(logradouro, numero, bairro, cidade, estado , cep, complemento, aluno)
					values(?,?,?,?,?,?,?,?);";
		echo "inserindo endereço";
		try {
			$stm = $this->conn->prepare ( $QUERY_INSERT_NOVO_ENDERECO );
			$stm->bindParam ( 1, $endereco->getLogradouro() );
			$stm->bindParam ( 2, $endereco->getNumero() );
			$stm->bindParam ( 3, $endereco->getBairro() );
			$stm->bindParam ( 4, $endereco->getCidade() );
			$stm->bindParam ( 5, $endereco->getEstado() );
			$stm->bindParam ( 6, $endereco->getCep() );
			$stm->bindParam ( 7, $endereco->getComplemento() );
			$stm->bindParam ( 8, $endereco->getAluno() );
	
			$result = $stm->execute ();
				
		} catch ( PDOException $e ) {
			echo $e->getMessage ();
		}
	}
	
	
	
}