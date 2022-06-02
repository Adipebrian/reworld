<?php

namespace App\Controllers;

use Config\Database;
use App\Controllers\BaseController;

class Admin extends BaseController
{
    public function __construct()
    {
        $this->db = Database::connect();
    }
    public function index()
    {
        $this->builder = $this->db->table('data_berat');
        $this->builder->select('*');
        $result = $this->builder->get()->getResult();

        $this->builder = $this->db->table('data_safoture');
        $this->builder->select('*');
        $this->builder->where('status_konfirmasi', 1);
        $waste = $this->builder->countAllResults();

        $this->builder = $this->db->table('data_shop');
        $this->builder->select('*');
        $shop = $this->builder->countAllResults();

        $this->builder = $this->db->table('data_event');
        $this->builder->select('*');
        $event = $this->builder->countAllResults();

        $this->builder = $this->db->table('users');
        $this->builder->select('*');
        $users = $this->builder->countAllResults();


        $data = [
            'title' => 'Admin',
            'uri' => $this->uri,
            'result' => $result,
            'waste' => $waste,
            'event' => $event,
            'shop' => $shop,
            'users' => $users,
        ];
        return view('/admin/index', $data);
    }
    public function add()
    {
        $data = [
            'uri' => $this->uri,
            // 'result' => 'awal'
        ];
        return view('/poin/add',$data);
    }
    public function search_tiket()
    {
        $tiket_id = $this->mRequest->getVar('tiket');
        $this->builder = $this->db->table('data_gogreen');
        $this->builder->select('*');
        $this->builder->where('tiket_id', $tiket_id);
        $query = $this->builder->get()->getRow();
        $data = [
            'uri' => $this->uri,
            'result' => $query,
        ];
        return view('/admin/add_poin',$data);
    }

    public function add_poin()
    {
        $event = $this->mRequest->getVar('event_id');
        $user_id = $this->mRequest->getVar('user_id');
        $poin = $this->mRequest->getVar('poin');


        $data = [
            'user_id' => $user_id,
            'safote_id' => $event,
            'poin' => $poin,
            'status_poin' => 1,
            'date_created_poin' => $this->time,
        ];
        $this->builder = $this->db->table('data_poin');
        $this->builder->select('*');
        $this->builder->insert($data);

        session()->setFlashdata('berhasil', 'Data berhasil terkirim!');
        return redirect()->to('/admin/poin');
    }

    public function update()
    {
        $id = $this->mRequest->getVar('id');
        $berat = $this->mRequest->getVar('berat');
        $data = [
            'berat' => $berat
        ];

        $this->builder = $this->db->table('data_berat');
        $this->builder->select('*');
        $this->builder->where('id', $id);
        $this->builder->update($data);
        session()->setFlashdata('berhasil', 'Data berhasil diupdate!');
        return redirect()->to('/admin');
    }
    public function safoture()
    {
        $this->builder = $this->db->table('data_safoture');
        $this->builder->select('*');
        $querys = $this->builder->get()->getResult();

        $this->builder = $this->db->table('data_safoture');
        $this->builder->select('*');
        $this->builder->where('status_konfirmasi', 0);
        $query = $this->builder->get()->getResult();
        $data = [
            'title' => 'Admin',
            'uri' => $this->uri,
            'result' => $query,
            'results' => $querys,
        ];
        return view('/admin/safoture', $data);
    }
    public function gogreen()
    {
        $this->builder = $this->db->table('data_gogreen');
        $this->builder->select('data_gogreen.id as g_id ,tiket_id,username,title,bukti,status_konfirmasi');
        $this->builder->join('users', 'users.id = data_gogreen.user_id');
        $this->builder->join('data_event', 'data_event.id = data_gogreen.event_id');
        $this->builder->where('status_konfirmasi', 1);
        $this->builder->orwhere('status_konfirmasi', 2);
        $querys = $this->builder->get()->getResult();

        $this->builder = $this->db->table('data_gogreen');
        $this->builder->select('data_gogreen.id as g_id ,tiket_id,username,title,bukti,status_konfirmasi');
        $this->builder->join('users', 'users.id = data_gogreen.user_id');
        $this->builder->join('data_event', 'data_event.id = data_gogreen.event_id');
        $this->builder->where('status_konfirmasi', 0);
        $query = $this->builder->get()->getResult();
        $data = [
            'title' => 'Admin',
            'uri' => $this->uri,
            'result' => $query,
            'results' => $querys,
        ];
        return view('/admin/gogreen', $data);
    }
    public function shop()
    {

        $this->builder = $this->db->table('data_shop_list');
        $this->builder->select('data_shop_list.id as id_shop,name,poin,status_shop,username,date_created,user_id,shop_id');
        $this->builder->join('users', 'users.id = data_shop_list.user_id');
        $this->builder->join('data_shop', 'data_shop.id = data_shop_list.shop_id');
        $this->builder->orderby('id_shop', 'DESC');
        $query = $this->builder->get()->getResult();
        $data = [
            'title' => 'Admin',
            'uri' => $this->uri,
            'result' => $query,
        ];
        return view('/admin/shop', $data);
    }
    public function failed_gogreen()
    {
        $id = $this->mRequest->getVar('id');

        $data = [
            'status_konfirmasi' => 2,
        ];

        $this->builder = $this->db->table('data_gogreen');
        $this->builder->select('*');
        $this->builder->where('id', $id);
        $this->builder->update($data);

        session()->setFlashdata('berhasil', 'Data berhasil Di Update!');
        return redirect()->to('/admin/gogreen');
    }
    public function konfirmasi_shop()
    {
        $id_shop = $this->mRequest->getVar('id_shop');
        $shop_id = $this->mRequest->getVar('shop_id');
        $user_id = $this->mRequest->getVar('user_id');
        $poin = $this->mRequest->getVar('poin');

        $data_shop = [
            'status_shop' => 1
        ];

        $this->builder = $this->db->table('data_poin_user');
        $this->builder->select('*');
        $this->builder->where('user_id', $user_id);
        $query_poin = $this->builder->get()->getResult();
        if ($query_poin) {
            $data_poin = [
                'user_id' => $user_id,
                'safote_id' => $id_shop,
                'status_poin' => 1,
                'poin' => -$poin,
                'date_created_poin' => $this->time
            ];

            $this->builder = $this->db->table('data_poin');
            $this->builder->select('*');
            $this->builder->insert($data_poin);
        } else {
            session()->setFlashdata('gagal', 'Data gagal terkonfirmasi user tidak punya poin!');
            return redirect()->to('/admin/shop');
        }


        $this->builder = $this->db->table('data_shop_list');
        $this->builder->select('*');
        $this->builder->where('id', $id_shop);
        $this->builder->update($data_shop);

        session()->setFlashdata('berhasil', 'Data berhasil terkonfirmasi!');
        return redirect()->to('/admin/shop');
    }
    public function konfirmasi_safoture()
    {
        $id = $this->mRequest->getVar('id');
        $user_id = $this->mRequest->getVar('user_id');

        $data = [
            'status_konfirmasi' => 1,
        ];
        $data_poin = [
            'user_id' => $user_id,
            'safote_id' => $id,
            'status_poin' => 1,
            'poin' => 10,
            'date_created_poin' => $this->time
        ];

        $this->builder = $this->db->table('data_poin_user');
        $this->builder->select('*');
        $this->builder->where('user_id', $user_id);
        $query_poin = $this->builder->get()->getRow();
        if ($query_poin) {
            $data_poin_user = [
                'user_id' => $user_id,
                'poin' => $query_poin->poin + 10,
            ];
            $this->builder = $this->db->table('data_poin_user');
            $this->builder->select('*');
            $this->builder->where('user_id', $user_id);
            $this->builder->update($data_poin_user);
        } else {
            $data_poin_user = [
                'user_id' => $user_id,
                'poin' => 10,
            ];
            $this->builder = $this->db->table('data_poin_user');
            $this->builder->select('*');
            $this->builder->insert($data_poin_user);
        }

        $this->builder = $this->db->table('data_safoture');
        $this->builder->select('*');
        $this->builder->where('id', $id);
        $this->builder->where('user_id', $user_id);
        $this->builder->update($data);

        $this->builder = $this->db->table('data_poin');
        $this->builder->select('*');
        $this->builder->insert($data_poin);

        session()->setFlashdata('berhasil', 'Data berhasil terkonfirmasi!');
        return redirect()->to('/admin/safoture');
    }
    public function konfirmasi_gogreen()
    {
        $id = $this->mRequest->getVar('id');

        $data = [
            'status_konfirmasi' => 1,
        ];

        $this->builder = $this->db->table('data_gogreen');
        $this->builder->select('*');
        $this->builder->where('id', $id);
        $this->builder->update($data);

        session()->setFlashdata('berhasil', 'Data berhasil Di Update!');
        return redirect()->to('/admin/gogreen');
    }
    public function failed_safoture()
    {
        $id = $this->mRequest->getVar('id');
        $user_id = $this->mRequest->getVar('user_id');

        $data = [
            'status_konfirmasi' => 2,
        ];

        $this->builder = $this->db->table('data_safoture');
        $this->builder->select('*');
        $this->builder->where('id', $id);
        $this->builder->where('user_id', $user_id);
        $this->builder->update($data);

        session()->setFlashdata('berhasil', 'Data berhasil Di Update!');
        return redirect()->to('/admin/safoture');
    }
    public function failed_shop()
    {
        $id = $this->mRequest->getVar('id');
        $user_id = $this->mRequest->getVar('user_id');
        $poin = $this->mRequest->getVar('poin');

        $data = [
            'status_shop' => 2,
        ];

        $this->builder = $this->db->table('data_shop_list');
        $this->builder->select('*');
        $this->builder->where('id', $id);
        $this->builder->where('user_id', $user_id);
        $this->builder->update($data);

        $this->builder = $this->db->table('data_poin_user');
        $this->builder->select('*');
        $this->builder->where('user_id', $user_id);
        $query_poin = $this->builder->get()->getRow();

        if ($query_poin) {
            $data_poin_user = [
                'user_id' => $user_id,
                'poin' => $query_poin->poin + $poin,
            ];
            $this->builder = $this->db->table('data_poin_user');
            $this->builder->select('*');
            $this->builder->where('user_id', $user_id);
            $this->builder->update($data_poin_user);

            $data_poin = [
                'user_id' => $user_id,
                'safote_id' => $id,
                'status_poin' => 1,
                'poin' => +$poin,
                'date_created_poin' => $this->time
            ];

            $this->builder = $this->db->table('data_poin');
            $this->builder->select('*');
            $this->builder->insert($data_poin);
        } else {

            session()->setFlashdata('gagal', 'Data gagal Di Update!');
            return redirect()->to('/admin/shop');
        }


        session()->setFlashdata('berhasil', 'Data berhasil Di Update!');
        return redirect()->to('/admin/shop');
    }
    public function poin()
    {
        $this->builder = $this->db->table('data_poin');
        $this->builder->select('date_created_poin,status_poin,poin,username');
        $this->builder->join('users', 'users.id = data_poin.user_id');
        $query = $this->builder->get()->getResult();

        $this->builder = $this->db->table('data_poin');
        $this->builder->where('status_poin', 1);
        $mypoin = $this->builder->countAllResults();

        $data = [
            'title' => 'Poin',
            'uri' => $this->uri,
            'result' => $query,
            'mypoin' => $mypoin,
        ];
        return view('/admin/poin', $data);
    }
}
