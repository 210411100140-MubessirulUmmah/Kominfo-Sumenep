<?php

namespace App\Controllers\Admin;

use App\Models\UlasanModel;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use CodeIgniter\Email\Email;

class Ulasan extends BaseController
{
    protected $fromEmail;
    protected $fromName;
    protected $UlasanModel;
    // mainpage
    public function __construct()
    {
        // Inisialisasi model pada konstruktor
        $this->UlasanModel = new UlasanModel();
    }
    public function index()
    {
        checklogin();
        $m_ulasan = new UlasanModel();
        $ulasan   = $m_ulasan->listing();
        $total   = $m_ulasan->total();

        // Start validasi
        if ($this->request->getMethod() === 'post' && $this->validate(
            [
                'nama' => 'required',
            ]
        )) {
            // masuk database
            $data = [
                'id_pesan' => $this->session->get('id_pesan'),
                'nama'        => $this->request->getPost('nama'),
                'email'   => $this->request->getPost('email'),
                'nomor_telepon'        => $this->request->getPost('nomor_telepon'),
                'message'        => $this->request->getPost('message'),
            ];
            $m_ulasan->save($data);
            // masuk database
            $this->session->setFlashdata('sukses', 'Data telah ditambah');

            return redirect()->to(base_url('admin/ulasan'));
        }
        $data = [
            'title' => 'Ulasan',
            'ulasan'      => $ulasan,
            'content'    => 'admin/ulasan/index',
        ];
        echo view('admin/layout/wrapper', $data);
    }

    // delete
    public function delete($id_pesan)
    {
        checklogin();
        $m_ulasan = new UlasanModel();
        $data    = ['id_pesan' => $id_pesan];
        $m_ulasan->delete($data);
        // masuk database
        $this->session->setFlashdata('sukses', 'Data telah dihapus');

        return redirect()->to(base_url('admin/ulasan'));
    }

    // Controller
    public function replyForm()
    {
        // Validasi form dan ambil data dari form
        $validationRules = [
            'reply_text' => 'required',
            'modal_id'   => 'required|integer',
        ];

        if (!$this->validate($validationRules)) {
            // Validasi gagal, lakukan penanganan kesalahan sesuai kebutuhan
            // ...
        } else {
            // Validasi berhasil, ambil data dari form
            $modalId = $this->request->getPost('modal_id');
            $replyText = $this->request->getPost('reply_text');

            // Simpan balasan ke database menggunakan properti model
            $this->UlasanModel->saveReply($modalId, $replyText);

            // Kirim balasan ke email pengirim
            // Ambil email pengirim dari database
            $userEmail = $this->UlasanModel->getEmailById($modalId);

            // Kirim balasan ke email pengirim
            $subject = 'Balasan Ulasan Anda';
            $emailMessage = 'Terima kasih atas ulasan Anda. Berikut adalah balasan dari kami: ' . $replyText;

            if ($this->UlasanModel->sendReplyEmail($userEmail, $subject, $emailMessage)) {
                return redirect()->to(base_url('admin/ulasan'));
            } else {
                echo 'gagal';
            }
        }
    }


    // public function send()
    // {
    //     $mail = new PHPMailer(true);

    //     try {
    //         //Server settings
    //         $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    //         $mail->isSMTP();                                            //Send using SMTP
    //         $mail->Host       = 'smtp.googlemail.com';                     //Set the SMTP server to send through
    //         $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    //         $mail->Username   = 'youkahilahi@gmail.com';                     //SMTP username
    //         $mail->Password   = 'awingmawe';                               //SMTP password
    //         $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
    //         $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //         //Recipients
    //         $mail->setFrom('youkahilahi@gmail.com', 'Satpol PP Sumenep');
    //         $mail->addAddress('joe@example.net', 'Joe User');     //Add a recipient
    //         $mail->addAddress('ellen@example.com');               //Name is optional
    //         $mail->addReplyTo('info@example.com', 'Information');
    //         $mail->addCC('cc@example.com');
    //         $mail->addBCC('bcc@example.com');

    //         //Attachments
    //         $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //         $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //         //Content
    //         $mail->isHTML(true);                                  //Set email format to HTML
    //         $mail->Subject = 'Here is the subject';
    //         $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    //         $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    //         $mail->send();
    //         echo 'Message has been sent';
    //     } catch (Exception $e) {
    //         echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    //     }
    // }
}
