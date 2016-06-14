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
      $this->session->set_flashdata('message','Kamu harus jadi admin untuk login!');
      redirect('login');
    }
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
      $this->session->set_flashdata('message','Kamu harus jadi up2kk untuk login!');
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
      $this->session->set_flashdata('message','Kamu harus jadi mahasiswa untuk login!');
      redirect('login');
    }
  }

}
