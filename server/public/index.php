<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../src/model/Mountain.php';
require __DIR__ . '/../src/config/Post.php';

$app = AppFactory::create();

$app->get('/', function (Request $request, Response $response, array $args) {
    return $response->withHeader('Location', '/api/mountains');
});

$app->get('/api/mountains', function (Request $request, Response $response, array $args) {
    $mountains = Mountain::getAll();
    $response->getBody()->write(json_encode($mountains));
    return $response;
});

$app->get('/api/mountains/{id}', function (Request $request, Response $response, array $args) {
    $id = $args['id'];
    $mountain = Mountain::getOne($id);
    $json = json_encode($mountain);
    $response->getBody()->write($json);
    return $response;
});

$app->post('/api/mountains', function (Request $request, Response $response, array $args) {
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

    // print_r($mountain);

    
    $response->getBody()->write(json_encode($text));
    return $response;
});

$app->put('/api/mountains/{id}', function (Request $request, Response $response, array $args) {
    // Update mountain identified by $args['id']
    $id = $args['id'];
    
    $params = Post::getPostParams($request);
    
    if (Mountain::validateParams($params)) {
        $mountain = Mountain::getOneMountain($id);
        
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

$app->delete('/api/mountains/{id}', function (Request $request, Response $response, array $args) {
    // Delete mountain identified by $args['id']
    $id = $args['id'];
    Mountain::delete($id);
    $response->getBody()->write(json_encode("Mountain deleted"));
    return $response;
});

$app->run();
