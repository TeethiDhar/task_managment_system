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

    protected $authrepo; // Use protected instead of public for better encapsulation

    public function __construct(Authrepo $authrepo)
    {
        $this->authrepo = $authrepo;
    }

    public function login(Request $request)
    {
        try {
            $user = $this->authrepo->login($request->all());
            $token = JWTAuth::fromUser($user);
            
            return $this->successResponse([
                'user' => $user,
                'token' => $token,
            ], 'User Logged In Successfully', Response::HTTP_OK);

        } catch (\Exception $e) {
            return $this->errorResponse('Invalid credentials', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
