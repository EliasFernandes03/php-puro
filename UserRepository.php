<?php


class UserRepository
{
    private $pdo;

    public function __construct(Database $database)
    {
        $this->pdo = $database->getPdo();
    }

    public function createUser($userData)
    {
        $query = "INSERT INTO tb_user (name, email, password) VALUES (:name, :email, :password)";
        $statement = $this->pdo->prepare($query);
        $statement->execute([
            'name' => $userData['name'],
            'email' => $userData['email'],
            'password' => $userData['password']
        ]);

        return $this->pdo->lastInsertId();
    }
}
