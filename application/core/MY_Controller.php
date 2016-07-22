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
    if (!$this->ion_auth->is_admin()) {
      $this->session->set_flashdata('message', "<div style='color:red;'>Kamu bukan admin!</div>");
      redirect('login');
    }
    // menggunakan gravatar untuk profile picture
    $this->load->library('gravatar');
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
      $this->session->set_flashdata('message', "<div style='color:red;'>Kamu bukan up2kk!</div>");
      redirect('login');
    }
    // menggunakan gravatar untuk profile picture
    $this->load->library('gravatar');
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
      $this->session->set_flashdata('message', "<div style='color:red;'>Kamu bukan mahasiswa!</div>");
      redirect('login');
    }
    // menggunakan gravatar untuk profile picture
    $this->load->library('gravatar');
  }

}
