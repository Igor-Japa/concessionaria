<?php
class Venda {
    private $conn;

    public function __construct($conexao) {
        $this->conn = $conexao->conn;
    }

    public function create($idVeiculo, $idConcessionaria, $valor, $dataVenda) {
        $sql = "INSERT INTO vendas (id_veiculo, id_concessionaria, valor, data_venda) VALUES (:idVeiculo, :idConcessionaria, :valor, :dataVenda)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute(['idVeiculo' => $idVeiculo, 'idConcessionaria' => $idConcessionaria, 'valor' => $valor, 'dataVenda' => $dataVenda]);
    }

    public function read($id) {
        $sql = "SELECT * FROM vendas WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $idVeiculo, $idConcessionaria, $valor, $dataVenda) {
        $sql = "UPDATE vendas SET id_veiculo = :idVeiculo, id_concessionaria = :idConcessionaria, valor = :valor, data_venda = :dataVenda WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute(['id' => $id, 'idVeiculo' => $idVeiculo, 'idConcessionaria' => $idConcessionaria, 'valor' => $valor, 'dataVenda' => $dataVenda]);
    }

    public function delete($id) {
        $sql = "DELETE FROM vendas WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute(['id' => $id]);
    }
}
?>
