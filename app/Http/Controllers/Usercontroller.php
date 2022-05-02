<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Usercontroller extends Controller
{
    public function register(){
        return view ('user/register');
    }

    public function userRegister(){
        return view ('user/register');
    }
}
