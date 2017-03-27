<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Beranda_model', 'beranda');
    }

    public function index()
    {
        $data['pengumuman'] = $this->beranda->pengumuman();
        $this->template->load('templates/beranda_template', 'beranda', $data);
    }

    public function kirim_pesan()
    {
      $from = $this->input->post('email');
      $to = "devsiskkm@satyakresna.com";
      $name = $this->input->post('nama');
      $subject = "Kritik dan Saran";
      $message = $this->input->post('pesan');

      // Load email library
      $this->load->library('email');

      $this->email->from($from, $name);
      $this->email->to($to);
      $this->email->subject($subject);
      $this->email->message($message);

      // Kirim email
      if ($this->email->send()) {
          $this->session->set_flashdata('email_sent', 'Pesan berhasil dikirim.');
      } else {
          $this->session->set_flashdata('email_sent', 'Gagal kirim pesan.');
      }
      $this->template->load('templates/beranda_template', 'beranda');
    }

}
