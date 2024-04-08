<?php

namespace App\Models;

use CodeIgniter\Model;

class Bankdata_Model extends Model
{
    protected $table         = 'bankdata';
    protected $primaryKey    = 'id_bankdata';
    protected $allowedFields = [];

    // Listing
    public function listing()
    {
        $builder = $this->db->table('bankdata');
        $builder->select('bankdata.*, kategori_download.nama_kategori_download, kategori_download.slug_kategori_download, users.nama');
        $builder->join('kategori_download', 'kategori_download.id_kategori_download = bankdata.id_kategori_download', 'LEFT');
        $builder->join('users', 'users.id_user = bankdata.id_user', 'LEFT');
        $builder->orderBy('bankdata.id_bankdata', 'DESC');
        $query = $builder->get();

        return $query->getResultArray();
    }

    // Listing
    public function jenis_bankdata($jenis_bankdata)
    {
        $builder = $this->db->table('bankdata');
        $builder->select('bankdata.*, kategori_download.nama_kategori_download, kategori_download.slug_kategori_download, users.nama');
        $builder->join('kategori_download', 'kategori_download.id_kategori_download = bankdata.id_kategori_download', 'LEFT');
        $builder->join('users', 'users.id_user = bankdata.id_user', 'LEFT');
        $builder->where('bankdata.jenis_bankdata', $jenis_bankdata);
        $builder->orderBy('bankdata.id_bankdata', 'DESC');
        $query = $builder->get();

        return $query->getResultArray();
    }

    // total
    public function total()
    {
        $builder = $this->db->table('bankdata');
        $query   = $builder->get();

        return $query->getNumRows();
    }

    // detail
    public function detail($id_bankdata)
    {
        $builder = $this->db->table('bankdata');
        $builder->select('bankdata.*, kategori_download.nama_kategori_download, kategori_download.slug_kategori_download, users.nama');
        $builder->join('kategori_download', 'kategori_download.id_kategori_download = bankdata.id_kategori_download', 'LEFT');
        $builder->join('users', 'users.id_user = bankdata.id_user', 'LEFT');
        $builder->where('bankdata.id_bankdata', $id_bankdata);
        $builder->orderBy('bankdata.id_bankdata', 'DESC');
        $query = $builder->get();

        return $query->getRowArray();
    }

    // tambah
    public function tambah($data)
    {
        $builder = $this->db->table('bankdata');
        $builder->insert($data);
    }

    // tambah
    public function edit($data)
    {
        $builder = $this->db->table('bankdata');
        $builder->where('id_bankdata', $data['id_bankdata']);
        $builder->update($data);
    }

    // slider
    public function slider()
    {
        $builder = $this->db->table('bankdata');
        $builder->where('jenis_bankdata', 'Homepage');
        $builder->orderBy('bankdata.id_bankdata', 'DESC');
        $query = $builder->get();

        return $query->getResultArray();
    }
}
