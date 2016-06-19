<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bobotskkm_model extends CI_Model {

  public function __construct()
  {
    parent::__construct();

  }

  /*---------- Jenis -----------*/
  public function get_all_jenis()
  {
    $query = $this->db->get('jenis');
    return $query->result();
  }
  /*---------- End Jenis -----------*/

  /*---------- Tingkat -----------*/
  public function get_all_tingkat()
  {
    $sql = "SELECT id_tingkat, jenis.jenis, tingkat FROM tingkat
            INNER JOIN jenis
            ON tingkat.id_jenis_fk = jenis.id_jenis";
    return $this->db->query($sql)->result();
  }
  /*---------- End Tingkat -----------*/

  /*---------- Sebagai -----------*/
  public function get_all_sebagai()
  {
    $sql = "SELECT id_sebagai, tingkat.tingkat, sebagai, bobot FROM sebagai
            INNER JOIN tingkat
            ON tingkat.id_tingkat = sebagai.id_tingkat_fk";
    return $this->db->query($sql)->result();
  }
  /*---------- End Sebagai -----------*/

}
