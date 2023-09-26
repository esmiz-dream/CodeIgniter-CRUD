<?php

namespace App\Controllers;
use App\Models\UserModel;

class Home extends BaseController
{
    public function index(): string
    {
        return view('welcome_message');
    }

    public function home(){
        return view('welcome_message');

    }

    public function dashboard(){
        if (isset($_SESSION['user'])) {
            $userModel = new UserModel();
            $user['row'] = $userModel->where('id',$_SESSION['user']['id'])->first();
            
            return view('/dashboard',$user);
        }
    return view('welcome_message');
    }
}
