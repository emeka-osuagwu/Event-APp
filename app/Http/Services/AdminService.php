<?php

namespace App\Http\Services;

use App\User;

class AdminService
{

	/**
	* Create an Admin in the database
	*
	* @param data
	*
	* @return admin
	*/
	public function create($data)
	{
		$create = [
			'email' => $data['email'],
			'password' => $data['password']
		];

		$admin =  User::create($create);
		
		return $admin;
	}

	/**
	* Get Admin by ID in the database
	*
	* @param field
	* @param value
	*
	* @return admin
	*/
	public function getAdminBy($field, $value)
	{
		return User::where($field, $value);
	}

}


