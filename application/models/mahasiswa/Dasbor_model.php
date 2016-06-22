<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dasbor_model extends CI_Model {

  public function __construct()
  {
    parent::__construct();

  }

  // menghitung jumlah nilai skkm valid
  public function skkm_valid()
  {
    $this->db->select('SUM(nilai) as total');
    $this->db->from('skkm');
    $this->db->where('status',1);
    return $result = $this->db->get()->row()->total;
  }

  // menghitung jumlah nilai skkm tidak valid
  public function skkm_tidak_valid()
  {
    $this->db->select('SUM(nilai) as total');
    $this->db->from('skkm');
    $this->db->where('status',0);
    return $result = $this->db->get()->row()->total;
  }

}
