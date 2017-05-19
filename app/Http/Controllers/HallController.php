<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\HallService;
use App\Http\Validations\HallValidation;

class HallController extends Controller
{

	/**
	* HallService service instance
	* @var
	*/
	private $hallService;

	/**
	* HallValidation service instance
	* @var
	*/
	private $hallValidation;

	/**
	* Creates an instance of HallController
	*/
	public function __construct
	(
	    HallService $hallService,
	    HallValidation $hallValidation
	) 
	{
		$this->hallService = $hallService;
		$this->hallValidation = $hallValidation;
	}

	/**
	* Create an postCreateHall in the database
	*
	* @param Request $request
	*
	* @return json
	*/
	public function postCreateHall(Request $request)
	{
		$validator = $this->hallValidation->createValidation($request->all());

		if ($validator->fails()) 
		{
			return sendResponse($validator->errors(), 500);
		}

		$this->hallService->create($request->all());

		$response_data = [
			"status" => 200,
			"message" => "Hall created"
		];

		return sendResponse($response_data, 200);
	}

	/**
	* getAllHalls in the database
	*
	* @param Request $request
	*
	* @return json
	*/
	public function getAllHalls()
	{
		$response_data = [
			"status" => 200,
			"data" => $this->hallService->getAllHalls()
		];
		
		return sendResponse($response_data, 200);
	}

	/**
	* getHall in the database
	*
	* @param Request $request
	*
	* @return json
	*/	
	public function getHall($id)
	{
		$validator = $this->hallValidation->findHallValidation(['id' => $id]);

		if ($validator->fails()) 
		{
			return sendResponse($validator->errors(), 500);
		}

		$data = $this->hallService->getHallBy('id', $id)->get();

		$response_data = [
			"status" => 200,
			"message" => "Record Found",
			"data" => $data
		];

		return sendResponse($response_data, 200);
	}
}
