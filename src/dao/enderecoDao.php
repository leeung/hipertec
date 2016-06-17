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
}