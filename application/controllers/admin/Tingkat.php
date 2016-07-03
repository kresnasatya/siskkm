<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tingkat extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('admin/Tingkat_model', 'tingkat');
    $this->load->library('form_validation');
  }

  function index()
  {
    $data = array(
                  'current_user' => $this->ion_auth->user()->row(),
                  'tingkat' => $this->tingkat->get_all()
    );
    $this->template->load('templates/admin/tingkat_template', 'admin/tingkat/list', $data);
  }

  // menambah data tingkat
  public function tambah()
  {
    $this->rules_tambah();
    if ($this->form_validation->run() == FALSE) {
      $data = array(
                    'current_user' => $this->ion_auth->user()->row(),
                    'dd_jenis' => $this->tingkat->get_jenis(),
                    'jenis_selected' => $this->input->post('id_jenis_fk') ? $this->input->post('id_jenis_fk') : '',
      );
      $this->template->load('templates/admin/tingkat_template', 'admin/tingkat/add', $data);
    }else {
      $tingkat = $this->input->post('tingkat');
      $id_jenis_fk = $this->input->post('id_jenis_fk');
      $data = array(
                    'tingkat' => $tingkat,
                    'id_jenis_fk' => $id_jenis_fk);
      $this->tingkat->insert($data);
      $this->session->set_flashdata('message', 'Tingkat berhasil ditambah.');
      redirect(site_url('admin/tingkat'));
    }
  }

  // mengedit data tingkat
  public function ubah($id = NULL)
  {
    $this->rules_ubah();
    if ($this->form_validation->run() == FALSE) {
      $row = $this->tingkat->get_by_id($id);

      if ($row) {
        $data = array(
                      'id_tingkat' => $row->id_tingkat,
                      'tingkat'    => $row->tingkat,
                      'id_jenis_fk' => $row->id_jenis_fk,
                      'dd_jenis' => $this->tingkat->get_jenis(),
                      'current_user' => $this->ion_auth->user()->row()
        );
        $this->template->load('templates/admin/tingkat_template', 'admin/tingkat/edit', $data);
      }else {
        $this->session->set_flashdata('message', 'Data tidak ditemukan.');
        redirect(site_url('admin/tingkat'));
      }
    }else {
      $id = $this->input->post('id_tingkat');
      $tingkat = $this->input->post('tingkat');
      $id_jenis_fk = $this->input->post('id_jenis_fk');
      $data = array(
                 'tingkat' => $tingkat,
                 'id_jenis_fk' => $id_jenis_fk
      );
      $this->tingkat->update($id, $data);
      $this->session->set_flashdata('message', 'Tingkat berhasil diubah.');
      redirect(site_url('admin/tingkat'));
    }
  }

  // menghapus data tingkat
  public function hapus($id = NULL)
  {
    $row = $this->tingkat->get_by_id($id);

    if ($row) {
      $this->tingkat->delete($id);
      $this->session->set_flashdata('message', 'Tingkat berhasil dihapus.');
      redirect(site_url('admin/tingkat'));
    } else {
      $this->session->set_flashdata('message', 'Data tidak ditemukan.');
      redirect(site_url('admin/tingkat'));
    }
  }

  // aturan menambah tingkat
  public function rules_tambah()
  {
    $this->form_validation->set_rules('tingkat', 'Tingkat', 'trim|required');
    $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
  }

  // aturan mengubah tingkat
  public function rules_ubah()
  {
    $this->form_validation->set_rules('tingkat', 'Tingkat', 'trim|required');
    $this->form_validation->set_rules('id_tingkat', 'Id Tingkat', 'trim|required');
    $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
  }

}
