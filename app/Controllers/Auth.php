<?php

namespace App\Controllers;

class Auth extends BaseController
{
    public function login(): string
    {
        return view('auth/login');
    }
    
    public function register(): string{
        return view('auth/register');
    }
}


/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

