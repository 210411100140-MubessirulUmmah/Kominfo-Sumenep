<?php

namespace App\Controllers;

use App\Models\Galeri_model;
use App\Models\Konfigurasi_model;
use App\Models\UlasanModel;

class Kontak extends BaseController
{
    protected $UlasanModel;

    public function __construct()
    {
        $this->UlasanModel = new \App\Models\UlasanModel();
    }
    // Kontak
    public function index()
    {
        $m_konfigurasi = new Konfigurasi_model();
        $m_galeri      = new Galeri_model();
        $previousReviews = $this->UlasanModel->faq();
        $konfigurasi   = $m_konfigurasi->listing();
        $slider        = $m_galeri->slider();

        $data = ['title'  => 'Pengaduan',
            'description' => 'Kontak Kami ' . $konfigurasi['namaweb'] . ', ' . $konfigurasi['tentang'],
            'keywords'    => 'Kontak Kami ' . $konfigurasi['namaweb'] . ', ' . $konfigurasi['keywords'],
            'slider'      => $slider,
            'konfigurasi' => $konfigurasi,
            'content'     => 'kontak/index',
            'previousReviews' => $previousReviews,
        ];
        echo view('layout/wrapper', $data);
    }

    public function simpan(){
        $data = [
            'nama'         => $this->request->getPost('nama'),
            'email'        => $this->request->getPost('email'),
            'nomor_telepon' => $this->request->getPost('nohp'),
            'message'      => $this->request->getPost('message'),
        ];
    
        $this->UlasanModel->simpan($data);
        return redirect()->to('kontak');
    }
    
    
}
