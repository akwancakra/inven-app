<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\StokModel;

class Stok extends BaseController
{
    protected $model;
    public function __construct()
    {
        $this->model = new StokModel();
    }

    public function index()
    {
        $stok =  $this->model->findAll();

        $data = [
            'title' => 'Stok Barang | InvenApp',
            'stok' => $stok
        ];

        return view('main/barang/stok/list', $data);
    }
}