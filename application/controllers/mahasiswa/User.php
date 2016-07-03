<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User extends Mahasiswa_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
  }

  function index()
  {
    $current_user = $this->ion_auth->user()->row();
    $data['current_user'] = $current_user;
    $this->template->load('templates/mahasiswa/user_template', 'mahasiswa/user/profil', $data);
  }

  function edit_profil()
  {
    $current_user = $this->ion_auth->user()->row();
    $data['current_user'] = $current_user;
    $this->rules_edit_profil();
    if ($this->form_validation->run()===FALSE) {
      $this->template->load('templates/mahasiswa/user_template', 'mahasiswa/user/edit', $data);
    }else{
      $new_data = array(
                    'nama_depan' => $this->input->post('nama_depan'),
                    'nama_belakang' => $this->input->post('nama_belakang'),
                    'nim' => $this->input->post('nim'),
                    'email' => $this->input->post('email'),
                    'username' => $this->input->post('username')
      );
      $this->ion_auth->update($current_user->id, $new_data);

      $this->session->set_flashdata('message', $this->ion_auth->messages());
      redirect('mahasiswa/user', 'refresh');
    }
  }

  function ubah_password()
  {
    $current_user = $this->ion_auth->user()->row();
    $data['current_user'] = $current_user;
    $this->rules_ubah_password();
    if ($this->form_validation->run()===FALSE) {
      $this->template->load('templates/mahasiswa/user_template', 'mahasiswa/user/ubah_password', $data);
    }else{
      $id_user = $this->input->post('user_id');
      $data = array('password' => $this->input->post('password_baru'));

      $this->ion_auth->update($id_user, $data);

      $this->ion_auth->logout();
      $this->session->set_flashdata('message', $this->ion_auth->messages());
      redirect('login', 'refresh');
    }
  }

  function rules_edit_profil()
  {
    $this->form_validation->set_rules('nama_depan', 'Nama depan', 'trim|required');
    $this->form_validation->set_rules('nama_belakang', 'Nama belakang', 'trim|required');
    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
    $this->form_validation->set_rules('nim', 'Nim', 'trim|required');
  }

  public function rules_ubah_password()
  {
    $this->form_validation->set_rules('password_baru', 'Password Baru', 'trim|required');
    $this->form_validation->set_rules('konfirmasi_password', 'Konfirmasi Password', 'trim|required|matches[password_baru]');
    $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
  }

}
