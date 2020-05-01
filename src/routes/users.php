<?php

use \Psr\Http\Message\ResponseInterface as Response;
use \Psr\Http\Message\ServerRequestInterface as Request;
use User\User;

//dev
$configuration = [
	'settings' => [
		'displayErrorDetails' => true,
	],
];
$c = new \Slim\Container($configuration);
//dev

$app = new \Slim\App($c);

$app->get('/', function () {
    require_once $_SERVER['DOCUMENT_ROOT']. "/src/view/welcome.php";
});

//get all users
$app->get('/api/users', function (Request $request, Response $response) {

    $users = new User();
	$result = $users->all();

	if($result)
		return $response->withJson($result, 200);
	else
		return $response->withJson($result, 400);
});

//todo коды ошибок

//get a single user
$app->get('/api/users/{id}', function (Request $request, Response $response, array $args) {

    $id = trim($args['id']);

    $user = new User();
    $result = $user->get($id);

	if($result)
		return $response->withJson($result, 200);
	else
		return $response->withJson($result, 400);
});


//make a post request
$app->post('/api/users/add', function (Request $request, Response $response) {

	$data['first_name'] = $request->getParam('first_name');
    $data['phone'] = $request->getParam('phone');
    $data['email'] = $request->getParam('email');

    $user = new User();
    $result = $user->post($data);

	if($result)
		return $response->withJson($result, 200);
	else
		return $response->withJson($result, 400);
});

//make a put request
$app->put('/api/users/update/{id}', function (Request $request, Response $reponse, array $args) {
    $id = $request->getAttribute('id');
    $first_name = $request->getParam('first_name');
    $last_name = $request->getParam('last_name');
    $phone = $request->getParam('phone');


});


//make a delete request
$app->delete('/api/users/delete/{id}', function (Request $request, Response $reponse, array $args) {
    $id = $request->getAttribute('id');

});
 
$app->run();