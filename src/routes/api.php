<?php

use \Psr\Http\Message\ResponseInterface as Response;
use \Psr\Http\Message\ServerRequestInterface as Request;
use User\User;

//$configuration = [
//	'settings' => [
//		'displayErrorDetails' => true,
//	],
//];
//$c = new \Slim\Container($configuration);


$app = new \Slim\App();

$app->get('/', function () {
    require_once $_SERVER['DOCUMENT_ROOT']. "/src/view/welcome.php";
});

//get all users
$app->get('/api/users', function (Request $request, Response $response) {

    $users = new User();
	$result = $users->all();

	if($result)
		return $response->withJson($result, 200);
});


//get a single user
$app->get('/api/users/{id}', function (Request $request, Response $response, array $args) {

    $id = $request->getAttribute('id');

    $user = new User();
    $result = $user->get($id);

	if($result)
		return $response->withJson($result, 200);
});


//make a post request
$app->post('/api/users/add', function (Request $request, Response $response) {

	$data['first_name'] = $request->getParam('first_name');
    $data['phone'] = $request->getParam('phone');
    $data['email'] = $request->getParam('email');

    $user = new User();
    $result = $user->post($data);

	if($result)
		return $response->withJson($result, 201);
});

//make a put request
$app->put('/api/users/update/{id}', function (Request $request, Response $response) {

	$data['id'] = $request->getAttribute('id');
	$data['first_name'] = $request->getParam('first_name');
	$data['phone'] = $request->getParam('phone');
	$data['email'] = $request->getParam('email');

	$user = new User();
	$result = $user->put($data);

	if($result)
		return $response->withJson($result, 202);
});


//make a delete request
$app->delete('/api/users/delete/{id}', function (Request $request, Response $response) {

    $id = $request->getAttribute('id');

	$user = new User();
	$result = $user->delete($id);

	if($result)
		return $response->withJson($result, 410);
});
 
$app->run();