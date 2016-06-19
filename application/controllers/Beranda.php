<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Home_model','home');
  }

  public function index()
  {
    $data['pengumuman'] = $this->home->pengumuman();
    $this->template->load('templates/home_template','beranda',$data);
  }

}
