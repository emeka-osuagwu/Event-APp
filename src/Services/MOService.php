<?php

namespace Emeka\MO\Services;

use Emeka\MO\Web\Models\MO;

class MOService
{
	/**
	* Get all request from database
	*/
	public function getAllRequest()
	{
		return MO::get();
	}

	/**
	* Get all request from database by value
	* @param field
	* @param value
	*/
	public function getRequestBy($field, $value)
	{
		return MO::where($field, $value);
	}

	/**
	* Create new request in database
	* @param data
	* @var array
	*
	* @return array
	*/
	public function createRequest($data)
	{
		return MO::create($data);
	}
}