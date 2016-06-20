<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Validasi extends UP2KK_Controller {

  public function __construct()
  {
    parent::__construct();

  }

  public function index()
  {
    $data['current_user'] = $this->ion_auth->user()->row();
    $this->template->load('templates/up2kk/validasi_template', 'up2kk/validasi', $data);
  }

}
