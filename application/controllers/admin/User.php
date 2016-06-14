<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User extends Admin_Controller{

  function __construct(){
    parent::__construct();
    if (!$this->ion_auth->in_group('admin')) {
      $this->session->set_flashdata('message','Kamu bukan admin!');
      redirect('login','refresh');
    }
    $this->load->library('form_validation');
  }

  function profil(){
    $current_user = $this->ion_auth->user()->row();
    $data['current_user'] = $current_user;
    $this->template->load('templates/admin/user_template','admin/user/profil', $data);
  }

  function edit(){
    $current_user = $this->ion_auth->user()->row();
    $data['current_user'] = $current_user;
    $this->_rules();
    if ($this->form_validation->run()===FALSE) {
      $this->template->load('templates/admin/user_template','admin/user/edit', $data);
    }else{
      $new_data = array(
                    'nama_depan' => $this->input->post('nama_depan'),
                    'nama_belakang' => $this->input->post('nama_belakang'),
                    'nip' => $this->input->post('nip'));
      if(strlen($this->input->post('password'))>=8) $new_data['password'] = $this->input->post('password');
      $this->ion_auth->update($current_user->id, $new_data);

      $this->session->set_flashdata('message', $this->ion_auth->messages());
      redirect('admin/user/profile','refresh');
    }
  }

  function _rules(){
    $this->form_validation->set_rules('nama_depan', 'Nama depan', 'trim|required');
    $this->form_validation->set_rules('nama_belakang', 'Nama belakang', 'trim|required');
    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
    $this->form_validation->set_rules('nip', 'Nip', 'trim|required');
    $this->form_validation->set_rules('password', 'Ubah Password', 'trim|min_length[8]|max_length[20]');
  }

}
