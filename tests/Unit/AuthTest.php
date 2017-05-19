<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AuthTest extends TestCase
{

    /**
    * Create user for test cases
    *
    */
	private function createUser()
	{
		return Factory(User::class)->create([
			'password' => 'password'
		]);
	}

    /**
    * Test login
    *
    */
    public function testLoginPost()
    {    
    	$req = $this->createUser()->toArray();

    	$req['password'] = 'password';

        $response = $this->call('POST', '/api/login', $req);

        $response
        ->assertStatus(200);
    }

    /**
    * Test login fails
    *
    */
    public function testLoginFail()
    {
        $req = $this->createUser()->toArray();

        $req['password'] = 'not_password';

        $response = $this->call('POST', '/api/login', $req);

        $response
        ->assertStatus(401);
    }
    
    /**
    * Test register works
    *
    */
    public function testRegisterWorks()
    {
        $req = [
            "email" => "test@gmail.com",
            "password" => "password"
        ];

        $response = $this->call('POST', '/api/register', $req);
    
        $response
        ->assertStatus(201)
        ->assertJson(['message' => "Account Created", "status" => 201]);
    }

    /**
    * testRegisterFailsForInvalidEmail
    *
    */
    public function testRegisterFailsForInvalidEmail()
    {
        $req = [
            "email" => "test",
            "password" => "password"
        ];

        $response = $this->call('POST', '/api/register', $req);

        $response
        ->assertStatus(400)
        ->assertJson(['email' => ["The email must be a valid email address."]]);
    }

    /**
    * testRegisterFailsForDuplicateUser
    *
    */
    public function testRegisterFailsForDuplicateUser()
    {
        $user_one = Factory(User::class)->create([
            'email' => "test@gmail.com",
            'password' => 'password'
        ]);

        $req = [
            "email" => $user_one['email'],
            "password" => "password"
        ];
        
        $response = $this->call('POST', '/api/register', $req);

        $response
        ->assertStatus(400)
        ->assertJson(['email' => ["The email has already been taken."]]);
    }
}
