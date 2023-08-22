<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Authrepo;
use App\Http\Traits\ResponsesTraits;
use Tymon\JWTAuth\Facades\JWTAuth;
use Symfony\Component\HttpFoundation\Response;

class AuthApiController extends Controller
{

    use ResponsesTraits;

    public $authrepo;

    public function __construct(Authrepo $authrepo)
    {
        $this->authrepo = $authrepo;
    }


    public function login(Request $request)
    {        
        try {
            $user = $this->authrepo->login($request->all());
            $token = JWTAuth::fromUser($user);        
            
             $this->successResponse([
                'user' => $user,
                'token' => $token,
            ], 'User Login Successfully', Response::HTTP_OK);

            } catch (\Exception $e) {
                return $this->errorResponse('Invalid credentials', Response::HTTP_INTERNAL_SERVER_ERROR);
            }
    }
}
