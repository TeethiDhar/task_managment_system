<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Authrepo
{

    public function login(array $data)
    {
        $credentials = [
            'email' => $data['email'],
            'password' => $data['password'],
        ];

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            return $user;
        } else {

        throw new \Exception('Invalid credentials');
        
        }
    }
}

?>