<?php

use DI\Container;

class UserService
{
    private $userRepository;

    public function __construct(Container $container)
    {
        $this->userRepository = $container->get('UserRepository');
    }

    public function createUser($userData)
    {
        // Aqui você pode fazer validações, manipulações de dados, etc.
        return $this->userRepository->createUser($userData);
    }
    public function login($email, $password)
    {
        // Call the repository method to validate the login
        return $this->userRepository->login($email, $password);
    }
}
