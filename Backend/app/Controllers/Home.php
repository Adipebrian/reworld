<?php

namespace App\Controllers;

use Config\Database;

class Home extends BaseController
{
    public function __construct()
    {
        $this->db = Database::connect();
    }
    public function index()
    {
        $this->builder = $this->db->table('data_berat');
        $this->builder->select('*');
        $this->builder->where('name', 'waste');
        $waste = $this->builder->get()->getRow();

        $this->builder = $this->db->table('data_berat');
        $this->builder->select('*');
        $this->builder->where('name', 'pohon');
        $pohon = $this->builder->get()->getRow();

        $data = [
            'waste' => $waste,
            'pohon' => $pohon,
        ];
        return view('home/index', $data);
    }
    public function about()
    {
        return view('home/about');
    }
}
