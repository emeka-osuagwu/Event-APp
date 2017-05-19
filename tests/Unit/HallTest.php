<?php

namespace Tests\Feature;

use App\Hall;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class HallTest extends TestCase
{

    /**
    * Create Fake data for Hall
    */
    public function hallFakeData()
    {
        return [
            'lat' => 333.33,
            'lng' => 333.33,
            "name" => "test_name",
            "address" => "test_name",
            "user_id" => 1
        ];
    }

    /**
     * Test Create user
     */
    public function createUser()
    {
        return Factory(User::class)->create([
            'password' => 'password'
        ]);
    }

    /**
     * Test Hall can be created
     */
    public function testHallCanBeCreated()
    {
        // first create a user
        $this->createUser();

        $response = $this->call('POST', '/api/hall/create', $this->hallFakeData());
        
        $response
        ->assertStatus(200)
        ->assertJson(['message' => "Hall created", "status" => 200]);
    }

    /**
    * Test testUserIdIsInvalidOnHallCreation
    */
    public function testUserIdIsInvalidOnHallCreation()
    {
        $response = $this->call('POST', '/api/hall/create', $this->hallFakeData());

        $response
        ->assertStatus(500)
        ->assertJson(['user_id' => ["The selected user id is invalid."]]);
    }

    /**
    * Test testUserIdIsInvalidOnHallCreation
    */
    public function testHallNameIsUnique()
    {
        // first create a user
        $this->createUser();

        $this->call('POST', '/api/hall/create', $this->hallFakeData());
        
        $response = $this->call('POST', '/api/hall/create', $this->hallFakeData());

        $response
        ->assertStatus(500)
        ->assertJson(['name' => ["The name has already been taken."]]);
    }

    /**
    * Test testFindAHallById
    */
    public function testFindAHallById()
    {
        $this->createUser();

        $this->call('POST', '/api/hall/create', $this->hallFakeData());

        $response = $this->call('GET', '/api/hall/1');

        $response
        ->assertStatus(200)
        ->assertJsonStructure();
    }

    /**
    * Test find all Halls
    */
    public function testFindAllHall()
    {
        $this->createUser();

        $this->call('POST', '/api/hall/create', $this->hallFakeData());

        $response = $this->call('GET', '/api/halls');

        $response
        ->assertStatus(200)
        ->assertJsonStructure();
    }
}
