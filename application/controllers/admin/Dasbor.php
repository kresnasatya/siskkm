<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dasbor extends Admin_Controller {

  public function __construct()
  {
    parent::__construct();
    if (!$this->ion_auth->in_group('admin')) {
      $this->session->set_flashdata('message', 'Kamu bukan admin!');
      redirect('login', 'refresh');
    }
    $this->load->model('admin/Dasbor_model', 'dasbor');
  }

  function index()
  {
    $data = array(
                  'current_user' => $this->ion_auth->user()->row(),
                  'count_user' => $this->dasbor->count_user(),
                  'count_pengumuman' => $this->dasbor->count_pengumuman(),
                  'count_jenis' => $this->dasbor->count_jenis(),
                  'count_tingkat' => $this->dasbor->count_tingkat(),
                  'count_sebagai' => $this->dasbor->count_sebagai());
    $this->template->load('templates/admin/dasbor_template', 'admin/dasbor', $data);
  }

}
