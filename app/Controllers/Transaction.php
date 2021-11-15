<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TransactionModel;

class Transaction extends BaseController
{
    protected $model;

    public function __construct()
    {
        $this->model = new TransactionModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Transaction Menu | InvenApp',
        ];
        
        return view('main/transaction/index', $data);
    }

    public function list()
    {
        $transaction = $this->model->findAll();

        $data = [
            'title' => 'Transaction Menu | InvenApp',
            'transaction' => $transaction
        ];
        
        return view('main/transaction/list', $data);
    }

    public function delete($id)
    {
        $this->model->delete($id);

        session()->setFlashdata('success', 'Transaction Successfully deleted!');
        return redirect()->to('/pinjam');
    }
}