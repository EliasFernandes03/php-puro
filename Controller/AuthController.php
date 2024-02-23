<?php
use DI\Container;
use Firebase\JWT\JWT;


class AuthController
{
    private $userService;

    public function __construct(Container $container)
    {
        $this->userService = $container->get('UserService');
    }

    public function login($email, $password)
    {
        $user = $this->userService->login($email, $password);

        if ($user) {
         
            $token = $this->generateToken($user);
            return json_encode(array('token' => $token)); 
        } else {
            return json_encode(array('message' => 'Invalid email or password.'));
        }
    }

    private function generateToken($user)
    {
        $payload = array(
            'user_id' => $user['id'],
            'email' => $user['email'],
            'exp' => time() + 3600 
        );

        return JWT::encode($payload, '1234', 'HS256');
    }
}

