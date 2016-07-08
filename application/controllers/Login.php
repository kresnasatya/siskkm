<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
  }

  public function index()
  {
    // kalau user telah login sebelumnya
    if ($this->ion_auth->logged_in()) {
      if ($this->ion_auth->is_admin()) {
        redirect('admin/dasbor');
      } elseif ($this->ion_auth->in_group('mahasiswa')) {
        redirect('mahasiswa/dasbor');
      } elseif ($this->ion_auth->in_group('up2kk')) {
        redirect('up2kk/dasbor');
      }
    } else {
      // kalau user belum login
      if ($this->input->post()) {
        $this->_rules();
        if ($this->form_validation->run() == TRUE) {
          $identity = $this->input->post('identity');
          $password = $this->input->post('password');
          if ($this->ion_auth->login($identity, $password)) {
            if ($this->ion_auth->is_admin()) {
              redirect('admin/dasbor');
            } elseif ($this->ion_auth->in_group('mahasiswa')) {
              redirect('mahasiswa/dasbor');
            } elseif ($this->ion_auth->in_group('up2kk')) {
              redirect('up2kk/dasbor');
            }
          } else {
            $this->session->set_flashdata('message', "<div style='color:rgb(252, 0, 0);'>Kombinasi email dan password salah.</div>");
            redirect('login', 'refresh');
          }
        }
      }
    }
    $this->template->load('templates/login_template', 'login');
  }

  public function logout()
  {
    $this->ion_auth->logout();
    redirect('login', 'refresh');
  }

  public function _rules()
  {
    $this->form_validation->set_rules('identity', '', 'trim|required');
    $this->form_validation->set_rules('password', '', 'trim|required');
    $this->form_validation->set_error_delimiters('<span class="text-warning">', '</span>');
  }

}
