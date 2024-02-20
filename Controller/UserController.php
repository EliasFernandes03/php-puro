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
    public function login($email, $password)
    {
        // Call the service method to authenticate the user
        $user = $this->userService->login($email, $password);

        if ($user) {
            // Authentication successful
            echo "Login successful! Welcome, {$user['name']}!";
        } else {
            // Authentication failed
            echo "Invalid email or password.";
        }
    }
}
