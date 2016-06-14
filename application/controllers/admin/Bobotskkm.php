<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bobotskkm extends Admin_Controller{

  public function __construct()
  {
    parent::__construct();

    $this->load->library('form_validation');
  }

  function index()
  {

    $data = array('current_user' => $this->ion_auth->user()->row());
    $this->template->load('templates/admin/bobot_template','admin/bobotskkm/list',$data);
  }

}
