<?php

class UserService
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function createUser($userData)
    {
        // Aqui você pode fazer validações, manipulações de dados, etc.
        return $this->userRepository->createUser($userData);
    }
}
