<?php

namespace App\Controllers;

use Config\Database;
use App\Controllers\BaseController;

class Shop_a extends BaseController
{
    public function __construct()
    {
        $this->db = Database::connect();
    }
    public function data()
    {
        $this->builder = $this->db->table('data_shop');
        $this->builder->select('*');
        $query = $this->builder->get()->getResult();
        $data = [
            'uri' => $this->uri,
            'result' => $query,
        ];
        return view('/shop_a/data', $data);
    }

    public function add()
    {
        $data = [
            'uri' => $this->uri,
        ];
        return view('/shop_a/add', $data);
    }
    public function edit($id)
    {
        $this->builder = $this->db->table('data_shop');
        $this->builder->select('*');
        $this->builder->where('id', $id);
        $query = $this->builder->get()->getRow();
        $data = [
            'uri' => $this->uri,
            'result' => $query,
        ];
        return view('/shop_a/edit', $data);
    }
    public function delete()
    {
        $id = $this->mRequest->getVar('id');
        $this->builder = $this->db->table('data_shop');
        $this->builder->select('*');
        $this->builder->where('id', $id);
        $this->builder->delete();

        session()->setFlashdata('berhasil', 'Data berhasil dihapus!');
        return redirect()->to('/shop_a/data');
    }

   
    public function store()
    {
        $name = $this->mRequest->getVar('name');
        $jenis = $this->mRequest->getVar('jenis');
        $berat = $this->mRequest->getVar('berat');
        $poin = $this->mRequest->getVar('poin');
        $fileFoto = $this->mRequest->getFile('image');

        // generate nama file
        $image = $fileFoto->getRandomName();
        // pindahkan gambar
        $fileFoto->move('assets/img/shop_a/', $image);


        $data = [
            'name' => $name,
            'jenis' => $jenis,
            'berat' => $berat,
            'image' => $image,
            'poin' => $poin,
            'date_created_shop' => $this->time,
        ];
        $this->builder = $this->db->table('data_shop');
        $this->builder->select('*');
        $this->builder->insert($data);

        session()->setFlashdata('berhasil', 'Data berhasil terkirim!');
        return redirect()->to('/shop_a/data');
    }
    public function update()
    {
        $id = $this->mRequest->getVar('id');
        $name = $this->mRequest->getVar('name');
        $jenis = $this->mRequest->getVar('jenis');
        $berat = $this->mRequest->getVar('berat');
        $poin = $this->mRequest->getVar('poin');
        $fileFoto = $this->mRequest->getFile('image');

        if ($fileFoto->getError() == 4) {
            $image = $this->mRequest->getVar('image-old');
        } else {
            // generate nama file
            $image = $fileFoto->getRandomName();
            // pindahkan gambar
            $fileFoto->move('assets/img/shop/', $image);
            // hapus gambar lama
            unlink('assets/img/shop/' . $this->mRequest->getVar('image-old'));
        }

        $data = [
            'name' => $name,
            'jenis' => $jenis,
            'berat' => $berat,
            'image' => $image,
            'poin' => $poin,
            'date_created_shop' => $this->time,
        ];
        $this->builder = $this->db->table('data_shop');
        $this->builder->select('*');
        $this->builder->where('id', $id);
        $this->builder->update($data);

        session()->setFlashdata('berhasil', 'Data berhasil diupdate!');
        return redirect()->to('/shop_a/data');
    }
}
