<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dasbor_model extends CI_Model {

  public function __construct()
  {
    parent::__construct();

  }

  // menghitung jumlah skkm valid
  public function skkm_valid()
  {
    $this->db->where('status', 1); // 1 berarti valid
    $this->db->from('skkm');
    return $this->db->count_all_results();
  }

  // menghitung jumlah skkm tidak valid
  public function skkm_tidak_valid()
  {
    $this->db->where('status', 0); // 1 berarti valid
    $this->db->from('skkm');
    return $this->db->count_all_results();
  }

}
