<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenis_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
  }

  public function get_all()
  {
    $sql = "SELECT * FROM jenis";
    return $this->db->query($sql)->result();
  }

}
