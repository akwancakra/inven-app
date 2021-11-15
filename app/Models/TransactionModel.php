<?php

namespace App\Models;

use CodeIgniter\Model;

class TransactionModel extends Model
{
    protected $table = 'transaction';
    protected $allowedFields = ['id_barang', 'id_user', 'name', 'amount', 'date_in', 'date_out', 'kondisi'];
}