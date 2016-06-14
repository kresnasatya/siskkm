<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pengumuman extends Admin_Controller{

  public function __construct(){
    parent::__construct();
    $this->load->model('admin/Pengumuman_model','pengumuman');
    $this->load->library('form_validation');
  }

  public function index(){
    $data['pengumuman'] = $this->pengumuman->get_all();
    $data['current_user'] = $this->ion_auth->user()->row();
    $this->template->load('templates/admin/pengumuman_template','admin/pengumuman/list',$data);
  }

  public function create(){
    $this->rules();
    if ($this->form_validation->run() == FALSE) {
      $data = array('current_user' => $this->ion_auth->user()->row());
      $this->template->load('templates/admin/pengumuman_template','admin/pengumuman/add',$data);
    }else {
      $judul = $this->input->post('judul');
      $isi_pengumuman = $this->input->post('isi_pengumuman');
      $slug = url_title($judul, 'dash', TRUE);
      $user = $this->ion_auth->user()->row();
      $config['upload_path'] = './gambar_posting/';
      $config['allowed_types'] = 'jpeg|jpg|gif|png';
      $this->load->library('upload',$config);
      $this->upload->do_upload('foto');
      $data = array('upload_data' => $this->upload->data());
      $kirim = array(
                    'judul' => $judul,
                    'isi_pengumuman' => $isi_pengumuman,
                    'slug' => $slug,
                    'id_user' => $user->id, // baca dokumentasi ion auth
                    'foto' => $data['upload_data']['file_name']);
      $this->pengumuman->insert($kirim);
      $this->session->set_flashdata('message','Tambah pengumuman berhasil.');
      redirect(site_url('admin/pengumuman'));
    }
  }

  public function update($id){
    $this->rules();
    if ($this->form_validation->run() == FALSE) {
      $row = $this->pengumuman->get_by_id($id);

      if ($row) {
        $data = array(
                      'id' => set_value('id',$row->id),
                      'judul' => set_value('judul',$row->judul),
                      'isi_pengumuman' => set_value('isi_pengumuman',$row->isi_pengumuman),
                      'id_user' => set_value('id_user',$row->id_user),
                      'current_user' => $this->ion_auth->user()->row());
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
      if ($_FILES['foto']['name'] == "") {
          $d = array(
          'judul' => $judul,
          'isi_pengumuman' => $isi_pengumuman,
          'slug' => $slug,
          'id_user' => $user->id);
          $this->pengumuman->update($id,$d);
          $this->session->set_flashdata('message','Update pengumuman berhasil.');
          redirect(site_url('admin/pengumuman'));
      }else{
        $config['upload_path'] = './gambar_posting/';
        $config['allowed_types'] = 'gif|jpg|png';
        $this->load->library('upload',$config);
        $this->upload->do_upload('foto');
        $data = array('upload_data' => $this->upload->data());
        $d = array(
                  'judul' => $judul,
                  'isi_pengumuman' => $isi_pengumuman,
                  'foto' => $data['upload_data']['file_name'],
                  'slug' => $slug,
                  'id_user' => $user->id);
        $this->pengumuman->update($id,$d);
        $this->session->set_flashdata('message','Update pengumuman berhasil.');
        redirect(site_url('admin/pengumuman'));
      }
    }
  }

  public function delete($id){
    $row = $this->pengumuman->get_by_id($id);

    if ($row) {
      $this->pengumuman->delete($id);
      $this->session->set_flashdata('message', 'Hapus pengumuman berhasil.');
      redirect(site_url('admin/pengumuman'));
    }else {
      $this->session->set_flashdata('message', 'Data tidak ditemukan.');
      redirect(site_url('admin/pengumuman'));
    }

  }

  function rules(){
    $this->form_validation->set_rules('judul','Judul','trim|required');
    $this->form_validation->set_rules('isi_pengumuman','Isi','trim|required');
    $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
  }

}
