<?php

namespace App\Controllers;

use App\Models\Berita_model;
use App\Models\Galeri_model;
use App\Models\Konfigurasi_model;

class Home extends BaseController
{
    // Homepage
    public function index()
    {
        $m_konfigurasi = new Konfigurasi_model();
        $m_galeri      = new Galeri_model();
        $m_berita      = new Berita_model();
        $konfigurasi   = $m_konfigurasi->listing();
        $slider        = $m_galeri->slider();
        $berita2       = $m_berita->beranda();

        $data = ['title'  => $konfigurasi['namaweb'] . ' | ' . $konfigurasi['tagline'],
            'description' => $konfigurasi['namaweb'] . ', ' . $konfigurasi['tentang'],
            'keywords'    => $konfigurasi['namaweb'] . ', ' . $konfigurasi['keywords'],
            'slider'      => $slider,
            'konfigurasi' => $konfigurasi,
            'berita2'     => $berita2,
            'content'     => 'home/index',
        ];
        echo view('layout/wrapper', $data);
    }
}
