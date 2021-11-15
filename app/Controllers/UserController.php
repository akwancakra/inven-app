<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class UserController extends BaseController
{
    protected $model;

    public function __construct()
    {
        $this->model = new UserModel();
    }
    
    public function index()
    {
        $data = [
            'title' => 'User Menu | InvenApp'
        ];
        
        return view('main/user/index', $data);
    }

    public function list()
    {
        // $user = $this->model->findAll();

        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $user = $this->model->search($keyword);
        }else{
            $user = $this->model;
        }
        // KALO CURRENT PAGE ADA ISINYA
        $currentPage = $this->request->getVar('page_user') ? $this->request->getVar('page_user') : 1;
        $data = [
            'title' => 'List User | InvenApp',
            'user' => $user->paginate(1, 'user'),
            'pager' => $this->model->pager,
            'currentPage' => $currentPage,
            // 'user' => $user,
        ];
        
        return view('main/user/list', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Add User | InvenApp',
        ];
        
        return view('main/user/add', $data);
    }

    public function adduser()
    {
        if (!$this->validate([
            'name' => 'required|max_length[30]',
            'email' => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[5]'
        ])) {
            return redirect()->back()->withInput();
        }

        $name = $this->request->getPost('name');
        $email = $this->request->getPost('email');
        $level = $this->request->getPost('level');
        $password = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);

        $user = [
            'name' => $name,
            'level' => $level,
            'email' => $email,
            'password' => $password
        ];

        $save = $this->model->save($user);

        if ($save) {
            session()->setFlashdata('success', 'User Successfully added!');
            return redirect()->to('/user');
        } else {
            session()->setFlashdata('error', $this->model->errors());
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $user = $this->model->find($id);

        $data = [
            'title' => 'Edit User | InvenApp',
            'data' => $user
        ];
        
        return view('main/user/edit', $data);
    }

    public function edituser()
    {
        $id = $this->request->getPost('id');
        
        if (!$this->validate([
            'name' => 'required|max_length[30]',
            'email' => 'required|valid_email|is_unique[users.email,id,'.$id.']',
            'password' => 'required|min_length[5]'
        ])) {
            return redirect()->to('/user/edit/'.$id)->withInput();
        }
        
        $name = $this->request->getPost('name');
        $email = $this->request->getPost('email');
        $level = $this->request->getPost('level');
        $password = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
        

        $user = [
            'id' => $id,
            'name' => $name,
            'level' => $level,
            'email' => $email,
            'password' => $password
        ];

        $save = $this->model->save($user);

        if ($save) {
            session()->setFlashdata('success', 'User Successfully edited!');
            return redirect()->to('/user');
        } else {
            session()->setFlashdata('error', $this->model->errors());
            return redirect()->back();
        }
    }

    public function detail($id)
    {
        $user = $this->model->find($id);

        if ($user == null) {
            throw new \CodeIgniter\Router\Exceptions\RedirectException('/user');
        }
        
        $data = [
            'title' => 'Detail User | InvenApp',
            'data' => $user
        ];
        
        return view('main/user/detail', $data);
    }

    public function delete($id)
    {
        // $user = $this->model->find($id);
        $this->model->delete($id);
        
        session()->setFlashdata('success', 'User Successfully deleted!');
        return redirect()->to('/user');
    }
}