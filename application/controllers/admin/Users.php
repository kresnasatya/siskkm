<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Users extends Admin_Controller{
    function __construct(){
        parent::__construct();
        if (!$this->ion_auth->in_group('admin')) {
          $this->session->set_flashdata('message','Kamu bukan admin!');
          redirect('login','refresh');
        }
        $this->load->model('admin/users_model');
        $this->load->library('form_validation');
    }

    public function index($group_id = NULL){
        $data['current_user'] = $this->ion_auth->user()->row();
        $data['users'] = $this->ion_auth->users($group_id)->result();

        $this->template->load('templates/admin/users_template','admin/users/list',$data);
    }

    public function create(){
        $data = array(
                      'button' => 'Tambah',
                      'action' => 'admin/users/create_action',
                      'groups' => $this->ion_auth->groups()->result(),
                      'dd_jurusan' => $this->users_model->get_jurusan(),
                      'jurusan_selected' => $this->input->post('id_jurusan') ? $this->input->post('id_jurusan') : '',
                      'dd_prodi' => $this->users_model->get_prodi(),
                      'prodi_selected' => $this->input->post('id_prodi') ? $this->input->post('id_prodi') : '',
                      'dd_semester' => $this->users_model->get_semester(),
                      'semester_selected' => $this->input->post('id_semester') ? $this->input->post('id_semester') : '',
                      'dd_kelas' => $this->users_model->get_kelas(),
                      'kelas_selected' => $this->input->post('id_kelas') ? $this->input->post('id_kelas') : '',
                      'current_user' => $this->ion_auth->user()->row());

        $this->template->load('templates/admin/users_template','admin/users/add',$data);
    }

    public function create_action(){
        $this->rules_create();
        if ($this->form_validation->run() === FALSE) {
          $this->create();
        }else {
          $username = $this->input->post('username');
          $email = $this->input->post('email');
          $password = $this->input->post('password');
          $group_id = $this->input->post('groups');

          $additional_data = array(
                              'nama_depan' => $this->input->post('nama_depan'),
                              'nama_belakang' => $this->input->post('nama_belakang'),
                              'nim' => $this->input->post('nim') ? $this->input->post('nim') : "-",
                              'nip' => $this->input->post('nip') ? $this->input->post('nip') : "-",
                              'id_jurusan' => $this->input->post('id_jurusan') ? $this->input->post('id_jurusan') : 0,
                              'id_prodi' => $this->input->post('id_prodi') ? $this->input->post('id_prodi') : 0,
                              'id_kelas' => $this->input->post('id_kelas') ? $this->input->post('id_kelas') : 0,
                              'id_semester' => $this->input->post('id_semester') ? $this->input->post('id_semester') : 0
          );

          // urutan parameter untuk register : username, password, email, data tambahan, id group
           $this->ion_auth->register($username, $password, $email, $additional_data, $group_id);
           $this->session->set_flashdata('message', $this->ion_auth->messages());
          redirect('admin/users','refresh');
        }
    }

    public function update($user_id = NULL){
      $user_id = $this->input->post('user_id') ? $this->input->post('user_id') : $user_id;

      if ($user = $this->ion_auth->user((int) $user_id)->row()) {
        $data = array(
                      'user' => $user,
                      'button' => 'Edit',
                      'action' => 'admin/users/update_action',
                      'groups' => $this->ion_auth->groups()->result(),
                      'usergroups' => array(),
                      'dd_jurusan' => $this->users_model->get_jurusan(),
                      'dd_prodi' => $this->users_model->get_prodi(),
                      'dd_kelas' => $this->users_model->get_kelas(),
                      'dd_semester' => $this->users_model->get_semester(),
                      'current_user' => $this->ion_auth->user()->row());

      }else {
        $this->session->set_flashdata('message','User tidak ada');
        redirect('admin/users','refresh');
      }
      $data['groups'] = $this->ion_auth->groups()->result();
      $data['usergroups'] = array();
      if ($usergroups = $this->ion_auth->get_users_groups($user->id)->result()) {
        foreach ($usergroups as $group) {
          $data['usergroups'][] = $group->id;
        }
      }
      $this->template->load('templates/admin/users_template','admin/users/edit',$data);

      }

    public function update_action(){
      $this->rules_update();
      if ($this->form_validation->run() === FALSE) {
        $this->update();
      }else {
        $user_id = $this->input->post('user_id');
        $new_data = array(
                    'username' => $this->input->post('username'),
                    'email' => $this->input->post('email'),
                    'nama_depan' => $this->input->post('nama_depan'),
                    'nama_belakang' => $this->input->post('nama_belakang'),
                    'nim' => $this->input->post('nim') ? $this->input->post('nim') : "-",
                    'nip' => $this->input->post('nip') ? $this->input->post('nip') : "-",
                    'id_jurusan' => $this->input->post('id_jurusan') ? $this->input->post('id_jurusan') : 0,
                    'id_prodi' => $this->input->post('id_prodi') ? $this->input->post('id_prodi') : 0,
                    'id_kelas' => $this->input->post('id_kelas') ? $this->input->post('id_kelas') : 0,
                    'id_semester' => $this->input->post('id_semester') ? $this->input->post('id_semester') : 0
        );
        $this->ion_auth->update($user_id, $new_data);

        // Update groups
        $groups = $this->input->post('groups');
        if (isset($groups) && !empty($groups)) {
          $this->ion_auth->remove_from_group('', $user_id);
          foreach ($groups as $group) {
            $this->ion_auth->add_to_group($group, $user_id);
          }
        }

        $this->session->set_flashdata('message',$this->ion_auth->messages());
        redirect('admin/users','refresh');
    }
  }

    public function delete($user_id = NULL)
    {
      if (is_null($user_id)) {
        $this->session->set_flashdata('message','Tidak ada data user untuk dihapus');
      }
      else {
        $this->ion_auth->delete_user($user_id);
        $this->session->set_flashdata('message', $this->ion_auth->messages());
      }
      redirect('admin/users','refresh');
    }

    public function rules_create(){
      $this->form_validation->set_rules('username', 'username', 'trim|required|is_unique[users.username]');
      $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');
      $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]|max_length[20]');
      $this->form_validation->set_rules('confirm_password', 'Confirm password', 'trim|required|matches[password]');
      $this->form_validation->set_rules('nama_depan', 'Nama depan', 'trim|required');
      $this->form_validation->set_rules('nama_belakang', 'Nama belakang', 'trim|required');
      $this->form_validation->set_rules('groups[]','Groups','required|integer');
      $this->form_validation->set_rules('nim', 'Nim', 'trim|is_unique[users.nim]');
      $this->form_validation->set_rules('nip', 'Nip', 'trim|is_unique[users.nip]');
      $this->form_validation->set_rules('id_jurusan', 'Jurusan', 'trim');
      $this->form_validation->set_rules('id_prodi', 'Prodi', 'trim');
      $this->form_validation->set_rules('id_kelas', 'Kelas', 'trim');
      $this->form_validation->set_rules('id_semester', 'Semester', 'trim');
      $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function rules_update(){
      $this->form_validation->set_rules('username', 'username', 'trim|required');
      $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
      $this->form_validation->set_rules('nama_depan', 'Nama depan', 'trim|required');
      $this->form_validation->set_rules('nama_belakang', 'Nama belakang', 'trim|required');
      $this->form_validation->set_rules('groups[]','Groups','required|integer');
      $this->form_validation->set_rules('nim', 'Nim', 'trim');
      $this->form_validation->set_rules('nip', 'Nip', 'trim');
      $this->form_validation->set_rules('id_jurusan', 'Jurusan', 'trim');
      $this->form_validation->set_rules('id_prodi', 'Prodi', 'trim');
      $this->form_validation->set_rules('id_kelas', 'Kelas', 'trim');
      $this->form_validation->set_rules('id_semester', 'Semester', 'trim');
      $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}
