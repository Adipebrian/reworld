<?php

namespace App\Controllers;

use Config\Database;

class Poin extends BaseController
{
    public function __construct()
    {
        $this->db = Database::connect();
    }
    public function data()
    {
        $this->builder = $this->db->table('data_poin');
        $this->builder->select('*');
        $query = $this->builder->get()->getResult();

        $this->builder = $this->db->table('data_poin_user');
        $this->builder->where('user_id', $this->user_id);
        $mypoin = $this->builder->get()->getRow();

        $this->builder = $this->db->table('data_safoture');
        $this->builder->where('status_konfirmasi', 1);
        $this->builder->where('user_id', $this->user_id);
        $waste = $this->builder->countAllResults();
        $data = [
            'title' => 'Poin',
            'uri' => $this->uri,
            'result' => $query,
            'mypoin' => $mypoin,
            'waste' => $waste,
        ];
        return view('/poin/data', $data);
    }
}
