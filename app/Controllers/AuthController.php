<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class AuthController extends BaseController
{
    protected $model;

    public function __construct()
    {
        $this->model = new UserModel();
    }
    
    // MAKING REGISTER FUNCTION

    public function register()
    {
        return view('auth/register');
    }

    public function postregister()
    {
        if (!$this->validate([
            'name' => 'required|max_length[30]',
            'email' => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[5]'
        ])) {

            // $validation = \Config\Services::validation();
            return redirect()->to('/register')->withInput();
        }
        
        $name = $this->request->getPost('name');
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = [
            'name' => $name,
            'level' => 'operator',
            'email' => $email,
            'password' => $password
        ];

        $save = $this->model->save($user);

        if ($save) {
            session()->setFlashdata('success', 'Register Berhasil!');
            return redirect()->to('/login');
        } else {
            session()->setFlashdata('error', $this->model->errors());
            return redirect()->back();
        }
    }

    // MAKING LOGIN FUNCTION

    public function login()
    {
        return view('auth/login');
    }

    public function postlogin()
    {
        if (!$this->validate([
            'email' => 'required|valid_email',
            'password' => 'required'
        ])) {
            return redirect()->to('/login');
        }
        
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $credentials = ['email' => $email];

        $user = $this->model->where($credentials)
            ->first();

        if (! $user) {
            session()->setFlashdata('error', 'Email or password is wrong.');
            return redirect()->back();
        }

        $passwordCheck = password_verify($password, $user['password']);

        if (! $passwordCheck) {
            session()->setFlashdata('error', 'Email or password is wrong.');
            return redirect()->back();
        }

        $userData = [
            'name' => $user['name'],
            'level' => $user['level'],
            'email' => $user['email'],
            'logged_in' => TRUE
        ];

        session()->set($userData);
        return redirect()->to('/dashboard');
    }

    public function logout()
    {
        $userData = [
            'name',
            'email',
            'level',
            'logged_in'
        ];

        session()->remove($userData);
        return redirect()->to('/login');
    }
}