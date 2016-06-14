<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
  }

  public function index()
  {
    /*
    * Kalau user telah login sebelumnya
    */
    if ($this->ion_auth->logged_in()) {
      if ($this->ion_auth->is_admin()) {
        redirect('admin/beranda');
      } elseif ($this->ion_auth->in_group('mahasiswa')) {
        redirect('mahasiswa/beranda');
      } elseif ($this->ion_auth->in_group('up2kk')) {
        redirect('up2kk/beranda');
      }
    } else {
      /*
      * Kalau user belum login sebelumnya
      */
      if ($this->input->post()) {
        $this->_rules();
        if ($this->form_validation->run() === TRUE) {
          $identity = $this->input->post('identity');
          $password = $this->input->post('password');
          if ($this->ion_auth->login($identity, $password)) {
            if ($this->ion_auth->is_admin()) {
              redirect('admin/beranda');
            } elseif ($this->ion_auth->in_group('mahasiswa')) {
              redirect('mahasiswa/beranda');
            } elseif ($this->ion_auth->in_group('up2kk')) {
              redirect('up2kk/beranda');
            }
          } else {
            $this->session->set_flashdata('message', $this->ion_auth->errors());
            redirect('login','refresh');
          }
        }
      }
    }
    $this->template->load('templates/login_template','login');
  }

  public function logout()
  {
    $this->ion_auth->logout();
    redirect('login','refresh');
  }

  public function _rules()
  {
    $this->form_validation->set_rules('identity', '', 'trim');
    $this->form_validation->set_rules('password','','trim');
  }
}
