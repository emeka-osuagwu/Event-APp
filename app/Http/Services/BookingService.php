<?php

namespace App\Http\Services;

use App\Booking;

class BookingService
{

	/**
	 * Set Transaction Mgt prop
	 *
	 * @param TransactionManagement $transactionManager
	 *
	 * @return self
	 */
	public function create($data)
	{
		$booking =  Booking::create($data);
		return $booking;
	}

	public function getBookingBy($feild, $value)
	{
		return Booking::where($feild, $value)->with('hall');
	}

}


