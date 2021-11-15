<?php

namespace App\Models;

use CodeIgniter\Model;

class StokModel extends Model
{
    protected $table = 'stok';
    protected $allowedFields = ['id_barang', 'amount_in', 'amount_out', 'total'];
    protected $useTimeStamps = true;
}