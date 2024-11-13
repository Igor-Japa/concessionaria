<?php
class Concessionaria {
    private $conn;

    public function __construct($conexao) {
        $this->conn = $conexao->conn;
    }

    public function create($nome, $endereco) {
        $sql = "INSERT INTO concessionarias (nome, endereco) VALUES (:nome, :endereco)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['nome' => $nome, 'endereco' => $endereco]);
        return $this->conn->lastInsertId();
    }

    public function read($id) {
        $sql = "SELECT * FROM concessionarias WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $nome, $endereco) {
        $sql = "UPDATE concessionarias SET nome = :nome, endereco = :endereco WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute(['id' => $id, 'nome' => $nome, 'endereco' => $endereco]);
    }

    public function delete($id) {
        $sql = "DELETE FROM concessionarias WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute(['id' => $id]);
    }
}
?>
