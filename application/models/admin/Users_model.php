<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Users_model extends CI_Model {

  public function __construct()
  {
        parent::__construct();
  }

  public function get_users()
  {
      $sql = "SELECT u.id, u.nama_depan, u.nama_belakang, u.email, u.last_login, u.nim, u.nip, g.name, j.nama_jurusan, p.nama_prodi
              FROM users u 
              INNER JOIN users_groups ug ON ug.user_id = u.id
              INNER JOIN groups g ON g.id = ug.group_id
              LEFT OUTER JOIN jurusan j ON j.id = u.id_jurusan
              LEFT OUTER JOIN prodi p ON p.id = u.id_prodi";
    return $this->db->query($sql)->result();
  }

  public function get_jurusan()
  {
    $this->db->select('*');
    $this->db->from('jurusan');
    $result = $this->db->get();
    return $result->result();
  }

  // menampilkan prodi berdasarkan jurusan
  public function get_prodi($id_jurusan)
  {
    if (isset($id_jurusan)) {
      $this->db->where('id_jurusan', $id_jurusan);
    }

    $this->db->select('id, id_jurusan, nama_prodi');
		$this->db->from('prodi');
		$result = $this->db->get();
		return $result->result();
  }

  // menampilkan kelas
  public function get_kelas()
  {
      $this->db->order_by('kelas','asc');
      $result = $this->db->get('kelas');

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
      $this->db->order_by('semester','asc');
      $result = $this->db->get('semester');

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
