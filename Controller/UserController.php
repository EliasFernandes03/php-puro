<?php

class UserController
{
    private $userService;

    public function __construct($userService)
    {
        $this->userService = $userService;
    }

    public function createUser($userData)
    {
        $this->userService->createUser($userData);
        // Você pode retornar uma resposta adequada, se necessário
    }
}
