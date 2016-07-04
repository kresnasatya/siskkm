<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User extends UP2KK_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('up2kk/User_model', 'user');
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
                  'profil' => $this->user->get_profil($id_user)
    );
    $this->template->load('templates/up2kk/user_template', 'up2kk/user/profil', $data);
  }

  function edit_profil()
  {
    $this->rules_edit_profil();
    $current_user = $this->ion_auth->user()->row();
    $email = $current_user->email;
    if ($this->form_validation->run() == FALSE) {
      $data = array(
                    'dd_jurusan' => $this->user->get_jurusan(),
                    'current_user' => $current_user,
                    'gravatar_url' => $this->gravatar->get($email)
      );
      $this->template->load('templates/up2kk/user_template', 'up2kk/user/edit',  $data);
    }else{
      $new_data = array(
                    'nama_depan' => $this->input->post('nama_depan'),
                    'nama_belakang' => $this->input->post('nama_belakang'),
                    'nip' => $this->input->post('nip'),
                    'email' => $this->input->post('email'),
                    'id_jurusan' => $this->input->post('id_jurusan')
      );

      $this->ion_auth->update($current_user->id,  $new_data);

      $this->session->set_flashdata('message',  $this->ion_auth->messages());
      redirect('up2kk/user', 'refresh');
    }
  }

  function ubah_password()
  {
    $this->rules_ubah_password();
    $current_user = $this->ion_auth->user()->row();
    $email = $current_user->email;
    $data = array(
                  'current_user' => $current_user,
                  'gravatar_url' => $this->gravatar->get($email)
    );
    if ($this->form_validation->run() == FALSE) {
      $this->template->load('templates/up2kk/user_template', 'up2kk/user/ubah_password',  $data);
    }else{
      $id_user = $this->input->post('user_id');
      $data = array('password' => $this->input->post('password_baru'));

      $this->ion_auth->update($id_user,  $data);

      $this->ion_auth->logout();
      $this->session->set_flashdata('message',  $this->ion_auth->messages());
      redirect('login', 'refresh');
    }
  }

  function rules_edit_profil()
  {
    $this->form_validation->set_rules('nama_depan',  'Nama depan',  'trim|required');
    $this->form_validation->set_rules('nama_belakang',  'Nama belakang',  'trim|required');
    $this->form_validation->set_rules('email',  'Email',  'trim|required|valid_email');
    $this->form_validation->set_rules('nip',  'Nip',  'trim|required');
    $this->form_validation->set_error_delimiters('<span class="text-danger">',  '</span>');
  }

  public function rules_ubah_password()
  {
    $this->form_validation->set_rules('password_baru',  'Password Baru',  'trim|required');
    $this->form_validation->set_rules('konfirmasi_password',  'Konfirmasi Password',  'trim|required|matches[password_baru]');
    $this->form_validation->set_error_delimiters('<span class="text-danger">',  '</span>');
  }

}
