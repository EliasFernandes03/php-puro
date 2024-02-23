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
        $this->userService->createUser($userData);
    }
    public function login($email, $password)
    {
       
        $user = $this->userService->login($email, $password);

        if ($user) {
      
            echo "Login successful! Welcome, {$user['name']}!";
        } else {
        
            echo "Invalid email or password.";
        }
    }
}
