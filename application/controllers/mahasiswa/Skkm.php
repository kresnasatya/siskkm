<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Skkm extends Mahasiswa_Controller{

  public function __construct() {
    parent::__construct();
    //Codeigniter : Write Less Do More
    // $this->load->model('mahasiswa/Skkm_model', 'skkm');
    $this->load->library('form_validation');
  }

  function index() {
    $data['current_user'] = $this->ion_auth->user()->row();
    $this->template->load('templates/mahasiswa/skkm_template', 'mahasiswa/skkm/list', $data);
  }

  function tambah() {
    $this->rules();
    if ($this->form_validation->run() == FALSE) {
      $data = array('current_user' => $this->ion_auth->user()->row());
      $this->template->load('templates/mahasiswa/skkm_template','mahasiswa/skkm/add',$data);
    } else {

    }
  }

  function edit() {

  }

  function hapus() {

  }

  function rules() {

  }

}
