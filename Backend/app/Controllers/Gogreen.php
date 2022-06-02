<?php

namespace App\Controllers;

use Config\Database;

class Gogreen extends BaseController
{
    public function __construct()
    {
        $this->db = Database::connect();
    }
    
    public function index()
    {
        $this->builder = $this->db->table('data_poin_user');
        $this->builder->select('username,image,poin');
        $this->builder->orderby('poin','DESC');
        $this->builder->limit(6);
        $this->builder->join('users', 'users.id = data_poin_user.user_id');
        $query = $this->builder->get()->getResult();
        
        $this->builder = $this->db->table('data_poin_user');
        $this->builder->select('username,image,poin');
        $this->builder->orderby('poin','DESC');
        $this->builder->limit(1);
        $this->builder->join('users', 'users.id = data_poin_user.user_id');
        $winner = $this->builder->get()->getRow();
        $data = [
            'uri' => $this->uri,
            'result' => $query,
            'winner' => $winner,
        ];
        return view('gogreen/index',$data);
    }
    public function add($id)
    {
        $this->builder = $this->db->table('data_event');
        $this->builder->select('*');
        $this->builder->where('id', $id);
        $query = $this->builder->get()->getRow();
        $data = [
            'uri' => $this->uri,
            'result' => $query,
        ];
        return view('gogreen/add',$data);
    }
    public function edit($id)
    {
        $this->builder = $this->db->table('data_gogreen');
        $this->builder->select('*');
        $this->builder->where('id', $id);
        $query = $this->builder->get()->getRow();
        $data = [
            'uri' => $this->uri,
            'result' => $query,
        ];
        return view('/gogreen/edit', $data);
    }
    public function data()
    {
        $this->builder = $this->db->table('data_gogreen');
        $this->builder->select('username,title,status_konfirmasi,tiket_id');
        $this->builder->join('data_event', 'data_event.id = data_gogreen.event_id');
        $this->builder->join('users', 'users.id = data_gogreen.user_id');
        $result = $this->builder->get()->getResult();
        $data = [
            'result' => $result,
            'uri' => $this->uri,
        ];
        return view('gogreen/data',$data);
    }


    // action
    public function store()
    {
        $id = $this->mRequest->getVar('id');
        $user_id = $this->user_id;
        $tiket_id = random_string('numeric', 6);
        $fileFoto = $this->mRequest->getFile('image');
        // generate nama file
        $image = $fileFoto->getRandomName();
        // pindahkan gambar
        $fileFoto->move('assets/img/bukti/', $image);


        $data = [
            'event_id' => $id,
            'user_id' => $user_id,
            'tiket_id' => $tiket_id,
            'bukti' => $image,
            'date_created' => $this->time,
            'status_konfirmasi' => 0,
        ];
        $this->builder = $this->db->table('data_gogreen');
        $this->builder->select('*');
        $this->builder->insert($data);

        session()->setFlashdata('berhasil', 'Data berhasil terkirim!');
        return redirect()->to('/gogreen/data');
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
            $fileFoto->move('assets/img/gogreen/', $image);
            // hapus gambar lama
            unlink('assets/img/gogreen/' . $this->mRequest->getVar('image-old'));
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
        $this->builder = $this->db->table('data_gogreen');
        $this->builder->select('*');
        $this->builder->where('id', $id);
        $this->builder->update($data);

        session()->setFlashdata('berhasil', 'Data berhasil diupdate!');
        return redirect()->to('/gogreen/data');
    }
    public function delete()
    {
        $id = $this->mRequest->getVar('id');
        $this->builder = $this->db->table('data_gogreen');
        $this->builder->select('*');
        $this->builder->where('id', $id);
        $this->builder->delete();

        session()->setFlashdata('berhasil', 'Data berhasil dihapus!');
        return redirect()->to('/gogreen/data');
    }
}
