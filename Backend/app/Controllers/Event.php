<?php

namespace App\Controllers;

use Config\Database;

class Event extends BaseController
{
    public function __construct()
    {
        $this->db = Database::connect();
    }
    
    public function index()
    {
        $this->builder = $this->db->table('data_event');
        $this->builder->select('*');
        $result = $this->builder->get()->getResult();
        $data = [
            'result' => $result,
            'uri' => $this->uri,
            'key' => '',
        ];
        return view('event/index',$data);
    }
    public function add()
    {
        $data = [
            'uri' => $this->uri,
        ];
        return view('event/add',$data);
    }
    public function search_input()
    {
        $key = $this->mRequest->getVar('key');
        $this->builder = $this->db->table('data_event');
        $this->builder->select('*');
        $this->builder->like('title', $key);
        $query = $this->builder->get()->getResult();
        $data = [
            'result' => $query,
            'cat' => $key,
            'key' => $key,
        ];
        return view('/event/index', $data);
    }
    public function detail($id)
    {
        $this->builder = $this->db->table('data_event');
        $this->builder->select('*');
        $this->builder->where('id', $id);
        $query = $this->builder->get()->getRow();
        $data = [
            'uri' => $this->uri,
            'result' => $query,
        ];
        return view('/event/detail', $data);
    }
    public function edit($id)
    {
        $this->builder = $this->db->table('data_event');
        $this->builder->select('*');
        $this->builder->where('id', $id);
        $query = $this->builder->get()->getRow();
        $data = [
            'uri' => $this->uri,
            'result' => $query,
        ];
        return view('/event/edit', $data);
    }
    public function data()
    {
        $this->builder = $this->db->table('data_event');
        $this->builder->select('*');
        $result = $this->builder->get()->getResult();
        $data = [
            'result' => $result,
            'uri' => $this->uri,
        ];
        return view('event/data',$data);
    }


    // action
    public function store()
    {
        $title = $this->mRequest->getVar('title');
        $tanggal = $this->mRequest->getVar('tanggal');
        $pukul = $this->mRequest->getVar('pukul');
        $biaya = $this->mRequest->getVar('biaya');
        $tempat = $this->mRequest->getVar('tempat');
        $tiket = $this->mRequest->getVar('tiket');
        $content = $this->mRequest->getVar('content');
        $user_id = $this->user_id;
        $fileFoto = $this->mRequest->getFile('image');

        // generate nama file
        $image = $fileFoto->getRandomName();
        // pindahkan gambar
        $fileFoto->move('assets/img/event/', $image);


        $data = [
            'title' => $title,
            'tanggal' => $tanggal,
            'pukul' => $pukul,
            'biaya' => $biaya,
            'tempat' => $tempat,
            'content' => $content,
            'tiket' => $tiket,
            'image' => $image,
            'user_id' => $user_id,
            'date_created' => $this->time,
        ];
        $this->builder = $this->db->table('data_event');
        $this->builder->select('*');
        $this->builder->insert($data);

        session()->setFlashdata('berhasil', 'Data berhasil terkirim!');
        return redirect()->to('/event/data');
    }
    public function update()
    {
        $id = $this->mRequest->getVar('id');
        $title = $this->mRequest->getVar('title');
        $tanggal = $this->mRequest->getVar('tanggal');
        $pukul = $this->mRequest->getVar('pukul');
        $biaya = $this->mRequest->getVar('biaya');
        $tempat = $this->mRequest->getVar('tempat');
        $tiket = $this->mRequest->getVar('tiket');
        $content = $this->mRequest->getVar('content');
        $user_id = $this->user_id;
        $fileFoto = $this->mRequest->getFile('image');

        if ($fileFoto->getError() == 4) {
            $image = $this->mRequest->getVar('image-old');
        } else {
            // generate nama file
            $image = $fileFoto->getRandomName();
            // pindahkan gambar
            $fileFoto->move('assets/img/event/', $image);
            // hapus gambar lama
            unlink('assets/img/event/' . $this->mRequest->getVar('image-old'));
        }

        $data = [
            'title' => $title,
            'tanggal' => $tanggal,
            'pukul' => $pukul,
            'biaya' => $biaya,
            'tempat' => $tempat,
            'content' => $content,
            'tiket' => $tiket,
            'image' => $image,
            'user_id' => $user_id,
            'date_created' => $this->time,
        ];
        $this->builder = $this->db->table('data_event');
        $this->builder->select('*');
        $this->builder->where('id', $id);
        $this->builder->update($data);

        session()->setFlashdata('berhasil', 'Data berhasil diupdate!');
        return redirect()->to('/event/data');
    }
    public function delete()
    {
        $id = $this->mRequest->getVar('id');
        $this->builder = $this->db->table('data_event');
        $this->builder->select('*');
        $this->builder->where('id', $id);
        $this->builder->delete();

        session()->setFlashdata('berhasil', 'Data berhasil dihapus!');
        return redirect()->to('/event/data');
    }
}
