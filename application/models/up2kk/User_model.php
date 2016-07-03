<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();

  }

  public function get_profil($id_user)
  {
    $sql = "SELECT u.id, u.nama_depan, u.nama_belakang, u.nip, u.email, j.id, j.nama_jurusan
            FROM users u
            INNER JOIN jurusan j ON j.id = u.id_jurusan
            WHERE u.id = $id_user";
    return $this->db->query($sql)->row();
  }

  public function get_jurusan()
  {
    $this->db->select('*');
    $this->db->from('jurusan');
    $result = $this->db->get();
    return $result->result_array();
  }

}
