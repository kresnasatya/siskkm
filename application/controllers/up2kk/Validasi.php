<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Validasi extends UP2KK_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('up2kk/Validasi_model', 'validasi');
    $this->load->library('form_validation');
  }

  public function index()
  {
    $current_user = $this->ion_auth->user()->row();
    // mengambil id jurusan up2kk
    $jurusan_current_user = $current_user->id_jurusan;
    $mahasiswa = $this->validasi->get_mahasiswa($jurusan_current_user);
    $data = array(
                  'current_user' => $current_user,
                  'mahasiswa' => $mahasiswa
    );
    $this->template->load('templates/up2kk/validasi_template', 'up2kk/validasi/list', $data);
  }

  public function list_skkm($id_user = NULL)
  {
    $current_user = $this->ion_auth->user()->row();
    $row = $this->validasi->get_skkm_mahasiswa($id_user);
    $data = array('current_user' => $current_user,
                  'list_skkm' => $row,
                  'skkm_belum_valid' => $this->validasi->sum_belum_valid($id_user),
                  'skkm_valid' => $this->validasi->sum_valid($id_user),
                  'skkm_tidak_valid' => $this->validasi->sum_tidak_valid($id_user),
                  'status_skkm' => $this->validasi->status_skkm($id_user)
    );
    $this->template->load('templates/up2kk/validasi_template', 'up2kk/validasi/list_skkm', $data);

  }

  public function skkm($id_skkm = NULL)
  {
    $this->rules();
    if ($this->form_validation->run() == FALSE) {
      $current_user = $this->ion_auth->user()->row();
      $row = $this->validasi->get_skkm($id_skkm);
      if ($row) {
        $data = array(
                      'current_user' => $current_user,
                      'id' => $row->id,
                      'id_user' => $row->id_user,
                      'status' => $row->status,
                      'keterangan' => $row->keterangan
        );
        $this->template->load('templates/up2kk/validasi_template', 'up2kk/validasi/skkm', $data);
        //print_r($data);
      } else {
        $this->session->set_flashdata('message', 'Data tidak ditemukan.');
        redirect(site_url('up2kk/validasi/list_skkm/'.$data['id_user']));
      }
    } else {
      $id_user = $this->input->post('id_user');
      $id = $this->input->post('id');
      $status = $this->input->post('status');
      $keterangan = $this->input->post('keterangan');
      $data = array(
                    'id' => $id,
                    'status' => $status,
                    'keterangan' => $keterangan,
                    'id_user' => $id_user);
      $this->validasi->validasi_skkm($id,  $data);
      $this->session->set_flashdata('message', 'SKKM berhasil divalidasi.');
      redirect(site_url('up2kk/validasi/list_skkm/'.$data['id_user']));
    }
  }

  public function rules()
  {
    $this->form_validation->set_rules('status', 'Status', 'trim|required');
    $this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
    $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
  }

}
