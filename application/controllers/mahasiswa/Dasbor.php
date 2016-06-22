<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dasbor extends Mahasiswa_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('mahasiswa/Dasbor_model', 'dasbor');
  }

  public function index()
  {
    /*$data = array(
                  'current_user' => $this->ion_auth->user()->row(),
                  'skkm_valid' => $this->dasbor->skkm_valid(),
                  'skkm_tidak_valid' => $this->dasbor->skkm_tidak_valid()); */
    $data['current_user'] = $this->ion_auth->user()->row();
    $data['skkm_valid'] = $this->dasbor->skkm_valid();
    $data['skkm_tidak_valid'] = $this->dasbor->skkm_tidak_valid();
    $this->template->load('templates/mahasiswa/dasbor_template', 'mahasiswa/dasbor', $data);
  }

}
