<?php

namespace App\Http\Controllers;

use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use App\Jobs\SendBookingEmail;
use App\Http\Services\HallService;
use App\Http\Services\BookingService;
use App\Http\Validations\BookingValidation;

class BookingController extends Controller
{

	/**
	* HallService service instance
	* @var
	*/
	private $hallService;

	/**
	* BookingService service instance
	* @var
	*/
	private $bookingService;

	/**
	* BookValidation service instance
	* @var
	*/
	private $bookingValidation;

	/**
	* Creates an instance of BookingController
	*
	* @param HallService $hallService
	* @param BookingService $bookingService
	* @param BookingValidation $bookingValidation
	*/
	public function __construct
	(
	    HallService $hallService,
	    BookingService $bookingService,
	    BookingValidation $bookingValidation
	) 
	{
		$this->hallService = $hallService;
		$this->bookingService = $bookingService;
		$this->bookingValidation = $bookingValidation;
	}

	/**
	* create booking
	*
	* @param $id
	* @param $request
	*
	* @return Response
	*/
	public function postCreateBooking(Request $request, $id)
	{
		
		$request['hall_id'] = $id;
		
		$validator = $this->bookingValidation->createValidation($request->all());

		if ($validator->fails()) 
		{
			return sendResponse($validator->errors(), 401);
		}
		else
		{
			$hall = $this->hallService->getHallBy('id', $request['hall_id'])->get()->first();

			if ($hall->status == "booked") 
			{
				$response_data = [
					"status" => 401,
					"message" => "Hall has been booked"
				];
				
				return sendResponse($response_data,  401);
			}

			$this->hallService->updateStatusToBooked($id);

			$booking = $this->bookingService->create($request->all());

			$response_data = [
				"status" => 201,
				"message" => "booking created"
			];
			
			// return dispatch(new SendBookingEmail($booking));
			return sendResponse($response_data,  201);
			
		}
	}

	/**
	* get a booking form the database
	*
	* @param $id
	*
	* @return Booking
	*/
	public function getBooking($id)
	{
		$validator = $this->bookingValidation->getBookingValidation(['id' => $id]);

		if ($validator->fails()) 
		{
			return sendResponse($validator->errors(), 401);
		}
		
		$response_data = [
			"status" => 200,
			"message" => "booking created",
			"booking" => $this->bookingService->getBookingBy('id', $id)->get()
		];
		
		return sendResponse($response_data, 200);

	}

}
