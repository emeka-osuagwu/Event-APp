<?php

namespace Emeka\MO\Web\Controllers;

use Emeka\MO\Services\MOService;

class AppController
{

	/**
	* MoService service instance
	* @var
	*/
	private $moService;

	/**
	* Creates an instance of AppController
	*/
	function __construct()
	{
		$this->moService = new MOService;
	}

	/**
	* Index
	*
	* @param $request
	* @param $response
	*
	* @return json || string
	*/
	public function index($request, $response)
	{
		if (empty($request->getParams())) 
		{
			// get all request from the database
			echo $this->moService->getAllRequest();
		}
		else 
		{
			// create new request
			$this->moService->createRequest($request->getParams());
			echo "Thanks :). Your request has been well received";
		}
	}

}