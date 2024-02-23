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
        return $this->userRepository->createUser($userData);
    }
    public function login($email, $password)
    {
        return $this->userRepository->login($email, $password);
    }
}
