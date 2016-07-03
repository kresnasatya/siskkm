<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller{

  function __construct()
  {
    parent::__construct();
  }

}

/**
 * Admin Controller Class
 */
class Admin_Controller extends MY_Controller
{

  function __construct()
  {
    parent::__construct();
    if (!$this->ion_auth->logged_in()) {
      $this->session->set_flashdata('message', 'Kamu bukan admin!');
      redirect('login');
    }
      $event = 'logged_in';
      $class = 'Admin_Controller';

      $name = 'get_gravatar_hash';
      $method = '_gravatar';
      $this->ion_auth->set_hook($event, $name, $class, $method, array());
  }

  public function _gravatar()
    {
        if($this->form_validation->valid_email($_SESSION['email']))
        {
            $gravatar_url = md5(strtolower(trim($_SESSION['email'])));
            $_SESSION['gravatar'] = $gravatar_url;
        }
        return TRUE;
    }

}

/**
 * Anggota UP2KK Class
 */
class UP2KK_Controller extends MY_Controller
{

  function __construct()
  {
    parent::__construct();
    if (!$this->ion_auth->in_group('up2kk')) {
      $this->session->set_flashdata('message','Kamu bukan up2kk!');
      redirect('login');
    }
  }

}

/**
 * Mahasiswa Class
 */
class Mahasiswa_Controller extends MY_Controller
{

  function __construct()
  {
    parent::__construct();
    if (!$this->ion_auth->in_group('mahasiswa')) {
      $this->session->set_flashdata('message','Kamu bukan mahasiswa!');
      redirect('login');
    }
  }

}
