<?php 

class Contato {
	private $pdo;

	public function __construct(){
		$this->pdo = new PDO("mysql:dbname=dbcontatos;host=localhost", "root", "");
	}

	public function adicionar($email, $nome = ""){
		if($this->existeEmail($email) == false){
			$sql = "INSERT INTO contatos (email, nome) VALUES (:email, :nome)";
			$sql = $this->pdo->prepare($sql);
			$sql->bindValue(':email', $email);
			$sql->bindValue(':nome', $nome);
			$sql->execute();

			return true;
		}else{
			return false;
		}
	}

	public function excluir($id){
		$sql = "DELETE FROM contatos WHERE id = :id";
		$sql = $this->pdo->prepare($sql);
		$sql->bindValue(':id', $id);
		$sql->execute();

		return true;
	}

	public function editar($id, $email, $nome){
		$sql = "UPDATE contatos SET email = :email, nome = :nome WHERE id = :id";
		$sql = $this->pdo->prepare($sql);
		$sql->bindValue(':id', $id);
		$sql->bindValue(':email', $email);
		$sql->bindValue(':nome', $nome);
		$sql->execute();
	}

	public function getAll(){
		$sql = "SELECT * FROM contatos";
		$sql = $this->pdo->prepare($sql);
		$sql->execute();

		if($sql->rowCount() > 0){
			return $sql->fetchAll();
		}else{
			return Array();
		}
	}

	public function getInfo($id){
		$sql = "SELECT * FROM contatos WHERE id = :id";
		$sql = $this->pdo->prepare($sql);
		$sql->bindValue(':id', $id);
		$sql->execute();

		if($sql->rowCount() > 0){
			return $sql->fetch();
		}else{
			return Array();
		}
	}

	public function existeEmail($email){
		$sql = "SELECT * FROM contatos WHERE email = :email";
		$sql = $this->pdo->prepare($sql);
		$sql->bindValue(':email', $email);
		$sql->execute();

		if($sql->rowCount() > 0){
			return true;
		}else{
			return false;
		}
	}
}

?>