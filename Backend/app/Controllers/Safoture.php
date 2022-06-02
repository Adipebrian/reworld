<?php

namespace App\Controllers;

use Config\Database;

class Safoture extends BaseController
{
    public function __construct()
    {
        $this->db = Database::connect();
    }
    
    public function index()
    {
        return view('safoture/index');
    }
    public function add()
    {
        $data = [
            'uri' => $this->uri,
        ];
        return view('safoture/add',$data);
    }
    public function edit($id)
    {
        $this->builder = $this->db->table('data_safoture');
        $this->builder->select('*');
        $this->builder->where('id', $id);
        $query = $this->builder->get()->getRow();
        $data = [
            'uri' => $this->uri,
            'result' => $query,
        ];
        return view('/safoture/edit', $data);
    }
    public function data()
    {
        $this->builder = $this->db->table('data_safoture');
        $this->builder->select('*');
        $result = $this->builder->get()->getResult();
        $data = [
            'result' => $result,
            'uri' => $this->uri,
        ];
        return view('safoture/data',$data);
    }


    // action
    public function store()
    {
        $name = $this->mRequest->getVar('name');
        $jenis = $this->mRequest->getVar('jenis');
        $status = $this->mRequest->getVar('status');
        $catatan = $this->mRequest->getVar('catatan');
        $berat = $this->mRequest->getVar('berat');
        
        $map = $this->mRequest->getVar('maps');
        if($map){
            $maps = $this->mRequest->getVar('maps');
        }else{
            $maps = 0;
        }
        $user_id = $this->user_id;
        $fileFoto = $this->mRequest->getFile('image');

        // generate nama file
        $image = $fileFoto->getRandomName();
        // pindahkan gambar
        $fileFoto->move('assets/img/safoture/', $image);


        $data = [
            'name' => $name,
            'jenis_makanan' => $jenis,
            'catatan' => $catatan,
            'image' => $image,
            'maps' => $maps,
            'berat' => $berat,
            'user_id' => $user_id,
            'date_created' => $this->time,
            'status_konfirmasi' => 0,
            'status_order' => 0,
            'status_makanan' => $status,
        ];
        $this->builder = $this->db->table('data_safoture');
        $this->builder->select('*');
        $this->builder->insert($data);

        session()->setFlashdata('berhasil', 'Data berhasil terkirim!');
        return redirect()->to('/safoture/data');
    }
    public function update()
    {
        $id = $this->mRequest->getVar('id');
        $name = $this->mRequest->getVar('name');
        $jenis = $this->mRequest->getVar('jenis');
        $status = $this->mRequest->getVar('status');
        $catatan = $this->mRequest->getVar('catatan');
        $berat = $this->mRequest->getVar('berat');
        $maps = $this->mRequest->getVar('maps');
        $user_id = $this->user_id;
        $fileFoto = $this->mRequest->getFile('image');

        if ($fileFoto->getError() == 4) {
            $image = $this->mRequest->getVar('image-old');
        } else {
            // generate nama file
            $image = $fileFoto->getRandomName();
            // pindahkan gambar
            $fileFoto->move('assets/img/safoture/', $image);
            // hapus gambar lama
            unlink('assets/img/safoture/' . $this->mRequest->getVar('image-old'));
        }

        $data = [
            'name' => $name,
            'jenis_makanan' => $jenis,
            'catatan' => $catatan,
            'image' => $image,
            'maps' => $maps,
            'berat' => $berat,
            'status_makanan' => $status,
            'user_id' => $user_id,
            'date_created' => $this->time,
        ];
        $this->builder = $this->db->table('data_safoture');
        $this->builder->select('*');
        $this->builder->where('id', $id);
        $this->builder->update($data);

        session()->setFlashdata('berhasil', 'Data berhasil diupdate!');
        return redirect()->to('/safoture/data');
    }
    public function delete()
    {
        $id = $this->mRequest->getVar('id');
        $this->builder = $this->db->table('data_safoture');
        $this->builder->select('*');
        $this->builder->where('id', $id);
        $this->builder->delete();

        session()->setFlashdata('berhasil', 'Data berhasil dihapus!');
        return redirect()->to('/safoture/data');
    }
}
