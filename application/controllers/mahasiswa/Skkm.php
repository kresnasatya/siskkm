<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Skkm extends Mahasiswa_Controller {

  public function __construct()
  {
    parent::__construct();
    // $this->load->model('mahasiswa/Skkm_model', 'skkm');
    $this->load->library('form_validation');
  }

  public function index()
  {
    $data['current_user'] = $this->ion_auth->user()->row();
    $this->template->load('templates/mahasiswa/skkm_template', 'mahasiswa/skkm/list', $data);
  }

  public function tambah()
  {
    $this->rules_tambah();
    if ($this->form_validation->run() == FALSE) {
      $data = array('current_user' => $this->ion_auth->user()->row());
      $this->template->load('templates/mahasiswa/skkm_template','mahasiswa/skkm/add',$data);
    } else {

    }
  }

  public function edit($id = NULL)
  {

  }

  public function hapus($id = NULL)
  {

  }

  function rules_tambah()
  {

  }

}
