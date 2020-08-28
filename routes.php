<?php

$routes = [
	'/' => 'controllers/site/UserListController',
	'/cadastrar' => 'controllers/site/UserCreateController',
	'/store' => 'controllers/site/UserCreateController',
	'/editar' => 'controllers/site/UserUpdateController',
	'/update' => 'controllers/site/UserUpdateController',
	'/deletar' => 'controllers/site/UserDeleteController',
	'/delete' => 'controllers/site/UserDeleteController',
	'/404' => 'controllers/ErrorPageNotFoundController'
];