<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hall extends Model
{    
    protected $fillable = [
    	"lat",
        "lng",
        'name',
        'label',
        'image',
    	'status',
        'address',
        'user_id', 
    ];

	public function booking()
	{
	    return $this->hasMany('App\Booking');
	}

	protected $casts = [
	    'lng' => 'float',
	    'lat' => 'float',
	];
}
