<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User extends Mahasiswa_Controller{

  function __construct(){
    parent::__construct();
    if (!$this->ion_auth->in_group('mahasiswa')) {
      $this->session->set_flashdata('message','Kamu bukan mahasiswa!');
      redirect('login','refresh');
    }
    $this->load->library('form_validation');
  }

  function profil(){
    $current_user = $this->ion_auth->user()->row();
    $data['current_user'] = $current_user;
    $this->template->load('templates/mahasiswa/user_template','mahasiswa/user/profil', $data);
  }

  function edit(){
    $current_user = $this->ion_auth->user()->row();
    $data['current_user'] = $current_user;
    $this->_rules();
    if ($this->form_validation->run()===FALSE) {
      $this->template->load('templates/mahasiswa/user_template','mahasiswa/user/edit', $data);
    }else{
      $new_data = array(
                    'nama_depan' => $this->input->post('nama_depan'),
                    'nama_belakang' => $this->input->post('nama_belakang'),
                    'nim' => $this->input->post('nim'));
      if(strlen($this->input->post('password'))>=8) $new_data['password'] = $this->input->post('password');
      $this->ion_auth->update($current_user->id, $new_data);

      $this->session->set_flashdata('message', $this->ion_auth->messages());
      redirect('mahasiswa/user/profil','refresh');
    }
  }

  function _rules(){
    $this->form_validation->set_rules('nama_depan', 'Nama depan', 'trim|required');
    $this->form_validation->set_rules('nama_belakang', 'Nama belakang', 'trim|required');
    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
    $this->form_validation->set_rules('nim', 'Nim', 'trim|required');
    $this->form_validation->set_rules('password', 'Ubah Password', 'trim|min_length[8]|max_length[20]');
  }

}
