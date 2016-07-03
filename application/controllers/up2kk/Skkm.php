<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Skkm extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('up2kk/Skkm_model', 'skkm');
  }

  public function index()
  {
    $current_user = $this->ion_auth->user()->row();
    // mengambil id jurusan up2kk
    $jurusan_current_user = $current_user->id_jurusan;
    $mahasiswa = $this->skkm->get_mahasiswa($jurusan_current_user);
    $data = array(
                  'current_user' => $current_user,
                  'mahasiswa' => $mahasiswa
    );
    $this->template->load('templates/up2kk/skkm_template', 'up2kk/skkm/list', $data);
  }

  public function list_skkm($id_user = NULL)
  {
    $current_user = $this->ion_auth->user()->row();
    $row = $this->skkm->get_skkm_mahasiswa($id_user);
    $data = array('current_user' => $current_user,
                  'list_skkm' => $row,
                  'skkm_belum_valid' => $this->skkm->sum_belum_valid($id_user),
                  'skkm_valid' => $this->skkm->sum_valid($id_user),
                  'skkm_tidak_valid' => $this->skkm->sum_tidak_valid($id_user),
                  'status_skkm' => $this->skkm->status_skkm($id_user)
    );
    $this->template->load('templates/up2kk/skkm_template', 'up2kk/skkm/list_skkm', $data);

  }



}
