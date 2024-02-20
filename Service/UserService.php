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
}
