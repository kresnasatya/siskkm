<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends Admin_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('admin/Beranda_model','beranda');
  }

  function index()
  {
    $data['jumlah_user'] = $this->beranda->count_user();
    $data['jumlah_pengumuman'] = $this->beranda->count_pengumuman();
    $data['current_user'] = $this->ion_auth->user()->row();
    $this->template->load('templates/admin/beranda_template','admin/beranda',$data);
  }

}
