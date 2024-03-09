<?php

namespace App\Controllers;

class Auth extends BaseController
{
    public function login(): string
    {
        return view('auth/login');
    }
    
    public function register(){
        
        $method = $this->request->getMethod('true');
        if($method === "POST"){
            $data = $this->request->getPost();
            $rules =[
                'last_name' => 'required|max_length[255]|min_length[3]',
                'first_name' => 'required|max_length[255]|min_length[3]',
                'email' => 'required|valid_email|is_unique[users.email]',
                'password' =>'required|min_length[8]',
                'passwordConfirm' =>'required|matches[password]'
            ];
            
            //Si les regles ne sont pas appliquées on retourne les erreurs de l'utilisateur
            if(!$this->validate($rules)){
                session()->setFlashdata('errors', $this->validator->getErrors());
                return redirect()->back()->withInput();
            }
        }
        return view('auth/register');
    }
}


/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

