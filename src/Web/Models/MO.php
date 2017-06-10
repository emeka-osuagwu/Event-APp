<?php

namespace Emeka\MO\Web\Models;

use Illuminate\Database\Eloquent\Model;

class MO extends Model
{
	/**
	* The database table used by the model.
	* @var string
	*/
	protected $table = "mo";

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