<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User extends Admin_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $current_user = $this->ion_auth->user()->row();
        $data = array(
            'current_user' => $current_user,
            'gravatar_url' => $this->gravatar->get($current_user->email)
        );
        $this->template->load('templates/admin/user_template', 'admin/user/index', $data);
    }

    public function profil()
    {
        $this->profil_rules();
        $current_user = $this->ion_auth->user()->row();
        $data = array(
            'current_user' => $current_user,
            'gravatar_url' => $this->gravatar->get($current_user->email)
        );
        if ($this->form_validation->run() == FALSE) {
            $this->template->load('templates/admin/user_template', 'admin/user/profil', $data);
        }
    }

    public function update_profil()
    {
        $user_id = $this->input->post('user_id');
        $new_data = array(
            'nama_depan' => $this->input->post('nama_depan'),
            'nama_belakang' => $this->input->post('nama_belakang'),
            'nip' => $this->input->post('nip'),
            'email' => $this->input->post('email')
        );
        $this->ion_auth->update($user_id, $new_data);
        $this->session->set_flashdata('message', "<div style='color:#00a65a;'>" . $this->ion_auth->messages() . "</div>");
        redirect(site_url('admin/user'));
    }

    public function password()
    {
        $this->password_rules();
        $current_user = $this->ion_auth->user()->row();
        $data = array(
            'current_user' => $current_user,
            'gravatar_url' => $this->gravatar->get($current_user->email)
        );
        if ($this->form_validation->run() == FALSE) {
            $this->template->load('templates/admin/user_template', 'admin/user/password', $data);
        }
    }

    public function update_password()
    {
        $user_id = $this->input->post('user_id');
        $data = array('password' => $this->input->post('password_baru'));

        $this->ion_auth->update($user_id, $data);

        $this->ion_auth->logout();
        $this->session->set_flashdata('message', "<div style='color:#00a65a;'>Password berhasil diubah.</div>");
        redirect(site_url('login'));
    }

    public function profil_rules()
    {
        $this->form_validation->set_rules('nama_depan', 'Nama depan', 'trim|required');
        $this->form_validation->set_rules('nama_belakang', 'Nama belakang', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('nip', 'Nip', 'trim|required');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function password_rules()
    {
        $this->form_validation->set_rules('password_baru', 'Password Baru', 'trim|required');
        $this->form_validation->set_rules('konfirmasi_password', 'Konfirmasi Password', 'trim|required|matches[password_baru]');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}
