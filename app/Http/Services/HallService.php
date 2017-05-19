<?php

namespace App\Http\Services;

use App\Hall;

class HallService
{

	public function getAllHalls()
	{
		return Hall::with('booking')->get();
	}

	/**
	 * Set Transaction Mgt prop
	 *
	 * @param TransactionManagement $transactionManager
	 *
	 * @return hall
	 */
	public function create($data)
	{
		$data['label'] = strtoupper($data['name'][0]);
		
		$hall =  Hall::create($data);
		
		return $hall;
	}

	public function getHallBy($feild, $value)
	{
		return Hall::where($feild, $value)->with('booking');
	}

	public function updateStatusToBooked($id)
	{
		Hall::where('id', $id)->update(['status' => 'booked']);
	}

}


