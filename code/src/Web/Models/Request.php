<?php

namespace Emeka\MO\Web\Models;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
	/**
	* The database table used by the model.
	* @var string
	*/
	protected $table = "request";

	/**
	* The attributes that are mass assignable.
	* @var array
	*/
	protected $fillable = [
		'id', 
		'text', 
		'msisdn', 
		'status', 
		'operatorid', 
		'shortcodeid', 
		'created_at',
	];
}