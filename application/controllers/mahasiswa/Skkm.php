<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Skkm extends Mahasiswa_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('mahasiswa/Skkm_model', 'skkm');
    $this->load->library('form_validation');
  }

  public function index()
  {
    $current_user = $this->ion_auth->user()->row();
    $id_user = $current_user->id;
    $email = $current_user->email;
    $data = array(
                  'current_user' => $current_user,
                  'gravatar_url' => $this->gravatar->get($email),
                  'skkm' => $this->skkm->get_all($id_user),
                  'skkm_valid' => $this->skkm->sum_valid($id_user),
                  'skkm_belum_valid' => $this->skkm->sum_belum_valid($id_user),
                  'skkm_tidak_valid' => $this->skkm->sum_tidak_valid($id_user),
                  'status_skkm' => $this->skkm->status_skkm($id_user));
    $this->template->load('templates/mahasiswa/skkm_template', 'mahasiswa/skkm/list', $data);
  }

  // get data tingkat
  public function get_tingkat()
  {
    $id_jenis = $this->input->post('value');
    $tingkat = $this->skkm->get_tingkat($id_jenis);

    echo '<select name="">';
    echo '<option value="">Pilih Tingkat</option>';
		foreach ($tingkat as $row)
		{
    	echo '<option value="'.$row['id_tingkat'].'">'.$row['tingkat'].'</option>';
		}
		echo '</select>';
  }

  public function get_sebagai()
  {
    $id_tingkat = $this->input->post('value');
    $sebagai = $this->skkm->get_sebagai($id_tingkat);

    echo '<select name="">';
    echo '<option value="">Pilih Sebagai</option>';
		foreach ($sebagai as $row)
		{
    	echo '<option value="'.$row['id_sebagai'].'">'.$row['sebagai'].'</option>';
		}
		echo '</select>';
  }

  public function get_nilai()
  {
    $id_sebagai = $this->input->post('value');
    $nilai = $this->skkm->get_nilai($id_sebagai);

    $data = array();
		foreach ($nilai as $row)
		{
      $data['value'] = $row['bobot'];
      //$data['label'] = $row['id_sebagai'];
		}
    echo $data['value'];
  }

  public function tambah()
  {
    $this->rules_tambah();
    $current_user = $this->ion_auth->user()->row();
    $email = $current_user->email;
    if ($this->form_validation->run() == FALSE) {
      $data = array(
                  'current_user' => $current_user,
                  'gravatar_url' => $this->gravatar->get($email),
                  'dd_jenis' => $this->skkm->get_jenis(),
                  'jenis_selected' => $this->input->post('id_jenis') ? $this->input->post('id_jenis') : '',
                  'tingkat_selected' => $this->input->post('id_tingkat') ? $this->input->post('id_tingkat') : '',
                  'sebagai_selected' => $this->input->post('id_sebagai') ? $this->input->post('id_sebagai') : ''
      );
      $this->template->load('templates/mahasiswa/skkm_template', 'mahasiswa/skkm/add', $data);
    } else {
      $this->load->library('upload');
      $namafile = "file_".time();
      $config= array(
                    'upload_path' => './fileskkm/',
                    'allowed_types' => 'jpeg|jpg|png',
                    'max_size' => '5120',
                    'max_width' => '5000',
                    'max_height' => '5000',
                    'file_name' => $namafile
      );
      $this->upload->initialize($config);

      if ($_FILES['filefoto']['name']) {
        if ($this->upload->do_upload('filefoto')) {
          $gambar = $this->upload->data();
          $data = array(
                        'id_user' => $current_user->id,
                        'nama_kegiatan' => $this->input->post('nama_kegiatan'),
                        'filefoto' => $gambar['file_name'],
                        'id_jenis' => $this->input->post('id_jenis'),
                        'id_tingkat' => $this->input->post('id_tingkat'),
                        'id_sebagai' => $this->input->post('id_sebagai'),
                        'nilai' => $this->input->post('nilai'),
                        'status' => $this->input->post('status') ? $this->input->post('status') : 0,
                        'keterangan' => $this->input->post('keterangan') ? $this->input->post('keterangan') : '-'
          );
          $this->skkm->insert($data);

          // resize gambar
          $resize = array(
                          'image_library' => 'gd2',
                          'source_image' => $this->upload->upload_path.$this->upload->file_name,
                          'new_image' => './fileskkm/resize',
                          'maintain_ratio' => TRUE,
                          'width' => 100,
                          'height' => 100);
          $this->load->library('image_lib', $resize);

          if ( !$this->image_lib->resize()){
            $this->session->set_flashdata('errors', $this->image_lib->display_errors('', ''));
          }
          //pesan yang muncul jika berhasil diupload pada session flashdata
          $this->session->set_flashdata('message', 'SKKM berhasil ditambah.');
          redirect('mahasiswa/skkm');
        } else {
          $this->session->set_flashdata('message', $this->upload->display_errors());
          redirect('mahasiswa/skkm/tambah');
        }
      }
    }
  }

  public function ubah($id = NULL)
  {
    $this->rules_ubah();
    $current_user = $this->ion_auth->user()->row();
    $email = $current_user->email;
    if ($this->form_validation->run() == FALSE) {
      $row = $this->skkm->get_by_id($id);
      if ($row) {
        $data = array(
                    'id_user' => $row->id_user,
                    'id' => $row->id,
                    'nama_kegiatan' => $row->nama_kegiatan,
                    'filefoto' => $row->filefoto,
                    'dd_jenis' => $this->skkm->get_jenis(),
                    'id_jenis' => $row->id_jenis,
                    'dd_tingkat' => $this->skkm->get_tingkat($row->id_jenis),
                    'id_tingkat' => $row->id_tingkat,
                    'dd_sebagai' => $this->skkm->get_sebagai($row->id_tingkat),
                    'id_sebagai' => $row->id_sebagai,
                    'nilai' => $row->nilai,
                    'current_user' => $current_user,
                    'gravatar_url' => $this->gravatar->get($email)
        );
        $this->template->load('templates/mahasiswa/skkm_template', 'mahasiswa/skkm/edit', $data);
      }
    } else {
      $this->load->library('upload');
      $namafile = "file_".time();
      $config= array(
                    'upload_path' => './fileskkm/',
                    'allowed_types' => 'jpeg|jpg|png',
                    'max_size' => '3072',
                    'max_width' => '5000',
                    'max_height' => '5000',
                    'file_name' => $namafile);
      $this->upload->initialize($config);

      if ($_FILES['filefoto']['name']) {
        if ($this->upload->do_upload('filefoto')) {
          $gambar = $this->upload->data();
          $id = $this->input->post('id');
          $data = array(
                        'id_user' => $current_user->id,
                        'nama_kegiatan' => $this->input->post('nama_kegiatan'),
                        'filefoto' => $gambar['file_name'],
                        'id_jenis' => $this->input->post('id_jenis'),
                        'id_tingkat' => $this->input->post('id_tingkat'),
                        'id_sebagai' => $this->input->post('id_sebagai'),
                        'nilai' => $this->input->post('nilai'),
                        'status' => $this->input->post('status') ? $this->input->post('status') : 0,
                        'keterangan' => $this->input->post('keterangan') ? $this->input->post('keterangan') : '-'
          );
          $this->skkm->update($id, $data);

          // resize gambar
          $resize = array(
                          'image_library' => 'gd2',
                          'source_image' => $this->upload->upload_path.$this->upload->file_name,
                          'new_image' => './fileskkm/resize',
                          'maintain_ratio' => TRUE,
                          'width' => 100,
                          'height' => 100);
          $this->load->library('image_lib', $resize);

          if ( !$this->image_lib->resize()){
            $this->session->set_flashdata('errors', $this->image_lib->display_errors('', ''));
          }
          //pesan yang muncul jika berhasil diupload pada session flashdata
          $this->session->set_flashdata('message', 'SKKM berhasil diubah.');
          redirect('mahasiswa/skkm');
        } else {
          $error = array('error' => $this->upload->display_errors());
          $this->session->set_flashdata('message', $error);
          redirect('mahasiswa/skkm/ubah');
        }
      }
    }
  }

  public function hapus($id = NULL)
  {
    $row = $this->skkm->get_by_id($id);

    if ($row) {
      $this->skkm->delete($id);
      $this->session->set_flashdata('message', 'SKKM berhasil dihapus.');
      redirect(site_url('mahasiswa/skkm'));
    } else {
      $this->session->set_flashdata('message', 'Data tidak ditemukan.');
      redirect(site_url('mahasiswa/skkm'));
    }
  }

  public function rules_tambah()
  {
    $this->form_validation->set_rules('nama_kegiatan', 'Nama Kegiatan', 'trim|required');
    $this->form_validation->set_rules('id_jenis', 'Jenis', 'trim|required');
    $this->form_validation->set_rules('id_tingkat', 'Tingkat', 'trim|required');
    $this->form_validation->set_rules('id_sebagai', 'Sebagai', 'trim|required');
    $this->form_validation->set_rules('nilai', 'Nilai', 'trim|required|numeric');
    $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
  }

  public function rules_ubah()
  {
    $this->form_validation->set_rules('nama_kegiatan', 'Nama Kegiatan', 'trim|required');
    $this->form_validation->set_rules('id_jenis', 'Jenis', 'trim|required');
    $this->form_validation->set_rules('id_tingkat', 'Tingkat', 'trim|required');
    $this->form_validation->set_rules('id_sebagai', 'Sebagai', 'trim|required');
    $this->form_validation->set_rules('nilai', 'Nilai', 'trim|required|numeric');
    $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
  }

}
