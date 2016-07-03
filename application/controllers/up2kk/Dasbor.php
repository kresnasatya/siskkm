<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dasbor extends UP2KK_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('up2kk/Dasbor_model', 'dasbor');
  }

  public function index()
  {
    $current_user = $this->ion_auth->user()->row();
    $id_jurusan_user = $current_user->id_jurusan;
    $data = array(
                  'current_user' => $current_user,
                  'count_mahasiswa' => $this->dasbor->count_mahasiswa($id_jurusan_user),
                  'count_belum_valid' => $this->dasbor->count_belum_valid($id_jurusan_user),
                  'count_tidak_valid' => $this->dasbor->count_tidak_valid($id_jurusan_user),
                  'count_valid' => $this->dasbor->count_valid($id_jurusan_user));
    $this->template->load('templates/up2kk/dasbor_template', 'up2kk/dasbor', $data);
  }

}
