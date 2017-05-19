<?php 

namespace App\Http\Validations;

use Validator;

class BookingValidation
{
	public function createValidation($data)
	{
		$validator = Validator::make($data, [
			'hall_id' 		=> 'required|exists:halls,id',
			'user_name' 	=> 'required|string',
			'user_email' 	=> 'required|string',
			'user_phone' 	=> 'required|string',
			'user_logo' 	=> 'required|string',
		]);

		return $validator;
	}

	public function getBookingValidation($data)
	{
		$validator = Validator::make($data, [
			'id' 		=> 'required|exists:bookings',
		]);

		return $validator;
	}
}