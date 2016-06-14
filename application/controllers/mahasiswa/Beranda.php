<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends Mahasiswa_Controller{

  public function __construct()
  {
    parent::__construct();
  }

  function index()
  {
    $data['current_user'] = $this->ion_auth->user()->row();
    $this->template->load('templates/mahasiswa/beranda_template', 'mahasiswa/beranda', $data);
  }

}
