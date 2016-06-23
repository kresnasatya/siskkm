<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Validasi extends UP2KK_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('up2kk/Validasi_model', 'validasi');
  }

  public function index()
  {
    $current_user = $this->ion_auth->user()->row();
    // mengambil id jurusan up2kk
    $jurusan_current_user = $current_user->id_jurusan;
    $mahasiswa = $this->validasi->get_mahasiswa($id_current_user);
    $data = array(
                  'current_user' => $current_user,
                  'mahasiswa' => $mahasiswa);
    $this->template->load('templates/up2kk/validasi_template', 'up2kk/validasi/list', $data);
  }

  public function list_skkm($id = NULL)
  {
    $current_user = $this->ion_auth->user()->row();
    $row = $this->validasi->get_skkm_mahasiswa($id);
    $data = array('current_user' => $current_user,
                  'list_skkm' => $row
    );
    $this->template->load('templates/up2kk/validasi_template', 'up2kk/validasi/list_skkm', $data);
    // print_r($row);

  }

  public function skkm($id = NULL)
  {
    $current_user = $this->ion_auth->user()->row();
    $row = $this->validasi->get_id_skkm($id);
    // print_r($row);
    if ($row) {
      $data = array(
                    'current_user' => $current_user,
                    'id' => $row->id,
                    'status' => $row->status,
                    'keterangan' => $row->keterangan);
      $this->template->load('templates/up2kk/validasi_template', 'up2kk/validasi/validasi_skkm', $data);
    }
  }

}
