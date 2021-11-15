<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BarangModel;
use App\Models\UserModel;

class MainController extends BaseController
{
    public function index()
    {
        $usermodel = new UserModel();
        $barangmodel = new BarangModel();

        $barang = $barangmodel->countAllResults();
        $user = $usermodel->countAllResults();

        $data = [
            'title' => 'Dashboard | InvenApp',
            'user' => $user,
            'barang' => $barang,
        ];
        
        return view('main/dashboard', $data);
    }

    public function profile()
    {
        $data = [
            'title' => 'Profile | InvenApp'
        ];
        
        return view('main/profile', $data);
    }
}