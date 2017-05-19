<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
	protected $fillable = [
	    'hall_id', 
	    'user_name', 
	    'user_email',
	    'user_phone',
	    'user_logo',
	];

	public function hall()
	{
	    return $this->belongsTo('App\Hall');
	}
}
