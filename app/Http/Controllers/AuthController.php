<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuarios;
//use JWTAuth;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Requests\AuthenticateRequest;

use Hash;
use Validator;

class AuthController extends Controller
{
	 public function authenticate(Request $request) {
	 	// Pega somente email e password
      	$credentials = $request->only('email', 'password');

		$validator = Validator::make($credentials, [
			'password' => 'required',
			'email' => 'required'
		]);

		if($validator->fails()) {
			return response()->json([
				'message'   => 'Dados invalidos',
				'errors'        => $validator->errors()->all()
			], 422);
		}

      	$usu = Usuarios::where('email', $credentials['email'])->first();

      	// Valida usuario
		if(!$usu) {
			return response()->json([
			  'error' => 'Email invalido'
			], 401);
		}

		// Validate Password
		if (!Hash::check($credentials['password'], $usu->password)) {
			return response()->json([
				'error' => 'Senha invalida'
			], 401);
		}

		// Gera Token
		$token = JWTAuth::fromUser($usu);

		// Obter tempo de expiração
		$objectToken = JWTAuth::setToken($token);
		$expiration = JWTAuth::decode($objectToken->getToken())->get('exp');
		
		return response()->json([
		    'Token de acesso' => $token,
		    'expiram em' => $expiration,
	  	]);

	  	//return response()->json($token);

      	
	 }
    
}
