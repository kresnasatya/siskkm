<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dasbor extends Mahasiswa_Controller {

  public function __construct()
  {
    parent::__construct();
    if (!$this->ion_auth->in_group('mahasiswa')) {
      $this->session->set_flashdata('message', 'Kamu bukan mahasiswa!');
      redirect('login', 'refresh');
    }
    $this->load->model('mahasiswa/Dasbor_model', 'dasbor');
  }

  public function index()
  {
    $current_user = $this->ion_auth->user()->row();
    $id_user = $current_user->id;
    $data = array(
                  'current_user' => $current_user,
                  'skkm_valid' => $this->dasbor->skkm_valid($id_user),
                  'skkm_tidak_valid' => $this->dasbor->skkm_tidak_valid($id_user)
    );
    $this->template->load('templates/mahasiswa/dasbor_template', 'mahasiswa/dasbor', $data);
  }

}
