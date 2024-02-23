<?php


require_once("Controller/UserController.php");
require_once("Service/UserService.php");
require_once("Repository/UserRepository.php");
require_once("Controller/ConsultController.php"); 
require_once("Controller/AuthController.php"); 
require_once("Service/ConsultService.php");      
require_once("Repository/ConsultRepository.php"); 
require_once("config.php");
use DI\ContainerBuilder;

// Include necessary files and classes

$containerBuilder = new ContainerBuilder();
$container = $containerBuilder->build();

$container->set('Database', function () {
    return new Database();
});

$requestMethod = $_SERVER['REQUEST_METHOD'];
$requestUri = $_SERVER['REQUEST_URI'];

switch ($requestMethod) {
    case 'DELETE':
        switch ($requestUri) {
            case (strpos($requestUri, '/api/consults/') === 0): // Route for deleting a consult
                $id = intval(substr($requestUri, strlen('/api/consults/')));
                $consultController = $container->get('ConsultController');
                echo json_encode($consultController->deleteConsult($id));
                break;
            default:
                notFound();
                break;
        }
        break;
    
    case 'GET':
        switch ($requestUri) {
            case '/api/consults':
                $consultController = $container->get('ConsultController');
                echo json_encode($consultController->getAllConsults());
                break;
           
            default:
                notFound();
                break;
        }
        break;
        
    case 'PUT':
            switch ($requestUri) {
                case (strpos($requestUri, '/api/consults/') === 0): 
                    $id = intval(substr($requestUri, strlen('/api/consults/')));
                    $consultController = $container->get('ConsultController');
                    $consultData = json_decode(file_get_contents('php://input'), true);
                    echo json_encode($consultController->updateConsult($id, $consultData['user_id'], $consultData['date']));
                    break;
                default:
                    notFound();
                    break;
            }
            break;
    case 'POST':
            switch ($requestUri) {
                case '/api/users':
                    $userController = $container->get('UserController');
                    $userData = json_decode(file_get_contents('php://input'), true);
                    $userController->createUser($userData);
                    break;
                    case '/api/login':
                        $authController = $container->get('AuthController'); // Alteração feita aqui
                        $loginData = json_decode(file_get_contents('php://input'), true);
                        $token = $authController->login($loginData['email'], $loginData['password']); // Alteração feita aqui
                        if ($token) {
                            http_response_code(200);
                            echo $token; // Já estamos retornando um JSON com o token no AuthController, não precisa fazer o encode novamente
                        } else {
                            http_response_code(401);
                            echo json_encode(array('message' => 'Invalid email or password.'));
                        }
                        break;
                case '/api/consults': // Route for creating a new consult
                    $consultController = $container->get('ConsultController');
                    $consultData = json_decode(file_get_contents('php://input'), true);
                    $consultController->addConsult($consultData['user_id'], $consultData['date']);
                    break;
                    
                default:
                    notFound();
                    break;
            }
            
            break;
        default:
            notFound();
            break;
}
function notFound() {
    header("HTTP/1.0 404 Not Found");
    echo "404 Not Found";
}

//ESTÁ FALTANDO A QUESTÃO DA VALIDAÇÃO PELO LOGIN, TRATAMENTO DE RESPOSTAS E DE ERROS, DOCUMENTAÇÃO.