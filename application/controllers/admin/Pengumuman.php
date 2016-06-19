<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pengumuman extends Admin_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('admin/Pengumuman_model','pengumuman');
    $this->load->library('form_validation');
  }

  public function index()
  {
    $data['pengumuman'] = $this->pengumuman->get_all();
    $data['current_user'] = $this->ion_auth->user()->row();
    $this->template->load('templates/admin/pengumuman_template','admin/pengumuman/list',$data);
  }

  public function tambah()
  {
    $this->rules();
    if ($this->form_validation->run() == FALSE) {
      $data = array('current_user' => $this->ion_auth->user()->row());
      $this->template->load('templates/admin/pengumuman_template','admin/pengumuman/add',$data);
    }else {
      $judul = $this->input->post('judul');
      $isi_pengumuman = $this->input->post('isi_pengumuman');
      $slug = url_title($judul, 'dash', TRUE);
      $user = $this->ion_auth->user()->row();
      $data = array(
                    'judul' => $judul,
                    'isi_pengumuman' => $isi_pengumuman,
                    'slug' => $slug,
                    'id_user' => $user->id, // baca dokumentasi ion auth
      );
      $this->pengumuman->insert($data);
      $this->session->set_flashdata('message','Pengumuman berhasil ditambah.');
      redirect(site_url('admin/pengumuman'));
    }
  }

  public function ubah($id)
  {
    $this->rules();
    if ($this->form_validation->run() == FALSE) {
      $row = $this->pengumuman->get_by_id($id);

      if ($row) {
        $data = array(
                      'id' => set_value('id',$row->id),
                      'judul' => set_value('judul',$row->judul),
                      'isi_pengumuman' => set_value('isi_pengumuman',$row->isi_pengumuman),
                      'id_user' => set_value('id_user',$row->id_user),
                      'current_user' => $this->ion_auth->user()->row()
        );
        $this->template->load('templates/admin/pengumuman_template','admin/pengumuman/edit',$data);

      }else {
        $this->session->set_flashdata('message', 'Data tidak ditemukan.');
        redirect(site_url('admin/pengumuman'));
      }
    }else {
      $id = $this->input->post('id');
      $judul = $this->input->post('judul');
      $isi_pengumuman = $this->input->post('isi_pengumuman');
      $slug = url_title($judul, 'dash', TRUE);
      $user = $this->ion_auth->user()->row();
      $data = array(
                 'judul' => $judul,
                 'isi_pengumuman' => $isi_pengumuman,
                 'slug' => $slug,
                 'id_user' => $user->id
      );
      $this->pengumuman->update($id, $data);
      $this->session->set_flashdata('message', 'Pengumuman berhasil diubah.');
      redirect(site_url('admin/pengumuman'));
    }
  }

  public function hapus($id){
    $row = $this->pengumuman->get_by_id($id);

    if ($row) {
      $this->pengumuman->delete($id);
      $this->session->set_flashdata('message', 'Pengumuman berhasil dihapus.');
      redirect(site_url('admin/pengumuman'));
    } else {
      $this->session->set_flashdata('message', 'Data tidak ditemukan.');
      redirect(site_url('admin/pengumuman'));
    }

  }

  function rules()
  {
    $this->form_validation->set_rules('judul', 'Judul', 'trim|required');
    $this->form_validation->set_rules('isi_pengumuman', 'Isi', 'trim|required');
    $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
  }

}
