<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tingkat extends Admin_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('admin/Tingkat_model', 'tingkat');
    $this->load->library('form_validation');
  }

  function index()
  {
    $current_user = $this->ion_auth->user()->row();
    $email = $current_user->email;
    $data = array(
                  'current_user' => $current_user,
                  'tingkat' => $this->tingkat->get_all(),
                  'gravatar_url' => $this->gravatar->get($email)
    );
    $this->template->load('templates/admin/tingkat_template', 'admin/tingkat/list', $data);
  }

  public function tambah()
  {
    $this->rules_tambah();
    $current_user = $this->ion_auth->user()->row();
    $email = $current_user->email;
    if ($this->form_validation->run() == FALSE) {
      $data = array(
                    'current_user' => $current_user,
                    'dd_jenis' => $this->tingkat->get_jenis(),
                    'jenis_selected' => $this->input->post('id_jenis_fk') ? $this->input->post('id_jenis_fk') : '',
                    'gravatar_url' => $this->gravatar->get($email)
      );
      $this->template->load('templates/admin/tingkat_template', 'admin/tingkat/add', $data);
    } else {
      $tingkat = $this->input->post('tingkat');
      $id_jenis_fk = $this->input->post('id_jenis_fk');
      $data = array(
                    'tingkat' => $tingkat,
                    'id_jenis_fk' => $id_jenis_fk
      );
      $this->tingkat->insert($data);
      $this->session->set_flashdata('message', "<div style='color:#00a65a;'>Tingkat berhasil ditambah.</div>");
      redirect(site_url('admin/tingkat'));
    }
  }

  public function ubah($id)
  {
    $this->rules_ubah();
    $current_user = $this->ion_auth->user()->row();
    $email = $current_user->email;
    if ($this->form_validation->run() == FALSE) {
      $row = $this->tingkat->get_by_id($id);

      if ($row) {
        $data = array(
                      'id_tingkat' => $row->id_tingkat,
                      'tingkat'    => $row->tingkat,
                      'id_jenis_fk' => $row->id_jenis_fk,
                      'dd_jenis' => $this->tingkat->get_jenis(),
                      'current_user' => $current_user,
                      'gravatar_url' => $this->gravatar->get($email)
        );
        $this->template->load('templates/admin/tingkat_template', 'admin/tingkat/edit', $data);
      } else {
        $this->session->set_flashdata('message', "<div style='color:#dd4b39;'>Data tidak ditemukan.</div>");
        redirect(site_url('admin/tingkat'));
      }

    } else {
      $id = $this->input->post('id_tingkat');
      $tingkat = $this->input->post('tingkat');
      $id_jenis_fk = $this->input->post('id_jenis_fk');
      $data = array(
                 'tingkat' => $tingkat,
                 'id_jenis_fk' => $id_jenis_fk
      );
      $this->tingkat->update($id, $data);
      $this->session->set_flashdata('message', "<div style='color:#00a65a;'>Tingkat berhasil diubah.</div>");
      redirect(site_url('admin/tingkat'));
    }
  }

  public function hapus($id)
  {
    $row = $this->tingkat->get_by_id($id);

    if ($row) {
      $this->tingkat->delete($id);
      $this->session->set_flashdata('message', "<div style='color:#00a65a;'>Tingkat berhasil dihapus.</div>");
      redirect(site_url('admin/tingkat'));
    } else {
      $this->session->set_flashdata('message', "<div style='color:#dd4b39;'>Data tidak ditemukan.</div>");
      redirect(site_url('admin/tingkat'));
    }
  }

  public function rules_tambah()
  {
    $this->form_validation->set_rules('tingkat', 'Tingkat', 'trim|required');
    $this->form_validation->set_error_delimiters('<span class="text-warning">', '</span>');
  }

  public function rules_ubah()
  {
    $this->form_validation->set_rules('tingkat', 'Tingkat', 'trim|required');
    $this->form_validation->set_rules('id_tingkat', 'Id Tingkat', 'trim|required');
    $this->form_validation->set_error_delimiters('<span class="text-warning">', '</span>');
  }

}
