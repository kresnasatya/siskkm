<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sebagai_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();

  }

  public function get_all()
  {
    $sql = "SELECT id_sebagai, tingkat.tingkat, sebagai, bobot FROM sebagai
            INNER JOIN tingkat
            ON tingkat.id_tingkat = sebagai.id_tingkat_fk";
    return $this->db->query($sql)->result();
  }

}
