<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Access-Control-Allow-Methods: OPTIONS, GET, POST, PUT, DELETE');

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Routing\RouteCollectorProxy;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../src/Model/Mountain.php';
require __DIR__ . '/../src/Config/Post.php';

$app = AppFactory::create();

$app->get('/', function (Request $request, Response $response, array $args) {
    return $response->withHeader('Location', '/api/mountains');
});

$app->group('/api', function (RouteCollectorProxy $group) {
    $group->options('/mountains', function (Request $request, Response $response): Response {
        return $response;
    });
    $group->options('/mountains/{id}', function (Request $request, Response $response): Response {
        return $response;
    });

    $group->get('/mountains', function (Request $request, Response $response, array $args) {
        $mountains = Mountain::getAll();
        $response->getBody()->write(json_encode($mountains));
        return $response;
    });
    
    $group->get('/mountains/{id}', function (Request $request, Response $response, array $args) {
        $id = $args['id'];
        $mountain = Mountain::getOne($id);
        $response->getBody()->write(json_encode($mountain));
        return $response;
    });
    
    $group->post('/mountains', function (Request $request, Response $response, array $args) {
        // Create new mountain
        $params = Post::getPostParams($request);
    
        if (Mountain::validateParams($params)) {
            $mountain = new Mountain(
                null,
                $params["name"],
                $params["height"],
                $params["location"],
                $params["description"],
                $params["image"]
            );
    
            $mountain->insert();
            $text["message"] = "New mountain inserted";
        } else {
            $text["message"] = "Invalid data to insert";
        }
    
        $response->getBody()->write(json_encode($text));
        return $response;
    });
    
    $group->put('/mountains/{id}', function (Request $request, Response $response, array $args) {
        // Update mountain identified by $args['id']
        $id = $args['id'];
    
        $params = Post::getPostParams($request);
    
        if (Mountain::validateParams($params)) {
            $mountain = Mountain::getOne($id);
    
            $mountain->setName($params["name"]);
            $mountain->setHeight($params["height"]);
            $mountain->setLocation($params["location"]);
            $mountain->setDescription($params["description"]);
            $mountain->setImage($params["image"]);
    
            $mountain->update();
            $text["message"] = "Mountain updated";
        } else {
            $text["message"] = "Invalid data to update";
        }
    
    
        $response->getBody()->write(json_encode($text));
        return $response;
    });
    
    $group->delete('/mountains/{id}', function (Request $request, Response $response, array $args) {
        // Delete mountain identified by $args['id']
        $id = $args['id'];
        Mountain::delete($id);
        $response->getBody()->write(json_encode("Mountain deleted"));
        return $response;
    });
});




$app->run();
