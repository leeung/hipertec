<?php
class VagaDao {
	private $conn;
	public function __construct() {
		$this->conn = Connection::getConnection ();
	}
	public function listar() {
		$QUERY_VAGA_LISTAR = "SELECT * FROM VAGA";
		$vagas = array ();
		
		try {
			
			$stm = $this->conn->prepare ( $QUERY_VAGA_LISTAR );
			$stm->execute ();
			
			$result = $stm->fetchAll ( PDO::FETCH_ASSOC );
			
			
			foreach ( $result as $row ) {
				
				$dados = $stm->fetch ();
				$vaga = new VagaDto ();
				$vaga->setId ( $row['id']);
				$vaga->setTitulo( $row['titulo'] );
				$vaga->setDescricao ( $row['descricao'] );
				$vaga->setEmail ( $row['email'] );
				$vaga->setEmpresa ( $row['empresa'] );
				$vaga->getSituacao ($row['situacao']);
				$vaga->setPostagem ( FormatData::dateToNormal($row['postagem']) );
				$vaga->setVencimento ( FormatData::dateToNormal($row['vencimento'] ));
				$vagas [] = $vaga;
			}
			
			return $vagas;
		} catch ( PDOException $e ) {
			$e->getMessage ();
		}
	}
	public function novo(VagaDto $vaga) {
		$QUERY_VAGA_INSERT = "	insert into vaga(titulo, descricao, empresa, postagem, vencimento, situacao, email)
									values(?,?,?,?,?,?,?);
								";
		
		try {
			
			$stm = $this->conn->prepare ( $QUERY_VAGA_INSERT );
			$stm->bindParam ( 1, $vaga->getTitulo () );
			$stm->bindParam ( 2, $vaga->getDescricao () );
			$stm->bindParam ( 3, $vaga->getEmpresa () );
			$stm->bindParam ( 4, $vaga->getPostagem () );
			$stm->bindParam ( 5, $vaga->getVencimento () );
			$stm->bindParam ( 6, $vaga->getSituacao () );
			$stm->bindParam ( 7, $vaga->getEmail () );
			
			$stm->execute ();
			
			return $this->conn->lastInsertId ();
		} catch ( AppException $e ) {
			$e->getMessage ();
		}
	}
	public function inativarVaga($id) {
		$QUERY_VAGA_INATIVAR = "UPDATE VAGA SET SITUACAO= 0 WHERE ID=?";
		
		try {
			
			$stm = $this->conn->prepare ( $QUERY_VAGA_INATIVAR );
			$stm->bindParam ( 1, $id );
			$stm->execute ();
			
			if ($stm->rowCount () > 0)
				return true;
			
			return false;
		} catch ( AppException $e ) {
			$e->getMessage ();
		}
	}
}