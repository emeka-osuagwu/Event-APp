<?php

namespace App\Http\Controllers;

use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use App\Events\SendEmail;
use App\Http\Services\JWTService;
use App\Http\Services\AdminService;
use Illuminate\Support\Facades\Auth;
use App\Http\Validations\AdminValidation;

class AdminController extends Controller
{

	/**
	* AdminService service instance
	* @var
	*/
	private $adminService;

	/**
	* AdminValidation service instance
	* @var
	*/
	private $adminValidation;
	
	/**
	* JWTService service instance
	* @var
	*/
	private $jwtService;

	/**
	* Creates an instance of AdminController
	*/
	public function __construct
	(
	    JWTService $jwtService,
	    AdminService $adminService,
	    AdminValidation $adminValidation
	) 
	{
		$this->jwtService = $jwtService;
		$this->adminService = $adminService;
		$this->adminValidation = $adminValidation;
	}

	/**
	* Create an Admin in the database
	*
	* @param Request $request
	*
	* @return json
	*/
	public function postCreateAdmin(Request $request)
	{
		$validator = $this->adminValidation->createValidation($request->all());

		if ($validator->fails()) 
		{
			return sendResponse($validator->errors(), 400);
		}

		$admin = $this->adminService->create($request->all());

		$response_data = [
			"status" => 201,
			"message" => "Account Created"
		];

		event(new SendEmail($admin));

		return sendResponse($response_data, 201);
	}

	/**
	* Authenticate an admin
	*
	* @param Request $request
	*
	* @return json
	*/
	public function postLoginAdmin(Request $request)
	{

		if (Auth::attempt(['email' => $request['email'], 'password' => $request['password']])) {
		    
			$user = $this->adminService->getAdminBy('email', $request['email'])->get()->first();

		    $key = $this->jwtService->jwt_key();

		    $token 	= 
		    [
		    	"iss"	=> $this->jwtService->jwt_issuer(),
		    	"iat"	=> $this->jwtService->jwt_issuer_at(),
		    	"nbf"	=> $this->jwtService->jwt_not_before(),
		    	"exp"	=> $this->jwtService->jwt_expiration_time(),
		    	"data"	=> 
		    	[
		    		"id"	=> $user['id'],
		    		"email"	=> $user->email,

		    	]
		    ];

		    $response_data = [
		    	"status" => 200,
		    	"message" => "login",
		    	"token" => JWT::encode($token, $key, 'HS512')
		    ];

		    return sendResponse($response_data, 200);
		} 
		else 
		{
			return sendResponse(['error' => 'Invalid credentials'], 401);
		}

	}
}
