<?php

require __DIR__ . "/../vendor/autoload.php";

$config = [
	'settings' => [
	    'determineRouteBeforeAppMiddleware' => false,
	    'displayErrorDetails' => true,
	    'db' => [
	        'driver' 	=> 'mysql',
	        'host' 		=> 'localhost',
	        'database' 	=> 'mo',
	        'username' 	=> 'root',
	        'password' 	=>  null,
	        'charset'   => 'utf8',
	        'collation' => 'utf8_unicode_ci',
	        'prefix'    => '',
	    ]
	],
];

$app = new  Slim\App($config);

$container = $app->getContainer();

$capsule = new \Illuminate\Database\Capsule\Manager;
$capsule->addConnection($container['settings']['db']);
$capsule->setAsGlobal();
$capsule->bootEloquent();

$container['db'] = function ($container) use ($capsule) {
    return $capsule;
};

$container['AppController'] = function ($container){
	return new \Emeka\MO\Web\Controllers\AppController;
};
 
require __DIR__ . "/../src/Routes/route.php";