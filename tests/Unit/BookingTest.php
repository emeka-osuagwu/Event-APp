<?php

namespace Tests\Feature;

use App\Hall;
use App\User;
use App\Booking;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class BookingTest extends TestCase
{

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
     * bookingFakeData 
     */
    public function bookingFakeData()
    {
        return [
            "user_name"=> "wjfkerfenrj",
            "user_email"=> "rerferer",
            "user_phone"=> "erferere",
            "user_logo"=> "erhfjerer",
            "hall_id"=> 1,
        ];
    }

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
    * testIdIsValidOnCreateBooking
    */
    public function testIdIsValidOnCreateBooking()
    {
        $response = $this->call('POST', '/api/hall/1/book', $this->bookingFakeData());

        $response
        ->assertStatus(401)
        ->assertJson(['hall_id' => ["The selected hall id is invalid."]]);
    }

    /**
    * testCreateBooking
    */    
    public function testCreateBooking()
    {
        $this->createUser();

        $this->call('POST', '/api/hall/create', $this->hallFakeData());

        $response = $this->call('POST', '/api/hall/1/book', $this->bookingFakeData());

        $response
        ->assertStatus(201)
        ->assertJson(['message' => "booking created", "status" => 201]);
    }

    /**
    * testCheckIfHallHasBeenBooked
    */    
    public function testCheckIfHallHasBeenBooked()
    {
        $this->createUser();

        $this->call('POST', '/api/hall/create', $this->hallFakeData());

        $this->call('POST', '/api/hall/1/book', $this->bookingFakeData());
        $response = $this->call('POST', '/api/hall/1/book', $this->bookingFakeData());
        
        $response
        ->assertStatus(401)
        ->assertJson(['message' => "Hall has been booked", "status" => 401]);
    }

    /**
    * test get booking by id
    */    
    public function testGetBookingById()
    {
        $this->createUser();

        $this->call('POST', '/api/hall/create', $this->hallFakeData());

        $this->call('POST', '/api/hall/1/book', $this->bookingFakeData());
        $this->call('POST', '/api/hall/1/book', $this->bookingFakeData());
        $response = $this->call('GET', '/api/booking/1');

        $response
        ->assertStatus(200)
        ->assertJsonStructure();

    }
}
