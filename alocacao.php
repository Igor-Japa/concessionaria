<?php
class Alocacao {
    private $conn;

    public function __construct($conexao) {
        $this->conn = $conexao->conn;
    }

    public function create($id, $area, $automovel, $concessionaria, $quantidade,  $id_automovel) {
        $sql = "INSERT INTO alocacoes (id, area, automovel, concessionaria, quantidade,  id_automovel) VALUES (:id, :area, :automovel, :concessionaria, :quantidade, :id_automovel)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute(['id' => $id, 'area' => $area, 'automovel' => $automovel, 'concessionaria' => $concessionaria, 'quantidade' => $quantidade, 'id_automovel' => $id_automovel ]);
    }

    public function read($id) {
        $sql = "SELECT * FROM alocacoes WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $idConcessionaria, $idVeiculo) {
        $sql = "UPDATE alocacoes SET id = :id, area = :area, automovel = :automovel, concessionaria = :concessionaria, quantidade = :quantidade, id_automovel = :id_automovel  WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute(['id' => $id, 'area' => $area, 'automovel' => $automovel, 'concessionaria' => $concessionaria, 'quantidade' => $quantidade, 'id_automovel' => $id_automovel ]);
    }

    public function delete($id) {
        $sql = "DELETE FROM alocacoes WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute(['id' => $id]);
    }
}
?>
