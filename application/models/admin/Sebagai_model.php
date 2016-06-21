<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sebagai_model extends CI_Model {

  public function __construct()
  {
    parent::__construct();

  }

  public function get_all()
  {
    $sql = 'SELECT id_sebagai, tingkat.tingkat, sebagai, bobot FROM sebagai
            INNER JOIN tingkat ON tingkat.id_tingkat = sebagai.id_tingkat_fk';
    return $this->db->query($sql)->result();
  }

  public function get_by_id($id)
  {
    $this->db->where('id_sebagai', $id);
    return $this->db->get('sebagai')->row();
  }

  // mendapatkan data tingkat
  function get_tingkat()
  {
    // ambil data tingkat
    $this->db->order_by('tingkat','ASC');
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

  public function insert($data)
  {
    $this->db->insert('sebagai', $data);
  }

  public function update($id, $data)
  {
    $this->db->where('id_sebagai', $id);
    $this->db->update('sebagai', $data);
  }

  public function delete($id)
  {
    $this->db->where('id_sebagai', $id);
    $this->db->delete('sebagai');
  }

}
