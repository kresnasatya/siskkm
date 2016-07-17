<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Validasi_model extends CI_Model {

  public function __construct()
  {
    parent::__construct();

  }

  public function get_mahasiswa($id_jurusan)
  {
    $this->db->select('u.id, u.nama_depan, u.nama_belakang, u.nim, g.name, j.nama_jurusan, p.nama_prodi, p.jenjang, s.semester, k.kelas');
    $this->db->from('users u');
    $this->db->join('users_groups ug', 'ug.user_id = u.id');
    $this->db->join('groups g', 'g.id = ug.group_id');
    $this->db->join('jurusan j', 'j.id = u.id_jurusan');
    $this->db->join('prodi p', 'p.id = u.id_prodi');
    $this->db->join('semester s', 's.id = u.id_semester');
    $this->db->join('kelas k', 'k.id = u.id_kelas');
    $this->db->where('j.id', $id_jurusan);
    $this->db->where('g.id', 3);
    return $this->db->get()->result();
  }

  public function get_skkm_mahasiswa($id_user)
  {
      $sql = "SELECT id, id_user, nama_kegiatan, filefoto, jenis.jenis, tingkat.tingkat, sebagai.sebagai, nilai, status, keterangan
      FROM skkm
      INNER JOIN jenis ON jenis.id_jenis = skkm.id_jenis
      INNER JOIN tingkat ON  tingkat.id_tingkat = skkm.id_tingkat
      INNER JOIN sebagai ON  sebagai.id_sebagai = skkm.id_sebagai
      WHERE id_user = $id_user
      AND (status = 2 OR  status = 0)";
      return $this->db->query($sql)->result();
  }

  // menghitung total skkm valid
  public function sum_valid($id_user)
  {
    $this->db->select('SUM(nilai) as total');
    $this->db->from('skkm');
    $this->db->where('status', 1);
    $this->db->where('id_user', $id_user);
    return $result = $this->db->get()->row()->total;
  }

  // menghitung total skkm tidak valid
  public function sum_tidak_valid($id_user)
  {
    $this->db->select('SUM(nilai) as total');
    $this->db->from('skkm');
    $this->db->where('status', 2);
    $this->db->where('id_user', $id_user);
    return $result = $this->db->get()->row()->total;
  }

  // menghitung total skkm belum divalidasi
  public function sum_belum_divalidasi($id_user)
  {
    $this->db->select('SUM(nilai) as total');
    $this->db->from('skkm');
    $this->db->where('status', 0);
    $this->db->where('id_user', $id_user);
    return $result = $this->db->get()->row()->total;
  }

  // mengecek status kelulusan skkm
  public function status_skkm($id_user)
  {
    $this->db->select('u.id, p.jenjang, s.standar as total');
    $this->db->from('users u');
    $this->db->join('prodi p', 'u.id_prodi = p.id');
    $this->db->join('standar s', 's.jenjang = p.jenjang');
    $this->db->where('u.id', $id_user);
    return $result = $this->db->get()->row()->total;
  }

  public function get_skkm($id_skkm)
  {
    $this->db->select('id, id_user, status, keterangan');
    $this->db->from('skkm');
    $this->db->where('id', $id_skkm);
    return $this->db->get()->row();
  }

  public function validasi_skkm($id_skkm, $data)
  {
    $this->db->where('id', $id_skkm);
    $this->db->update('skkm', $data);
  }

}
