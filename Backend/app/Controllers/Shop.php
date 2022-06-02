<?php

namespace App\Controllers;

use Config\Database;
use App\Controllers\BaseController;

class Shop extends BaseController
{
    public function __construct()
    {
        $this->db = Database::connect();
    }
    public function index()
    {
        $this->builder = $this->db->table('data_poin_user');
        $this->builder->where('user_id', $this->user_id);
        $mypoin = $this->builder->get()->getRow();

        $this->builder = $this->db->table('data_shop');
        $this->builder->select('*');
        $query = $this->builder->get()->getResult();
        $data = [
            'result' => $query,
            'key' => '',
            'mypoin' => $mypoin
        ];
        return view('/shop/index', $data);
    }
    public function search_input()
    {
        $this->builder = $this->db->table('data_poin_user');
        $this->builder->where('user_id', $this->user_id);
        $mypoin = $this->builder->get()->getRow();

        $key = $this->mRequest->getVar('key');
        $this->builder = $this->db->table('data_shop');
        $this->builder->select('*');
        $this->builder->like('name', $key);
        $query = $this->builder->get()->getResult();
        $data = [
            'result' => $query,
            'cat' => $key,
            'key' => $key,
            'mypoin' => $mypoin
        ];
        return view('/shop/index', $data);
    }
    public function data()
    {
        $this->builder = $this->db->table('data_shop_list');
        $this->builder->select('data_shop_list.id as idshop,shop_id,name,jenis,poin,status_shop');
        $this->builder->join('data_shop', 'data_shop.id = data_shop_list.shop_id');
        $query = $this->builder->get()->getResult();
        $data = [
            'uri' => $this->uri,
            'result' => $query,
        ];
        return view('/shop/data', $data);
    }

    public function buy($id)
    {
        $this->builder = $this->db->table('data_shop');
        $this->builder->where('id', $id);
        $this->builder->select('*');
        $query = $this->builder->get()->getRow();
        $data = [
            'uri' => $this->uri,
            'result' => $query,
        ];
        return view('/shop/buy', $data);
    }
    public function tukar()
    {
        $id = $this->mRequest->getVar('id');
        $poin = $this->mRequest->getVar('poin_shop');
        $user_id = $this->user_id;

        $this->builder = $this->db->table('data_poin_user');
        $this->builder->select('*');
        $this->builder->where('user_id', $user_id);
        $query_poin = $this->builder->get()->getRow();
        if ($query_poin) {
            if ($query_poin->poin < $poin) {
                session()->setFlashdata('gagal', 'Poin tidak cukup!');
                return redirect()->to('/shop/data');
            } else {
                $data = [
                    'shop_id' => $id,
                    'user_id' => $this->user_id,
                    'status_shop' => 0,
                    'date_created' => $this->time,
                ];
                $this->builder = $this->db->table('data_shop_list');
                $this->builder->select('*');
                $this->builder->insert($data);
            }
            $data_poin_user = [
                'user_id' => $user_id,
                'poin' => $query_poin->poin - $poin,
            ];
            $this->builder = $this->db->table('data_poin_user');
            $this->builder->select('*');
            $this->builder->where('user_id', $user_id);
            $this->builder->update($data_poin_user);

            session()->setFlashdata('berhasil', 'Data berhasil terkirim!');
            return redirect()->to('/shop/data');
        } else {
            $data_poin_user = [
                'user_id' => $user_id,
                'poin' => 0,
            ];
            $this->builder = $this->db->table('data_poin_user');
            $this->builder->select('*');
            $this->builder->insert($data_poin_user);
            session()->setFlashdata('gagal', 'Poin tidak cukup!');
            return redirect()->to('/shop/data');
        }
    }
}
