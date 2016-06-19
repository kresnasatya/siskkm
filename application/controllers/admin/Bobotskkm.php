<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bobotskkm extends Admin_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('admin/Jenis_model','jenis');
    $this->load->model('admin/Tingkat_model','tingkat');
    $this->load->model('admin/Sebagai_model','sebagai');
    $this->load->library('form_validation');
  }

  function index()
  {
    $data = array(
                  'current_user' => $this->ion_auth->user()->row(),
                  'jenis' => $this->jenis->get_all(),
                  'tingkat' => $this->tingkat->get_all(),
                  'sebagai' => $this->sebagai->get_all()
    );
    $this->template->load('templates/admin/bobot_template','admin/bobotskkm/list',$data);
  }

}
