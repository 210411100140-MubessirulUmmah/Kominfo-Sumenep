<?php

namespace App\Controllers;

use App\Models\Bankdata_Model;
use App\Models\Konfigurasi_model;

class Bankdata extends BaseController
{
    // Bankdata
    public function index()
    {
        $m_konfigurasi = new Konfigurasi_model();
        $m_bankdata    = new Bankdata_Model();
        $konfigurasi   = $m_konfigurasi->listing();
        $bankdata      = $m_bankdata->jenis_bankdata('Bankdata');

        $data = ['title'  => 'Bank Data File',
            'description' => 'Bankdata File ' . $konfigurasi['namaweb'] . ', ' . $konfigurasi['tentang'],
            'keywords'    => 'Bankdata File ' . $konfigurasi['namaweb'] . ', ' . $konfigurasi['keywords'],
            'bankdata'    => $bankdata,
            'konfigurasi' => $konfigurasi,
            'content'     => 'bankdata/index',
        ];
        echo view('layout/wrapper', $data);
    }

    // Unduh
    public function unduh($id_bankdata)
    {
        $m_bankdata = new Bankdata_Model();
        $bankdata   = $m_bankdata->detail($id_bankdata);
        // Update hits
        $data = ['id_bankdata' => $bankdata['id_bankdata'],
            'hits'             => $bankdata['hits'] + 1,
        ];
        $m_bankdata->edit($data);
        // Update hits
        return $this->response->bankdata('../assets/upload/file/' . $bankdata['gambar'], null);
    }
}
