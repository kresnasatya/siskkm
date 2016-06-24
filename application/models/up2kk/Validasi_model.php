<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Validasi_model extends CI_Model {

  public function __construct()
  {
    parent::__construct();

  }

  public function get_mahasiswa($id_jurusan)
  {
    $sql = "SELECT u.id, u.nama_depan, u.nama_belakang, u.nim, g.name, j.nama_jurusan, p.nama_prodi, p.jenjang
            FROM users u
            INNER JOIN users_groups ug ON ug.user_id = u.id
            INNER JOIN groups g ON g.id = ug.group_id
            INNER JOIN jurusan j ON j.id = u.id_jurusan
            INNER JOIN prodi p ON p.id = u.id_prodi
            WHERE j.id = $id_jurusan AND g.id = 3";
    return $this->db->query($sql)->result();
  }

  public function get_skkm_mahasiswa($id_user)
  {
    $sql = "SELECT id, id_user, nama_kegiatan, filefoto, jenis.jenis, tingkat.tingkat, sebagai.sebagai, nilai, status, keterangan
            FROM skkm
            INNER JOIN jenis ON jenis.id_jenis = skkm.id_jenis
            INNER JOIN tingkat ON tingkat.id_tingkat = skkm.id_tingkat
            INNER JOIN sebagai ON sebagai.id_sebagai = skkm.id_sebagai
            WHERE id_user = $id_user";
    return $this->db->query($sql)->result();
  }

  public function get_skkm($id_skkm)
  {
    $sql = "SELECT id, id_user, status, keterangan FROM skkm
            WHERE id = $id_skkm";
    return $this->db->query($sql)->row();
  }

  public function validasi_skkm($id_skkm, $data)
  {
    $this->db->where('id', $id_skkm);
    $this->db->update('skkm', $data);
  }

}
