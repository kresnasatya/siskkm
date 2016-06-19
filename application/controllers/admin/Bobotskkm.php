<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bobotskkm extends Admin_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('admin/Bobotskkm_model','bobot');
    $this->load->library('form_validation');
  }

  function index()
  {
    $data = array(
                  'current_user' => $this->ion_auth->user()->row(),
                  'jenis' => $this->bobot->get_all_jenis(),
                  'tingkat' => $this->bobot->get_all_tingkat(),
                  'sebagai' => $this->bobot->get_all_sebagai()
    );
    $this->template->load('templates/admin/bobot_template','admin/bobotskkm/list',$data);
  }

}
