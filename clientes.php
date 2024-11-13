<?php
class Clientes {
    private $conn;

    public function __construct($conexao) {
        $this->conn = $conexao->conn;
    }

    public function create($id, $nome) {
        $sql = "INSERT INTO clientes (id, nome) VALUES (:id, :nome)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute(['id' => $id, 'nome' => $nome]);
    }

    public function read($id) {
        $sql = "SELECT * FROM clientes WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $idVeiculo, $idConcessionaria, $valor, $dataVenda) {
        $sql = "UPDATE clientes SET id = :id, nome = :nome WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute(['id' => $id, 'nome' => $nome]);
    }

    public function delete($id) {
        $sql = "DELETE FROM clientes WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute(['id' => $id]);
    }
}
?>
