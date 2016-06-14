<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();

  }

  // fungsi menghitung jumlah user yang terdaftar
  function count_user()
  {
    return $this->db->count_all('users');
  }

  // fungsi menghitung jumlah pengumuman yang dibuat
  function count_pengumuman()
  {
    return $this->db->count_all('pengumuman');
  }

}
