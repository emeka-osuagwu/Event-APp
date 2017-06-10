<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Environment;

use PHPUnit\Framework\TestCase as Test;

class AppControllerTest extends Test
{
    protected $app;

    /**
    * Test setup method
    */
    public function setUp()
    {
        require __DIR__ . "/../bootstrap/app.php";

        $this->app = $app;
    }

    /**
    * test test_index_without_params
    */
    public function test_index_without_params() {

        $env = Environment::mock([
            'REQUEST_METHOD' => 'GET',
            'REQUEST_URI'    => '/',
        ]);

        $req = Request::createFromEnvironment($env);
        $this->app->getContainer()['request'] = $req;
        $response = $this->app->run(true);
        $this->assertSame($response->getStatusCode(), 200);
        $this->assertTrue(is_array(json_decode($response->getBody(), true)));
    }

    /**
    * test test_index_with_params
    */
    public function test_index_with_params() {

        $env = Environment::mock([
            'REQUEST_METHOD' => 'GET',
            'REQUEST_URI'    => '/?msisdn=1&operatorid=2&shortcodeid=3&text=hjehver',
        ]); 

        $req = Request::createFromEnvironment($env);
        $this->app->getContainer()['request'] = $req;
        $response = $this->app->run(true);
        $this->assertSame($response->getStatusCode(), 200);
    }

    /**
    * test test_wrong_route_throughs_error
    */
    public function test_wrong_route_throughs_error() {

        $env = Environment::mock([
            'REQUEST_METHOD' => 'GET',
            'REQUEST_URI'    => '/some-route',
        ]); 

        $req = Request::createFromEnvironment($env);
        $this->app->getContainer()['request'] = $req;
        $response = $this->app->run(true);
        $this->assertSame($response->getStatusCode(), 404);
    }

}