<?php

use DI\Container;

class UserRepository
{
    private $pdo;

    public function __construct(Container $container)
    {
        $this->pdo = $container->get('Database')->getPdo();
    }

    public function createUser($userData)
    {
        $query = "INSERT INTO tb_user (name, email,password) VALUES (:name, :email,:password)";
        $statement = $this->pdo->prepare($query);
        $statement->execute([
            'name' => $userData['name'],
            'email' => $userData['email'],
            'password' => $userData['password']
        ]);

        return $this->pdo->lastInsertId();
    }
    public function login($email, $password)
    {
        $query = "SELECT * FROM tb_user WHERE email = :email AND password = :password";
        $statement = $this->pdo->prepare($query);
        $statement->execute([
            'email' => $email,
            'password' => $password 
        ]);

        return $statement->fetch(PDO::FETCH_ASSOC); 
    }

    
}
