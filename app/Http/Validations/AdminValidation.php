<?php 

namespace App\Http\Validations;

use Validator;

class AdminValidation
{
	public function createValidation($data)
	{
		$validator = Validator::make($data, [
			'email' 		=> 'required|email|unique:users',
			'address' 		=> 'string',
			'password' 		=> 'required',
			'last_name' 	=> 'max:50|min:4|string',
			'first_name' 	=> 'max:50|min:4|string',
			'phone_number' 	=> 'string',
			'business_name' => 'string',
		]);

		return $validator;
	}

}
