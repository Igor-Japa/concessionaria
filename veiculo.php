<?php
class Automoveis {
    private $conn;

    public function __construct($conexao) {
        $this->conn = $conexao->conn;
    }

    public function create($modelo, $marca, $ano, $preco) {
        $sql = "INSERT INTO automoveis (id, modelo, preco) VALUES (:id, :modelo, :preco)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute(['id' =>$id, 'modelo' => $modelo, 'preco' => $preco]);
    }

    public function read($id) {
        $sql = "SELECT * FROM automoveis WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $modelo, $preco) {
        $sql = "UPDATE automoveis SET modelo = :modelo, preco = :preco WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute(['id' => $id, 'modelo' => $modelo, 'preco' => $preco]);
    }

    public function delete($id) {
        $sql = "DELETE FROM automoveis WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute(['id' => $id]);
    }
}
?>
