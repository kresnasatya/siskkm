<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tingkat_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
  }

  public function get_all()
  {
    $sql = "SELECT id_tingkat, jenis.jenis, tingkat FROM tingkat
            INNER JOIN jenis
            ON tingkat.id_jenis_fk = jenis.id_jenis";
    return $this->db->query($sql)->result();
  }

}
