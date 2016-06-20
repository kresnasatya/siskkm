<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dasbor extends Mahasiswa_Controller {

  public function __construct()
  {
    parent::__construct();
    // $this->load->model('mahasiswa/Dasbor_model', 'dasbor');
  }

  public function index()
  {
    $data = array(
                  'current_user' => $this->ion_auth->user()->row());
    $this->template->load('templates/mahasiswa/dasbor_template', 'mahasiswa/dasbor', $data);
  }

}
