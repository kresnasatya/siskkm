<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
    $this->load->helper('language');
    $this->lang->load(array('auth', 'ion_auth'));

    $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

    $this->load->model('Register_model', 'register');
  }

  public function login()
  {
    // jika user telah Login
    $this->check_login_status();

    // kalau user belum login
    if ($this->input->post()) {
        $this->_rules();
        if ($this->form_validation->run() == TRUE) {
            $identity = $this->input->post('identity');
            $password = $this->input->post('password');
            if ($this->ion_auth->login($identity, $password)) {
                if ($this->ion_auth->is_admin()) {
                    redirect('admin/dasbor');
                } elseif ($this->ion_auth->in_group('mahasiswa')) {
                    redirect('mahasiswa/dasbor');
                } elseif ($this->ion_auth->in_group('up2kk')) {
                    redirect('up2kk/dasbor');
                }
            } else {
                $this->session->set_flashdata('message', "<div style='color:#fc0000;'>Kombinasi email dan password salah.</div>");
                redirect('login', 'refresh');
            }
        }
    }
    $this->template->load('auth/template', 'auth/login');
  }

  public function check_login_status()
  {
      // kalau user telah login sebelumnya
      if ($this->ion_auth->logged_in()) {
          if ($this->ion_auth->is_admin()) {
              redirect('admin/dasbor');
          } elseif ($this->ion_auth->in_group('mahasiswa')) {
              redirect('mahasiswa/dasbor');
          } elseif ($this->ion_auth->in_group('up2kk')) {
              redirect('up2kk/dasbor');
          }
      }
  }

  public function logout()
  {
    // Log the user out
    $this->ion_auth->logout();

    // redirect them to the login page
    $this->session->set_flashdata('message', $this->ion_auth->messages());
    redirect(site_url('login'));
  }

  public function get_prodi()
  {
    // bukan 'id_jurusan' tetapi 'row'. Lihat fungsi getProdi di javascript.
    $id_jurusan = $this->input->post('row');
    $prodi = $this->register->get_prodi($id_jurusan);

    echo '<select name="">';
    echo '<option value="">Pilih Prodi</option>';
    foreach ($prodi as $row) {
        echo '<option value="' . $row->id . '">' . $row->nama_prodi . '</option>';
    }
    echo '</select>';
  }

  public function register()
  {
    $data = array(
            'dd_jurusan' => $this->register->get_jurusan(),
            'dd_semester' => $this->register->get_semester(),
            'semester_selected' => $this->input->post('id_semester'),
            'dd_kelas' =>  $this->register->get_kelas(),
            'kelas_selected' => $this->input->post('id_kelas'));
    $this->template->load('auth/template', 'auth/register', $data);
  }

  public function create_mahasiswa()
  {
    $this->register_rules();
    if ($this->form_validation->run() == FALSE) {
      $this->register();
    } else {
      $email = $this->input->post('email');
      $group_id = array('3'); // Set user to mahasiswa
      $password = 'password';

      $additional_data = array(
                        'nama_lengkap' => $this->input->post('nama_lengkap'),
                        'nim' => $this->input->post('nim'),
                        'id_jurusan' => $this->input->post('id_jurusan'),
                        'id_prodi' => $this->input->post('id_prodi'),
                        'id_kelas' => $this->input->post('id_kelas'),
                        'id_semester' => $this->input->post('id_semester'));

      // urutan parameter untuk register : username, password, email, data tambahan, id group
      $this->ion_auth->register('', $password, $email, $additional_data, $group_id);
      $this->session->set_flashdata('message', "<div style='color:#00a65a;'>" . $this->ion_auth->messages() . "</div>");
      redirect(site_url('login'));
    }
  }

  public function activate($id, $code = false)
  {
    if ($code !== false)
		{
			$activation = $this->ion_auth->activate($id, $code);
		}
		else if ($this->ion_auth->is_admin())
		{
			$activation = $this->ion_auth->activate($id);
		}

		if ($activation)
		{
			// redirect them to the auth page
			$this->session->set_flashdata('message', $this->ion_auth->messages());
			redirect('login');
		}
		else
		{
			// redirect them to the forgot password page
			$this->session->set_flashdata('message', $this->ion_auth->errors());
			redirect('forgot_password');
		}
  }

  public function _rules()
  {
       $this->form_validation->set_rules('identity', '', 'trim|required');
       $this->form_validation->set_rules('password', '', 'trim|required');
       $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
  }

  public function register_rules()
  {
    $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'trim|required');
    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');
    $this->form_validation->set_rules('nim', 'NIM', 'trim|required|is_unique[users.nim]|numeric|min_length[10]|max_length[10]');
    $this->form_validation->set_rules('id_jurusan', 'Jurusan', 'trim|required');
    $this->form_validation->set_rules('id_prodi', 'Prodi', 'trim|required');
    $this->form_validation->set_rules('id_semester', 'Semester', 'trim|required');
    $this->form_validation->set_rules('id_kelas', 'Kelas', 'trim|required');
    $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
  }

  public function forgot_password()
  {
    // setting validation rules by checking whether identity is username or email
    if ($this->config->item('identity', 'ion_auth') != 'email') {
        $this->form_validation->set_rules('identity', $this->lang->line('forgot_password_identity_label'), 'required');
    } else {
        $this->form_validation->set_rules('identity', $this->lang->line('forgot_password_validation_email_label'), 'required');
    }

    if ($this->form_validation->run() == FALSE) {
        $this->data['type'] = $this->config->item('identity', 'ion_auth');

        // setup the input
        $this->data['identity'] = array('name' => 'identity', 'id' => 'identity');

        if ($this->config->item('identity', 'ion_auth') != 'email') {
            $this->data['identity_label'] = $this->lang->line('forgot_password_identity_label');
        } else {
            $this->data['identity_label'] = $this->lang->line('forgot_password_email_identity_label');
        }

        // set any errors and display the form
        $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
        $this->template->load('auth/template', 'auth/forgot_password', $this->data);
    } else {
        $identity_column = $this->config->item('identity', 'ion_auth');
        $identity = $this->ion_auth->where($identity_column, $this->input->post('identity'))->users()->row();

        if (empty($identity)) {

            if ($this->config->item('identity', 'ion_auth') != 'email') {
                $this->ion_auth->set_error('forgot_password_identity_not_found');
            } else {
                $this->ion_auth->set_error('forgot_password_email_not_found');
            }

            $this->session->set_flashdata('message', $this->ion_auth->errors());
            redirect(site_url('forgot_password'));
        }

        // run the forgotten password method to email an activation code to the user
        $forgotten = $this->ion_auth->forgotten_password($identity->{$this->config->item('identity', 'ion_auth')});

        if ($forgotten) {
            // if there were no errors

            $this->session->set_flashdata('message', $this->ion_auth->messages());
            redirect(site_url('login')); //we should display a confirmation page here instead of the login page
        } else {
            $this->session->set_flashdata('message', $this->ion_auth->errors());
            redirect(site_url('forgot_password'));
        }
    }
  }

  public function reset_password($code = NULL)
  {
    if (!$code) {
        show_404();
    }

    $user = $this->ion_auth->forgotten_password_check($code);

    if ($user) {
        // if the code is valid then display the password reset form

        $this->form_validation->set_rules('new', $this->lang->line('reset_password_validation_new_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[new_confirm]');
        $this->form_validation->set_rules('new_confirm', $this->lang->line('reset_password_validation_new_password_confirm_label'), 'required');

        if ($this->form_validation->run() == false) {
            // display the form

            // set the flash data error message if there is one
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

            $this->data['min_password_length'] = $this->config->item('min_password_length', 'ion_auth');
            $this->data['new_password'] = array(
                'name' => 'new',
                'id' => 'new',
                'type' => 'password',
                'pattern' => '^.{' . $this->data['min_password_length'] . '}.*$',
            );
            $this->data['new_password_confirm'] = array(
                'name' => 'new_confirm',
                'id' => 'new_confirm',
                'type' => 'password',
                'pattern' => '^.{' . $this->data['min_password_length'] . '}.*$',
            );
            $this->data['user_id'] = array(
                'name' => 'user_id',
                'id' => 'user_id',
                'type' => 'hidden',
                'value' => $user->id,
            );
            $this->data['csrf'] = $this->_get_csrf_nonce();
            $this->data['code'] = $code;


            $this->template->load('auth/template', 'auth/reset_password', $this->data);
        } else {
            // do we have a valid request?
            if ($this->_valid_csrf_nonce() === FALSE || $user->id != $this->input->post('user_id')) {

                // something fishy might be up
                $this->ion_auth->clear_forgotten_password_code($code);

                show_error($this->lang->line('error_csrf'));

            } else {
                // finally change the password
                $identity = $user->{$this->config->item('identity', 'ion_auth')};

                $change = $this->ion_auth->reset_password($identity, $this->input->post('new'));

                if ($change) {
                    // if the password was successfully changed
                    $this->session->set_flashdata('message', $this->ion_auth->messages());
                    redirect(site_url('login'));
                } else {
                    $this->session->set_flashdata('message', $this->ion_auth->errors());
                    redirect(site_url('reset_password/' . $code, 'refresh'));
                }
            }
        }
    } else {
        // if the code is invalid then send them back to the forgot password page
        $this->session->set_flashdata('message', $this->ion_auth->errors());
        redirect(site_url('forgot_password', 'refresh'));
    }
  }

  public function _get_csrf_nonce()
  {
    $this->load->helper('string');
    $key = random_string('alnum', 8);
    $value = random_string('alnum', 20);
    $this->session->set_flashdata('csrfkey', $key);
    $this->session->set_flashdata('csrfvalue', $value);

    return array($key => $value);
  }

  public function _valid_csrf_nonce()
  {
    if ($this->input->post($this->session->flashdata('csrfkey')) !== FALSE &&
        $this->input->post($this->session->flashdata('csrfkey')) == $this->session->flashdata('csrfvalue')
    ) {
        return TRUE;
    } else {
        return FALSE;
    }
  }

}
