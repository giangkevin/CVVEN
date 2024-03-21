<?php

namespace App\Controllers;

class Auth extends BaseController
{
    public function login()
    {
        $method = $this->request->getMethod('true');
        
        if($method === "POST"){
            $data = $this->request->getPost();
            
            $userModel = new \App\Models\Users();
            $rules =[
                'email' => 'required|valid_email',
                'password' => 'required|min_length[8]',
                
            ];
            
            if(!$this->validate($rules)){
                return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            }
            
            $user = $userModel->where('email', $data['email'])->first();
            
            if(!$user){
                return redirect()->back()->withInput()->with('errors',['email' => 'L\'email saisi n\'existe pas']);
            }
           
            $passwordCheck = password_verify($data['password'], $user->password);
            if (!$passwordCheck) {
                return redirect()->back()->withInput()->with('errors', ['password' => 'Le mot de passe ne correspond pas']);
            }

            session()->set('user',[
                'id'=>$user->id,
                'last_name'=>$user->last_name,
                'first_name'=>$user->first_name,
                'email'=>$user->email,
            ]);
            return redirect()->to(base_url('users/profil'));
        }
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
            
            $data['password'] = password_hash($data['password'],PASSWORD_BCRYPT);
            
            $userModel = new \App\Models\Users();
            
            if(!$userModel->save($data)){
                session()->setFlashdata('errors', $userModel->errors());
                return redirect()->back()->withInput();
            }
            return redirect()->to(base_url('auth/login'));
        }
        return view('auth/register');
    }
    
    public function logout(){
        $this->session->destroy();
        return redirect()->to(base_url('auth/login'));
        
    }
}


/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

