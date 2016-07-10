<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User extends Mahasiswa_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('mahasiswa/User_model', 'user');
    $this->load->model('mahasiswa/Skkm_model', 'skkm');
    $this->load->library('form_validation');
  }

  function index()
  {
    $current_user = $this->ion_auth->user()->row();
    $id_user = $current_user->id;
    $email = $current_user->email;
    $data = array(
                  'current_user' => $current_user,
                  'gravatar_url' => $this->gravatar->get($email),
                  'profil' => $this->user->get_profil($id_user),
                  'sum_valid' => $this->skkm->sum_valid($id_user),
                  'sum_tidak_valid' => $this->skkm->sum_tidak_valid($id_user),
                  'sum_belum_valid' => $this->skkm->sum_belum_valid($id_user),
                  'status_skkm' => $this->skkm->status_skkm($id_user)
    );
    $this->template->load('templates/mahasiswa/user_template', 'mahasiswa/user/profil', $data);
  }

  public function get_prodi()
  {
		$id_jurusan = $this->input->post('row'); // bukan 'id_jurusan' tetapi 'row'. Lihat fungsi get_prodi di javascript.
		$prodi = $this->user->get_prodi($id_jurusan);

		echo '<select name="">';
    echo '<option value="">Pilih Prodi</option>';
		foreach ($prodi as $row)
		{
    	echo '<option value="'.$row['id'].'">'.$row['nama_prodi'].'</option>';
		}
		echo '</select>';
  }

  function edit_profil()
  {
    $this->rules_edit_profil();
    $current_user = $this->ion_auth->user()->row();
    $email = $current_user->email;
    if ($this->form_validation->run() == FALSE) {
      $data = array(
                    'dd_jurusan' => $this->user->get_jurusan(),
                    'dd_prodi' => $this->user->get_prodi($current_user->id_jurusan),
                    'dd_kelas' => $this->user->get_kelas(),
                    'dd_semester' => $this->user->get_semester(),
                    'current_user' => $current_user,
                    'gravatar_url' => $this->gravatar->get($email)
      );
      $this->template->load('templates/mahasiswa/user_template', 'mahasiswa/user/edit', $data);
    }else{
      $new_data = array(
                    'nama_depan' => $this->input->post('nama_depan'),
                    'nama_belakang' => $this->input->post('nama_belakang'),
                    'nim' => $this->input->post('nim'),
                    'email' => $this->input->post('email'),
                    'id_jurusan' => $this->input->post('id_jurusan'),
                    'id_prodi' => $this->input->post('id_prodi'),
                    'id_kelas' => $this->input->post('id_kelas'),
                    'id_semester' => $this->input->post('id_semester')
      );
      $this->ion_auth->update($current_user->id, $new_data);

      $this->session->set_flashdata('message', "<div style='color:#00a65a;'>".$this->ion_auth->messages()."</div>");
      redirect('mahasiswa/user', 'refresh');
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
      $this->template->load('templates/mahasiswa/user_template', 'mahasiswa/user/ubah_password', $data);
    }else{
      $id_user = $this->input->post('user_id');
      $data = array('password' => $this->input->post('password_baru'));

      $this->ion_auth->update($id_user, $data);

      $this->ion_auth->logout();
      $this->session->set_flashdata('message', "<div style='color:#00a65a;'>Password berhasil diubah.</div>");
      redirect('login', 'refresh');
    }
  }

  function rules_edit_profil()
  {
    $this->form_validation->set_rules('nama_depan', 'Nama depan', 'trim|required');
    $this->form_validation->set_rules('nama_belakang', 'Nama belakang', 'trim|required');
    $this->form_validation->set_rules('nim', 'Nim', 'trim|required');
    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
    $this->form_validation->set_rules('id_jurusan', 'Jurusan', 'trim|required');
    $this->form_validation->set_rules('id_prodi', 'Prodi', 'trim|required');
    $this->form_validation->set_rules('id_kelas', 'Kelas', 'trim|required');
    $this->form_validation->set_rules('id_semester', 'Semester', 'trim|required');
    $this->form_validation->set_error_delimiters('<span class="text-warning">', '</span>');
  }

  public function rules_ubah_password()
  {
    $this->form_validation->set_rules('password_baru', 'Password Baru', 'trim|required');
    $this->form_validation->set_rules('konfirmasi_password', 'Konfirmasi Password', 'trim|required|matches[password_baru]');
    $this->form_validation->set_error_delimiters('<span class="text-warning">', '</span>');
  }

}
