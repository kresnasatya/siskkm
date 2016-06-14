<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengumuman extends CI_Controller{

  public function __construct(){
    parent::__construct();
    $this->load->model('Home_model','home');
  }

  public function index($offset=0){
    // tentukan jumlah data per halaman
    $perpage = 3;

    // konfigurasi tampilan paging
    $config = array(
                    'base_url' => base_url('pengumuman/index'),
                    'total_rows' => count($this->home->pengumuman()),
                    'per_page' => $perpage);

    // inisialisasi pagination dan config
    $this->pagination->initialize($config);
    $limit['perpage'] = $perpage;
    $limit['offset'] = $offset;

    $data['pengumuman'] = $this->home->pengumuman_paging($limit);
    $this->template->load('templates/home_template','pengumuman',$data);
  }

  public function single($id){
    $data['pengumuman'] = $this->home->pengumuman();
    $data['single'] = $this->home->single($id);
    $this->template->load('templates/home_template','single',$data);
  }

}
