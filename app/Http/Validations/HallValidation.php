<?php 

namespace App\Http\Validations;

use Validator;

class HallValidation
{
	public function createValidation($data)
	{
		$validator = Validator::make($data, [
			'name' => 'required|unique:halls',
			'address' => 'required|string',
			'user_id' => 'required|exists:users,id',
			'lat' => "required|numeric",
			'lng' => "required|numeric"
		]);

		return $validator;
	}

	public function findHallValidation($data)
	{
		$validator = Validator::make($data, [
			'id' => 'required|exists:halls',
		]);

		return $validator;
	}

}
