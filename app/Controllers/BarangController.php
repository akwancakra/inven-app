<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BarangModel;
use CodeIgniter\I18n\Time;

class BarangController extends BaseController
{
    protected $model;

    public function __construct()
    {
        $this->model = new BarangModel();
    }
    
    public function index()
    {        
        $data = [
            'title' => 'Barang Menu | InvenApp'
        ];
        
        return view('main/barang/index', $data);
    }

    public function barang()
    {
        $barang = $this->model->findAll();

        $data = [
            'title' => 'Barang Menu | InvenApp',
            'barang' => $barang
        ];
        
        return view('main/barang/list', $data);
    }

    public function detail($id)
    {
        $barang = $this->model->find($id);

            $data = [
                'title' => 'Detail Barang | InvenApp',
                'data' => $barang
            ];
            
            return view('main/barang/detail', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Add Barang | InvenApp',
        ];
        
        return view('main/barang/add', $data);
    }

    public function barangadd()
    {
        if (!$this->validate([
            'name' => 'required',
            'locate' => 'required',
            'details' => 'required',
            'kondisi' => 'required',
            'amount' => 'required',
            'source' => 'required',
            'photo' => 'mime_in[photo,image/jpg,image/jpeg,image/gif,image/png]|max_size[photo,2048]|is_image[photo]|ext_in[photo,png,jpeg,jpg,gif]'
        ])) {
            return redirect()->back()->withInput();
        }

        $photo = $this->request->getFile('photo');
        if ($photo->getError() == 4 ) {
            $newName = 'product-default.jpg';
        }else{
            \Config\Services::image()->withFile($photo)->resize(300, 300, true, 'height')->save('../public/images/product/'. $newName = $photo->getRandomName());
            // $newName = $photo->getRandomName();
            // $photo->move('../public/images/product', $newName);
        }
        
        $created = new Time('now', 'Asia/Jakarta');

        $barang = [
            'name' => $this->request->getVar('name'),
            'details' => $this->request->getVar('details'),
            'locate' => $this->request->getVar('locate'),
            'kondisi' => $this->request->getVar('kondisi'),
            'amount' => $this->request->getVar('amount'),
            'source' => $this->request->getVar('source'),
            'photo' => $newName,
            'created_at' => $created
        ];

        $save = $this->model->save($barang);

        if ($save) {
            session()->setFlashdata('success', 'Barang Successfully added!');
            return redirect()->to('/barang');
        } else {
            session()->setFlashdata('error', $this->model->errors());
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $barang = $this->model->find($id);

        $data = [
            'title' => 'Edit Barang | InvenApp',
            'data' => $barang
        ];
        
        return view('main/barang/edit', $data);
    }

    public function barangedit($id)
    {
        if (!$this->validate([
            'name' => 'required',
            'locate' => 'required',
            'details' => 'required',
            'kondisi' => 'required',
            'amount' => 'required',
            'source' => 'required',
            'photo' => 'mime_in[photo,image/jpg,image/jpeg,image/gif,image/png]|max_size[photo,2048]|is_image[photo]|ext_in[photo,png,jpeg,jpg,gif]'
        ])) {
            return redirect()->back()->withInput();
        }

        $photo = $this->request->getFile('photo');
        $oldphoto = $this->request->getVar('oldphoto');
        if ($photo->getError() == 4 ) {
            $newName = $oldphoto;
        }else{
            \Config\Services::image()->withFile($photo)->resize(300, 300, true, 'height')->save('../public/images/product/'. $newName = $photo->getRandomName());
            // $newName = $photo->getRandomName();
            // $photo->move('../public/images/product/', $newName);
            if ($oldphoto != 'product-default.jpg') {
                unlink('../public/images/product/'. $oldphoto);
            }
        }

        $updated = new Time('now', 'Asia/Jakarta');

        $barang = [
            'name' => $this->request->getVar('name'),
            'details' => $this->request->getVar('details'),
            'locate' => $this->request->getVar('locate'),
            'kondisi' => $this->request->getVar('kondisi'),
            'amount' => $this->request->getVar('amount'),
            'source' => $this->request->getVar('source'),
            'photo' => $newName,
            'updated_at' => $updated
        ];

        $save = $this->model->update($id ,$barang);

        if ($save) {
            session()->setFlashdata('success', 'Barang Successfully edited!');
            return redirect()->to('/barang');
        } else {
            session()->setFlashdata('error', $this->model->errors());
            return redirect()->back();
        }
    }

    public function delete($id)
    {
        $barang = $this->model->find($id);
        if ($barang['photo'] != 'product-default.jpg') {
            unlink('../public/images/product/'. $barang['photo']);
        }
        
        $save = $this->model->delete($id);

        if ($save) {
            session()->setFlashdata('success', 'Barang Successfully deleted!');
            return redirect()->to('/barang');
        } else {
            session()->setFlashdata('error', $this->model->errors());
            return redirect()->back();
        }
    }
}