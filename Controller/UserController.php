<?php

use DI\Container;

class UserController
{
    private $userService;

    public function __construct(Container $container)
    {
        $this->userService = $container->get('UserService');
    }

    public function createUser($userData)
    {
        // Aqui você pode chamar o serviço para criar o usuário
        $this->userService->createUser($userData);
    }
}
