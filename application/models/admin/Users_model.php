<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Users_model extends CI_Model {

  public function __construct()
  {
        parent::__construct();
  }

  // fungsi menampilkan semua jurusan
  public function get_jurusan()
  {
    // ambil data jurusan
    $result = $this->db->get('jurusan');

    // membuat array
    $dd[''] = 'Silahkan Pilih';
    if ($result->num_rows() > 0) {
      foreach ($result->result() as $row) {
        // menentukan value sebelah kiri dan label sebelah kanan
        $dd[$row->id] = $row->nama_jurusan;
      }
    }
    return $dd;
  }

  // fungsi menampilkan prodi
  public function get_prodi()
  {
    // ambil data prodi
    $this->db->select('id, id_jurusan, nama_prodi');
    $result = $this->db->get('prodi');

    // membuat array
    $dd[''] = 'Silahkan Pilih';
    if ($result->num_rows() > 0) {
      foreach ($result->result() as $row) {
        // menentukan value sebelah kiri dan label sebelah kanan
        $dd[$row->id] = $row->nama_prodi;
      }
    }
    return $dd;
  }

  // fungsi menampilkan kelas
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
