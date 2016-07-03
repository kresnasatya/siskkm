<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sebagai extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('admin/Sebagai_model', 'sebagai');
    $this->load->library('form_validation');
  }

  function index()
  {
    $data = array(
                  'current_user' => $this->ion_auth->user()->row(),
                  'sebagai'      => $this->sebagai->get_all()
    );
    $this->template->load('templates/admin/sebagai_template', 'admin/sebagai/list', $data);
  }

  // menambah data sebagai
  public function tambah()
  {
    $this->rules_tambah();
    if ($this->form_validation->run() == FALSE) {
      $data = array(
                    'current_user' => $this->ion_auth->user()->row(),
                    'dd_tingkat' => $this->sebagai->get_tingkat(),
                    'tingkat_selected' => $this->input->post('id_tingkat_fk') ? $this->input->post('id_tingkat_fk') : '',
      );
      $this->template->load('templates/admin/sebagai_template', 'admin/sebagai/add', $data);
    }else {
      $sebagai = $this->input->post('sebagai');
      $bobot = $this->input->post('bobot');
      $id_tingkat_fk = $this->input->post('id_tingkat_fk');
      $data = array(
                    'sebagai' => $sebagai,
                    'bobot'  => $bobot,
                    'id_tingkat_fk' => $id_tingkat_fk);
      $this->sebagai->insert($data);
      $this->session->set_flashdata('message', 'Sebagai berhasil ditambah.');
      redirect(site_url('admin/sebagai'));
    }
  }

  // mengedit data sebagai
  public function ubah($id = NULL)
  {
    $this->rules_ubah();
    if ($this->form_validation->run() == FALSE) {
      $row = $this->sebagai->get_by_id($id);

      if ($row) {
        $data = array(
                      'id_sebagai' => $row->id_sebagai,
                      'sebagai'    => $row->sebagai,
                      'bobot'      => $row->bobot,
                      'id_tingkat_fk' => $row->id_tingkat_fk,
                      'dd_tingkat' => $this->sebagai->get_tingkat(),
                      'current_user' => $this->ion_auth->user()->row()
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
      $this->session->set_flashdata('message', 'Sebagai berhasil diubah.');
      redirect(site_url('admin/sebagai'));
    }
  }

  // menghapus data sebagai
  public function hapus($id = NULL)
  {
    $row = $this->sebagai->get_by_id($id);

    if ($row) {
      $this->sebagai->delete($id);
      $this->session->set_flashdata('message', 'Sebagai berhasil dihapus.');
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
    $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
  }

  // aturan mengubah sebagai
  public function rules_ubah()
  {
    $this->form_validation->set_rules('sebagai', 'Sebagai', 'trim|required');
    $this->form_validation->set_rules('bobot', 'Bobot', 'trim|required');
    $this->form_validation->set_rules('id_sebagai', 'Id Sebagai', 'trim|required');
    $this->form_validation->set_rules('id_tingkat_fk', 'Tingkat', 'trim|required');
    $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
  }

}
