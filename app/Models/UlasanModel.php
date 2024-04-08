<?php

namespace App\Models;

use CodeIgniter\Email\Email;
use CodeIgniter\Model;

class UlasanModel extends Model
{
    protected $table         = 'ulasan';
    protected $primaryKey    = 'id_pesan';
    protected $allowedFields = ['nama', 'email', 'nomor_telepon', 'message'];

    public function simpan($data)
    {
        $this->insert($data);
    }

    // listing 
    public function listing()
    {
        $builder = $this->db->table('ulasan');
        $builder->orderBy('ulasan.message', 'ASC');
        $query = $builder->get();

        return $query->getResultArray();
    }
    // listing 
// listing 
public function faq()
{
    $builder = $this->db->table('ulasan');
    $builder->select('message, balasan');
    $builder->where('balasan IS NOT NULL AND balasan !=', '');
    $builder->orderBy('ulasan.message', 'ASC'); 
    $builder->limit(10);
    $query = $builder->get();

    if ($query) {
        return $query->getResultArray();
    } else {
        return [];
    }
}





    // total
    public function total()
    {
        $builder = $this->db->table('ulasan');
        $builder->select('COUNT(*) AS total');
        $builder->orderBy('ulasan.id_pesan', 'DESC');
        $query = $builder->get();

        return $query->getRowArray();
    }

    // detail
    public function detail($id_pesan)
    {
        $builder = $this->db->table('ulasan');
        $builder->where('id_pesan', $id_pesan);
        $builder->orderBy('ulasan.id_pesan', 'DESC');
        $query = $builder->get();

        return $query->getRowArray();
    }

    // read
    public function read($message)
    {
        $builder = $this->db->table('ulasan');
        $builder->where('message', $message);
        $builder->orderBy('message.id_pesan', 'DESC');
        $query = $builder->get();

        return $query->getRowArray();
    }

    // application/models/Ulasan_model.php


    // Model
    // Model
    public function saveReply($modalId, $replyText)
    {
        // Update kolom balasan berdasarkan $modalId
        $this->db->table('ulasan')->where('id_pesan', $modalId)->update(['balasan' => $replyText]);
    }
    public function getEmailById($id_pesan)
    {
        // Gantilah 'email_field' sesuai dengan kolom yang sesuai di tabel
        $result = $this->asArray()
            ->select('email')
            ->where(['id_pesan' => $id_pesan])
            ->first();

        return $result['email'] ?? null;
    }

    public function sendReplyEmail($toEmail, $subject, $message)
    {
        $email = \Config\Services::email();

        $email->setTo($toEmail);
        $email->setFrom('youkahilahi@gmail.com');
        $email->setSubject($subject);
        $email->setMessage($message);

        if ($email->send()) {
            return true;
        } else {
            // Tampilkan pesan error
            echo $email->printDebugger(['headers']);
            return false;
        }
    }
    
}
