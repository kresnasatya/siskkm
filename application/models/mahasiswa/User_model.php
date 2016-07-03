<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();

  }

  public function get_profil($id_user)
  {
    $sql = "SELECT u.id, u.nama_depan, u.nama_belakang, u.nim, u.email, j.id, j.nama_jurusan, p.id, p.nama_prodi, s.id, s.semester, k.id, k.kelas
            FROM users u
            INNER JOIN jurusan j ON j.id = u.id_jurusan
            INNER JOIN prodi p ON p.id = u.id_prodi
            INNER JOIN kelas k ON k.id = u.id_kelas
            INNER JOIN semester s ON s.id = u.id_semester
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

  public function get_prodi($id_jurusan)
  {
    if (isset($id_jurusan)) {
      $this->db->where('id_jurusan', $id_jurusan);
    }

    $this->db->select('id, id_jurusan, nama_prodi');
		$this->db->from('prodi');
		$result = $this->db->get();
		return $result->result_array();
  }

  public function get_kelas()
  {
      // ambil data kelas
      $this->db->order_by('kelas','asc');
      $result = $this->db->get('kelas');

      // membuat array
      $dd[''] = 'Silahkan Pilih';
      if ($result->num_rows() > 0) {
        foreach ($result->result() as $row) {
          // menentukan value sebelah kiri dan label sebelah kanan
          $dd[$row->id] = $row->kelas;
        }
      }
      return $dd;
  }

  public function get_semester()
  {
      // ambil data semester
      $this->db->order_by('semester','asc');
      $result = $this->db->get('semester');

      // membuat array
      $dd[''] = 'Silahkan Pilih';
      if ($result->num_rows() > 0) {
        foreach ($result->result() as $row) {
          // menentukan value sebelah kiri dan label sebelah kanan
          $dd[$row->id] = $row->semester;
        }
      }
      return $dd;
  }

}
