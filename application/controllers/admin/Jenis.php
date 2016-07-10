<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenis extends Admin_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('admin/Jenis_model', 'jenis');
    $this->load->library('form_validation');
  }

  function index()
  {
    $current_user = $this->ion_auth->user()->row();
    $email = $current_user->email;
    $data = array(
                  'current_user' => $current_user,
                  'jenis' => $this->jenis->get_all(),
                  'gravatar_url' => $this->gravatar->get($email)
    );
    $this->template->load('templates/admin/jenis_template', 'admin/jenis/list', $data);
  }

  // menambah data jenis
  public function tambah()
  {
    $this->rules_tambah();
    $current_user = $this->ion_auth->user()->row();
    $email = $current_user->email;
    if ($this->form_validation->run() == FALSE) {
      $data = array(
                    'current_user' => $current_user,
                    'gravatar_url' => $this->gravatar->get($email)
      );
      $this->template->load('templates/admin/jenis_template', 'admin/jenis/add', $data);
    } else {
      $jenis = $this->input->post('jenis');
      $data = array('jenis' => $jenis);
      $this->jenis->insert($data);
      $this->session->set_flashdata('message', "<div style='color:#00a65a;'>Jenis berhasil ditambah.</div>");
      redirect(site_url('admin/jenis'));
    }
  }

  // mengedit data jenis
  public function ubah($id = NULL)
  {
    $this->rules_ubah();
    $current_user = $this->ion_auth->user()->row();
    $email = $current_user->email;
    if ($this->form_validation->run() == FALSE) {
      $row = $this->jenis->get_by_id($id);

      if ($row) {
        $data = array(
                      'id_jenis' => $row->id_jenis,
                      'jenis'    => $row->jenis,
                      'current_user' => $current_user,
                      'gravatar_url' => $this->gravatar->get($email)
        );
        $this->template->load('templates/admin/jenis_template', 'admin/jenis/edit', $data);
      }else {
        $this->session->set_flashdata('message', "<div style='color:#dd4b39;'>Data tidak ditemukan.</div>");
        redirect(site_url('admin/jenis'));
      }
    }else {
      $id = $this->input->post('id_jenis');
      $jenis = $this->input->post('jenis');
      $data = array(
                 'jenis' => $jenis,
                 'id_jenis' => $id
      );
      $this->jenis->update($id, $data);
      $this->session->set_flashdata('message', "<div style='color:#00a65a;'>Jenis berhasil diubah.</div>");
      redirect(site_url('admin/jenis'));
    }
  }

  // menghapus data jenis
  public function hapus($id = NULL)
  {
    $row = $this->jenis->get_by_id($id);

    if ($row) {
      $this->jenis->delete($id);
      $this->session->set_flashdata('message', "<div style='color:#00a65a;'>Jenis berhasil dihapus.</div>");
      redirect(site_url('admin/jenis'));
    } else {
      $this->session->set_flashdata('message', "<div style='color:#dd4b39;'>Data tidak ditemukan.</div>");
      redirect(site_url('admin/jenis'));
    }
  }

  // aturan menambah jenis
  public function rules_tambah()
  {
    $this->form_validation->set_rules('jenis', 'Jenis', 'trim|required');
    $this->form_validation->set_error_delimiters('<span class="text-warning">', '</span>');
  }

  // aturan mengubah jenis
  public function rules_ubah()
  {
    $this->form_validation->set_rules('jenis', 'Jenis', 'trim|required');
    $this->form_validation->set_rules('id_jenis', 'Id Jenis', 'trim|required');
    $this->form_validation->set_error_delimiters('<span class="text-warning">', '</span>');
  }

}
