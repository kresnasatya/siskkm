<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Skkm_model extends CI_Model {

  public function __construct()
  {
    parent::__construct();
  }

  public function get_all()
  {
    $sql =   "SELECT id, nama_kegiatan, filefoto, jenis.jenis, tingkat.tingkat, sebagai.sebagai, nilai, status, keterangan FROM skkm
              INNER JOIN jenis ON jenis.id_jenis = skkm.id_jenis
              INNER JOIN tingkat ON tingkat.id_tingkat = skkm.id_tingkat
              INNER JOIN sebagai ON sebagai.id_sebagai = skkm.id_sebagai";
    return $this->db->query($sql)->result();
  }

  public function get_by_id($id)
  {
    $this->db->where('id', $id);
    return $this->db->get('skkm')->row();
  }

  // mengambil data jenis
  public function get_jenis()
  {
    // ambil data jenis
    // $this->db->order_by('jenis','ASC');
    $result = $this->db->get('jenis');

    // membuat array
    $dd[''] = 'Silahkan Pilih';
    if ($result->num_rows() > 0) {
      foreach ($result->result() as $row) {
        // value di sebelah kiri dan label di sebelah kanan
        $dd[$row->id_jenis] = $row->jenis;
      }
    }
    return $dd;
  }

  // mengambil data tingkat
  public function get_tingkat()
  {
    // ambil data tingkat
    // $this->db->order_by('tingkat','ASC');
    $result = $this->db->get('tingkat');

    // membuat array
    $dd[''] = 'Silahkan Pilih';
    if ($result->num_rows() > 0) {
      foreach ($result->result() as $row) {
        // value di sebelah kiri dan label di sebelah kanan
        $dd[$row->id_tingkat] = $row->tingkat;
      }
    }
    return $dd;
  }

  // mengambil data sebagai
  public function get_sebagai()
  {
    // ambil data sebagai
    // $this->db->order_by('sebagai','ASC');
    $result = $this->db->get('sebagai');

    // membuat array
    $dd[''] = 'Silahkan Pilih';
    if ($result->num_rows() > 0) {
      foreach ($result->result() as $row) {
        // value di sebelah kiri dan label di sebelah kanan
        $dd[$row->id_sebagai] = $row->sebagai;
      }
    }
    return $dd;
  }

  // menghitung skkm valid
  public function count_valid()
  {
    $this->db->select('SUM(nilai) as total');
    $this->db->from('skkm');
    $this->db->where('status',1);
    return $result = $this->db->get()->row()->total;
  }

  // menghitung skkm tidak valid
  public function count_tidak_valid()
  {
    $this->db->select('SUM(nilai) as total');
    $this->db->from('skkm');
    $this->db->where('status',0);
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
