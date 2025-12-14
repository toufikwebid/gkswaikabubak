<?php
class Contact extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('m_kontak');
    $this->load->model('m_pengunjung');
    $this->m_pengunjung->count_visitor();
    $this->load->library('form_validation');
    $this->load->helper('form');
    $this->load->helper('url');
    $this->load->library('phpmailer_lib'); // Load PHPMailer library
  }

  function index()
  {
    $this->data['title2'] = 'KONTAK KAMI';
    $this->data['main_view']   = 'depan/v_contact';
    $this->load->view('theme/template', $this->data);
  }

  function kirim_pesan()
  {
    $this->form_validation->set_rules('name', 'Name', 'required');
    $this->form_validation->set_rules('Subject', 'Subject', 'required');
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
    $this->form_validation->set_rules('message', 'Message', 'required');

    if ($this->form_validation->run() == FALSE) {
      $this->session->set_flashdata('msg', '<p><strong> NB: </strong> Mohon lengkapi semua field dengan benar.</p>');
      redirect('contact');
    } else {
      $name = $this->input->post('name');
      $subject = $this->input->post('Subject');
      $email = $this->input->post('email');
      $message = $this->input->post('message');

      // Load PHPMailer library
      $mail = $this->phpmailer_lib->load();

      try {
        //Server settings
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'mail.gkswaikabubak.com';                     // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'admin@gkswaikabubak.com';                     // SMTP username
        $mail->Password   = '@GKSwkb25';                               // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SSL;            // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 465;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

        //Recipients
        $mail->setFrom($email, $name);
        $mail->addAddress('admin@gkswaikabubak.com');     // Add a recipient

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = $message;

        $mail->send();
        $this->session->set_flashdata('msg', '<p><strong> NB: </strong> Terima Kasih Telah Menghubungi Kami.</p>');
      } catch (Exception $e) {
        $this->session->set_flashdata('msg', '<p><strong> NB: </strong> Gagal mengirim pesan. Silakan coba lagi.</p>');
        $this->session->set_flashdata('error', "Message could not be sent. Mailer Error: {$mail->ErrorInfo}");
      }

      redirect('contact');
    }
  }
}
