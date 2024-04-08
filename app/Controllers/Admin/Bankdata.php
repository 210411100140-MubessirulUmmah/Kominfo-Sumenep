<?php

namespace App\Controllers\Admin;

use App\Models\Bankdata_Model;
use App\Models\Kategori_download_model;

class Bankdata extends BaseController
{ 
    // index
    public function index()
    {
        checklogin();
        $m_bankdata          = new Bankdata_Model();
        $m_kategori_download = new Kategori_download_model();
        $bankdata            = $m_bankdata->listing();
        $total               = $m_bankdata->total();

        $data = ['title' => 'File Bank Data (' . $total . ')',
            'bankdata'   => $bankdata,
            'content'    => 'admin/bankdata/index',
        ];
        echo view('admin/layout/wrapper', $data);
    }

    // Tambah
    public function tambah()
    {
        checklogin();
        $m_bankdata          = new Bankdata_Model();
        $m_kategori_download = new Kategori_download_model();
        $kategori_download   = $m_kategori_download->listing();

        // Start validasi
        if ($this->request->getMethod() === 'post' && $this->validate(
            [
                'judul_bankdata' => 'required',
                'gambar' => [
                    'uploaded[gambar]',
                    'mime_in[gambar,image/jpg,image/jpeg,image/gif,image/png,application/pdf,application/doc,application/msword,application/xls,application/xlsx,application/ppt,application/pptx]',
                    'max_size[gambar,4096]',
                ],
            ]
        )) {
            if (! empty($_FILES['gambar']['name'])) {
                // Image upload
                $avatar   = $this->request->getFile('gambar');
                $namabaru = str_replace(' ', '-', $avatar->getName());
                $avatar->move(WRITEPATH . '../assets/upload/file/', $namabaru);
                // masuk database
                $data = [
                    'id_user'              => $this->session->get('id_user'),
                    'id_kategori_download' => $this->request->getVar('id_kategori_download'),
                    'judul_bankdata'       => $this->request->getVar('judul_bankdata'),
                    'jenis_bankdata'       => $this->request->getVar('jenis_bankdata'),
                    'isi'                  => $this->request->getVar('isi'),
                    'gambar'               => $namabaru,
                    'website'              => $this->request->getVar('website'),
                    'tanggal_post'         => date('Y-m-d H:i:s'),
                ];
                $m_bankdata->tambah($data);

                return redirect()->to(base_url('admin/bankdata'))->with('sukses', 'Data Berhasil di Simpan');
            }
            $data = [
                'id_user'              => $this->session->get('id_user'),
                'id_kategori_download' => $this->request->getVar('id_kategori_download'),
                'judul_bankdata'       => $this->request->getVar('judul_bankdata'),
                'jenis_bankdata'       => $this->request->getVar('jenis_bankdata'),
                'isi'                  => $this->request->getVar('isi'),
                'website'              => $this->request->getVar('website'),
                'tanggal_post'         => date('Y-m-d H:i:s'),
            ];
            $m_bankdata->tambah($data);

            return redirect()->to(base_url('admin/bankdata'))->with('sukses', 'Data Berhasil di Simpan');
        }

        $data = ['title'        => 'Tambah Bank Data',
            'kategori_download' => $kategori_download,
            'content'           => 'admin/bankdata/tambah',
        ];
        echo view('admin/layout/wrapper', $data);
    }

    // edit
    public function edit($id_bankdata)
    {
        checklogin();
        $m_kategori_download = new Kategori_download_model();
        $m_bankdata          = new Bankdata_Model();
        $kategori_download   = $m_kategori_download->listing();
        $bankdata            = $m_bankdata->detail($id_bankdata);
        // Start validasi
        if ($this->request->getMethod() === 'post' && $this->validate(
            [
                'judul_bankdata' => 'required',
                'gambar' => [
                    'uploaded[gambar]',
                    'mime_in[gambar,image/jpg,image/jpeg,image/gif,image/png,application/pdf,document/doc,application/msword,application/xls,application/xlsx,application/ppt,application/pptx]',
                    'max_size[gambar,4096]',
                ],
            ]
        )) {
            if (! empty($_FILES['gambar']['name'])) {
                // Image upload
                $avatar   = $this->request->getFile('gambar');
                $namabaru = str_replace(' ', '-', $avatar->getName());
                $avatar->move(WRITEPATH . '../assets/upload/file/', $namabaru);
                // masuk database
                $data = [
                    'id_bankdata'          => $id_bankdata,
                    'id_user'              => $this->session->get('id_user'),
                    'id_kategori_download' => $this->request->getVar('id_kategori_download'),
                    'judul_bankdata'       => $this->request->getVar('judul_bankdata'),
                    'jenis_bankdata'       => $this->request->getVar('jenis_bankdata'),
                    'isi'                  => $this->request->getVar('isi'),
                    'gambar'               => $namabaru,
                    'website'              => $this->request->getVar('website'),
                ];
                $m_bankdata->edit($data);

                return redirect()->to(base_url('admin/bankdata'))->with('sukses', 'Data Berhasil di Simpan');
            }
            $data = [
                'id_bankdata'          => $id_bankdata,
                'id_user'              => $this->session->get('id_user'),
                'id_kategori_download' => $this->request->getVar('id_kategori_download'),
                'judul_bankdata'       => $this->request->getVar('judul_bankdata'),
                'jenis_bankdata'       => $this->request->getVar('jenis_bankdata'),
                'isi'                  => $this->request->getVar('isi'),
                'website'              => $this->request->getVar('website'),
            ];
            $m_bankdata->edit($data);

            return redirect()->to(base_url('admin/bankdata'))->with('sukses', 'Data Berhasil di Simpan');
        }

        $data = ['title'        => 'Edit Bank Data: ' . $bankdata['judul_bankdata'],
            'kategori_download' => $kategori_download,
            'bankdata'          => $bankdata,
            'content'           => 'admin/bankdata/edit',
        ];
        echo view('admin/layout/wrapper', $data);
    }

    // unduh
    public function unduh($id_bankdata)
    {
        checklogin();
        $m_kategori_download = new Kategori_download_model();
        $m_bankdata          = new Bankdata_Model();
        $kategori_download   = $m_kategori_download->listing();
        $bankdata            = $m_bankdata->detail($id_bankdata);

        return $this->response->bankdata('../assets/upload/file/' . $bankdata['gambar'], null);
    }

    // Delete
    public function delete($id_bankdata)
    {
        checklogin();
        $m_bankdata = new Bankdata_Model();
        $data       = ['id_bankdata' => $id_bankdata];
        $m_bankdata->delete($data);
        // masuk database
        $this->session->setFlashdata('sukses', 'Data telah dihapus');

        return redirect()->to(base_url('admin/bankdata'));
    }
}
