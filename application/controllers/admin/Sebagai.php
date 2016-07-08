<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sebagai extends Admin_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('admin/Sebagai_model', 'sebagai');
    $this->load->library('form_validation');
  }

  function index()
  {
    $current_user = $this->ion_auth->user()->row();
    $email = $current_user->email;
    $data = array(
                  'current_user' => $current_user,
                  'sebagai'      => $this->sebagai->get_all(),
                  'gravatar_url' => $this->gravatar->get($email)
    );
    $this->template->load('templates/admin/sebagai_template', 'admin/sebagai/list', $data);
  }

  // menambah data sebagai
  public function tambah()
  {
    $this->rules_tambah();
    $current_user = $this->ion_auth->user()->row();
    $email = $current_user->email;
    if ($this->form_validation->run() == FALSE) {
      $data = array(
                    'current_user' => $current_user,
                    'dd_tingkat' => $this->sebagai->get_tingkat(),
                    'tingkat_selected' => $this->input->post('id_tingkat_fk') ? $this->input->post('id_tingkat_fk') : '',
                    'gravatar_url' => $this->gravatar->get($email)
      );
      $this->template->load('templates/admin/sebagai_template', 'admin/sebagai/add', $data);
    }else {
      $sebagai = $this->input->post('sebagai');
      $bobot = $this->input->post('bobot');
      $id_tingkat_fk = $this->input->post('id_tingkat_fk');
      $data = array(
                    'sebagai' => $sebagai,
                    'bobot'  => $bobot,
                    'id_tingkat_fk' => $id_tingkat_fk
      );
      $this->sebagai->insert($data);
      $this->session->set_flashdata('message', "<div style='color:#00a65a;'>Sebagai berhasil ditambah.</div>");
      redirect(site_url('admin/sebagai'));
    }
  }

  // mengedit data sebagai
  public function ubah($id = NULL)
  {
    $this->rules_ubah();
    $current_user = $this->ion_auth->user()->row();
    $email = $current_user->email;
    if ($this->form_validation->run() == FALSE) {
      $row = $this->sebagai->get_by_id($id);

      if ($row) {
        $data = array(
                      'id_sebagai' => $row->id_sebagai,
                      'sebagai'    => $row->sebagai,
                      'bobot'      => $row->bobot,
                      'id_tingkat_fk' => $row->id_tingkat_fk,
                      'dd_tingkat' => $this->sebagai->get_tingkat(),
                      'current_user' => $current_user,
                      'gravatar_url' => $this->gravatar->get($email)
        );
        $this->template->load('templates/admin/sebagai_template', 'admin/sebagai/edit', $data);
      }else {
        $this->session->set_flashdata('message', 'Data tidak ditemukan.');
        redirect(site_url('admin/sebagai'));
      }
    }else {
      $id = $this->input->post('id_sebagai');
      $sebagai = $this->input->post('sebagai');
      $bobot = $this->input->post('bobot');
      $id_tingkat_fk = $this->input->post('id_tingkat_fk');
      $data = array(
                 'sebagai' => $sebagai,
                 'bobot' => $bobot,
                 'id_tingkat_fk' => $id_tingkat_fk
      );
      $this->sebagai->update($id, $data);
      $this->session->set_flashdata('message', "<div style='color:#00a65a;'>Sebagai berhasil diubah.</div>");
      redirect(site_url('admin/sebagai'));
    }
  }

  // menghapus data sebagai
  public function hapus($id = NULL)
  {
    $row = $this->sebagai->get_by_id($id);

    if ($row) {
      $this->sebagai->delete($id);
      $this->session->set_flashdata('message', "<div style='color:#00a65a;'>Sebagai berhasil dihapus.</div>");
      redirect(site_url('admin/sebagai'));
    } else {
      $this->session->set_flashdata('message', 'Data tidak ditemukan.');
      redirect(site_url('admin/sebagai'));
    }
  }

  // aturan menambah sebagai
  public function rules_tambah()
  {
    $this->form_validation->set_rules('sebagai', 'Sebagai', 'trim|required');
    $this->form_validation->set_rules('bobot', 'Bobot', 'trim|required');
    $this->form_validation->set_rules('id_tingkat_fk', 'Tingkat', 'trim|required');
    $this->form_validation->set_error_delimiters('<span class="text-warning">', '</span>');
  }

  // aturan mengubah sebagai
  public function rules_ubah()
  {
    $this->form_validation->set_rules('sebagai', 'Sebagai', 'trim|required');
    $this->form_validation->set_rules('bobot', 'Bobot', 'trim|required');
    $this->form_validation->set_rules('id_sebagai', 'Id Sebagai', 'trim|required');
    $this->form_validation->set_rules('id_tingkat_fk', 'Tingkat', 'trim|required');
    $this->form_validation->set_error_delimiters('<span class="text-warning">', '</span>');
  }

}
