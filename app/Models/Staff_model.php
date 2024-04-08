<?php

namespace App\Models;

use CodeIgniter\Model;

class Staff_model extends Model
{
    protected $table         = 'staff';
    protected $primaryKey    = 'id_staff';
    protected $allowedFields = [
        'id_user', 'id_kategori_staff', 'nama', 'alamat', 'telepon', 'website',
        'email', 'jabatan', 'keahlian', 'gambar', 'status_staff', 'tempat_lahir',
        'tanggal_lahir', 'tanggal'
    ];

    // Listing
    public function listing()
    {
        $builder = $this->db->table('staff');
        $builder->select('staff.*, kategori_staff.nama_kategori_staff, kategori_staff.slug_kategori_staff, users.nama AS nama_admin');
        $builder->join('kategori_staff', 'kategori_staff.id_kategori_staff = staff.id_kategori_staff', 'LEFT');
        $builder->join('users', 'users.id_user = staff.id_user', 'LEFT');
        $builder->orderBy('staff.id_staff', 'DESC');
        $query = $builder->get();

        return $query->getResultArray();
    }

    // staff
    public function kategori_staff($id_kategori_staff)
    {
        $builder = $this->db->table('staff');
        $builder->select('staff.*, kategori_staff.nama_kategori_staff, kategori_staff.slug_kategori_staff, users.nama AS nama_admin');
        $builder->join('kategori_staff', 'kategori_staff.id_kategori_staff = staff.id_kategori_staff', 'LEFT');
        $builder->join('users', 'users.id_user = staff.id_user', 'LEFT');
        $builder->where('staff.id_kategori_staff', $id_kategori_staff);
        $builder->orderBy('staff.urutan', 'ASC');
        $query = $builder->get();

        return $query ? $query->getResultArray() : [];
    }

    // home
    public function home()
    {
        $builder = $this->db->table('staff');
        $builder->select('staff.*, kategori_staff.nama_kategori_staff, kategori_staff.slug_kategori_staff, users.nama AS nama_admin');
        $builder->join('kategori_staff', 'kategori_staff.id_kategori_staff = staff.id_kategori_staff', 'LEFT');
        $builder->join('users', 'users.id_user = staff.id_user', 'LEFT');
        $builder->where('staff.status_staff', 'Publish');
        $builder->orderBy('staff.id_staff', 'DESC');
        $query = $builder->get();

        return $query->getResultArray();
    }

    // total
    public function total()
    {
        $builder = $this->db->table('staff');
        $query   = $builder->get();

        return $query->getNumRows();
    }

    // detail
    public function detail($id_staff)
    {
        $builder = $this->db->table('staff');
        $builder->select('staff.*, kategori_staff.nama_kategori_staff, kategori_staff.slug_kategori_staff, users.nama AS nama_admin');
        $builder->join('kategori_staff', 'kategori_staff.id_kategori_staff = staff.id_kategori_staff', 'LEFT');
        $builder->join('users', 'users.id_user = staff.id_user', 'LEFT');
        $builder->where('staff.id_staff', $id_staff);
        $builder->orderBy('staff.id_staff', 'DESC');
        $query = $builder->get();

        return $query->getRowArray();
    }

    // tambah
    public function tambah($data)
    {
        $builder = $this->db->table('staff');
        $builder->insert($data);
    }
 
    // edit
    public function edit($data)
    {
        var_dump($data);
        try {
            $builder = $this->db->table('staff');
            $builder->where('id_staff', $data['id_staff']);
            $builder->update($data);
        } catch (\Exception $e) {
            // Log atau tampilkan pesan exception
            die($e->getMessage());
        }
    }
    


    // slider
    public function slider()
    {
        $builder = $this->db->table('staff');
        $builder->where('jenis_staff', 'Homepage');
        $builder->orderBy('staff.id_staff', 'DESC');
        $query = $builder->get();

        return $query->getResultArray();
    }
    public function staffWithCategory()
    {
        $builder = $this->db->table('staff');
        $builder->select('staff.id_staff, staff.nama, staff.jabatan, kategori_staff.nama_kategori_staff');
        $builder->join('kategori_staff', 'staff.id_kategori_staff = kategori_staff.id_kategori_staff');
        $query = $builder->get();

        return $query->getResultArray();
    }
}
