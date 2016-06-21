<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tingkat_model extends CI_Model {

  public function __construct()
  {
    parent::__construct();

  }

  public function get_all()
  {
    $sql = 'SELECT id_tingkat, jenis.jenis, tingkat FROM tingkat
              INNER JOIN jenis ON jenis.id_jenis = tingkat.id_jenis_fk';
    return $this->db->query($sql)->result();
  }

  public function get_by_id($id)
  {
    $this->db->where('id_tingkat', $id);
    return $this->db->get('tingkat')->row();
  }

  // mendapatkan data jenis
  function get_jenis()
  {
    // ambil data jenis
    $this->db->order_by('jenis','ASC');
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

  public function insert($data)
  {
    $this->db->insert('tingkat', $data);
  }

  public function update($id, $data)
  {
    $this->db->where('id_tingkat', $id);
    $this->db->update('tingkat', $data);
  }

  public function delete($id)
  {
    $this->db->where('id_tingkat', $id);
    $this->db->delete('tingkat');
  }

}
