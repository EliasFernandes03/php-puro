<?php
use DI\Container;

class ConsultRepository {

    private $pdo;

    public function __construct(Container $container)
    {
        $this->pdo = $container->get('Database')->getPdo();
    }

    public function getAllConsults() {
        $query = "SELECT * FROM tb_consult";
        $stmt = $this->pdo->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getConsultById($id) {
        $query = "SELECT * FROM tb_consult WHERE id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function addConsult($user_id, $date) {
        $query = "INSERT INTO tb_consult (user_id, date) VALUES (:user_id, :date)";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindValue(":user_id", $user_id, PDO::PARAM_INT);
        $stmt->bindValue(":date", $date, PDO::PARAM_STR);
        return $stmt->execute();
    }

    public function updateConsult($id, $user_id, $date) {
        $query = "UPDATE tb_consult SET user_id = :user_id, date = :date WHERE id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $stmt->bindValue(":user_id", $user_id, PDO::PARAM_INT);
        $stmt->bindValue(":date", $date, PDO::PARAM_STR);
        return $stmt->execute();
    }

    public function deleteConsult($id) {
        $query = "DELETE FROM tb_consult WHERE id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
