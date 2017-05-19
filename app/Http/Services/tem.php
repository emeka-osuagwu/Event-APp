<?php

namespace App\Http\Services;

use App\Event;

class EventSdddervice
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
		$create = [
			'name' => $data['name'],
			'address' => $data['address'],
			'user_id' => $data['user_id'],
			'user_id' => $data['user_id']
		];

		$admin =  Event::create($create);
		
		return $admin;
	}

}


