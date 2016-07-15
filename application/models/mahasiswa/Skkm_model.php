<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Skkm_model extends CI_Model {

  public function __construct()
  {
    parent::__construct();
  }

  public function get_all($id_user)
  {
    $this->db->select('id, id_user, nama_kegiatan, filefoto, j.jenis, t.tingkat, s.sebagai, nilai, status, keterangan');
    $this->db->from('skkm');
    $this->db->join('jenis j', 'j.id_jenis = skkm.id_jenis');
    $this->db->join('tingkat t', 't.id_tingkat = skkm.id_tingkat');
    $this->db->join('sebagai s', 's.id_sebagai = skkm.id_sebagai');
    $this->db->where('id_user', $id_user);
    $this->db->order_by('id', 'DESC');
    return $query = $this->db->get()->result();
  }

  public function get_by_id($id)
  {
    $this->db->where('id', $id);
    return $this->db->get('skkm')->row();
  }

  public function get_jenis()
  {
    $this->db->select('*');
    $this->db->from('jenis');
    $result = $this->db->get();
    return $result->result();
  }

  public function get_tingkat($id_jenis)
  {
    if (isset($id_jenis)) {
      $this->db->where('id_jenis_fk', $id_jenis);
    }

    $this->db->select('*');
	$this->db->from('tingkat');
	$result = $this->db->get();
	return $result->result();
  }

  public function get_sebagai($id_tingkat)
  {
    if (isset($id_tingkat)) {
      $this->db->where('id_tingkat_fk', $id_tingkat);
    }

    $this->db->select('id_sebagai, sebagai');
	$this->db->from('sebagai');
	$result = $this->db->get();
	return $result->result();
  }

  public function get_nilai($id_sebagai)
  {
    if (isset($id_sebagai)) {
      $this->db->where('id_sebagai', $id_sebagai);
    }

    $this->db->select('id_sebagai, bobot');
    $this->db->from('sebagai');
	$result = $this->db->get();
	return $result->result();
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

  // mengetahui status kelulusan skkm
  public function status_skkm($id_user)
  {
    $this->db->select('u.id, p.jenjang, s.standar as total');
    $this->db->from('users u');
    $this->db->join('prodi p', 'u.id_prodi = p.id');
    $this->db->join('standar s', 's.jenjang = p.jenjang');
    $this->db->where('u.id', $id_user);
    return $result = $this->db->get()->row()->total;
  }

  public function insert($data)
  {
    $this->db->insert('skkm', $data);
  }

  public function update($id, $data)
  {
    $this->db->where('id', $id);
    $this->db->update('skkm', $data);
  }

  public function delete($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('skkm');
  }

}
