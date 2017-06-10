<?php

/**
* require vendor autoload
*/
require __DIR__ . "/../vendor/autoload.php";

/**
* Config for slim app
*/
$config = [
	'settings' => [
	    'determineRouteBeforeAppMiddleware' => false,
	    'displayErrorDetails' => true,
	],
];

$app 		= new Slim\App($config);
$capsule 	= new \Illuminate\Database\Capsule\Manager;
$database 	= new Emeka\Database\DatabaseConnection($capsule);
$container 	= $app->getContainer();

/**
* Add AppController in the app container
*/
$container['AppController'] = function ($container){
	return new \Emeka\MO\Web\Controllers\AppController;
};

/**
* require vendor route
*/
require __DIR__ . "/../src/Routes/route.php";