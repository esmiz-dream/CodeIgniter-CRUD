<?php

namespace App\Controllers;

use App\Models\UserModel;

class User extends BaseController
{
   public  $session='';
    function __construct()
    {
        $validation = \Config\Services::validation();
        $this->session = \Config\Services::session();
        helper(array('form', 'url'));

    }




    public function login()
    {

        if ($this->request->getMethod() === 'get') {
            if (isset($_SESSION['user'])) {
                return view('/dashboard');
            }
            return view('login');

        } else if ($this->request->getMethod() === 'post') {

            $check = $this->validate([
                'email' => 'required|valid_email',
                'password' => 'required|min_length[8]',
            ]);

            if ($check) {

                $data = [
                    'email' => $this->request->getPost('email'),
                    'password' => $this->request->getpost('password') ,
                ];
                $userModel = new UserModel();
                $user = $userModel->where('email', $data['email'])->first();
                if ($user) {
                    if (password_verify($data['password'], $user['password'])) {
                        $this->session->set(
                            'user',
                            array(
                                'name' => $user['name'],
                                'id' => $user['id'],
                            )
                        );
                        $logedin_user['row']=$user;
                        return view('/dashboard', $logedin_user);
                    }
                    return view('login', ['validation' => 'Please Check Your Email or Password']);
                }
                return view('login', ['validation' => 'Your didnt registered yet!! please register now']);

            }
            else {
                return view('login', ['validation' => 'Please Check Your Email Or Password']);

            }

        }
    }

    public function find($name)
    {
        $data['name'] = $name;
        return view('product', $data);

    }
    public function create()
    {
        return view('register');
    }

    public function store()
    {
        $validation = \Config\Services::validation();
        $session = \Config\Services::session();

        $check = $this->validate([
            'name' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'your name is required',
                ]
            ],
            'email' => 'required|valid_email',
            'password' => 'required|min_length[4]',
            'cpassword' => 'required|min_length[4]'
        ]);


        if ($check) {
            $user = new UserModel();
            $data = [
                'name' => $this->request->getPost('name'),
                'email' => $this->request->getPost('email'),
                'password' => password_hash($this->request->getpost('password'), PASSWORD_BCRYPT),

            ];
            $result = $user->save($data);
            //  $result = true;
            if ($result) {

                $session->set(
                    'user',
                    array(
                        'name' => $data['name'],
                        'id' => $user->getInsertID()
                    )
                );
                $loged_user['row'] =$user->first();
                return view('/dashboard', $loged_user,['success', 'user created']);
            } else {
                return view('register', ['validation' => $this->validator]);
            }
        } else {
            return view('register', ['validation' => $this->validator]);
        }



    }

    public function logout()
    {
        $session = \Config\Services::session();
        $session->destroy();
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