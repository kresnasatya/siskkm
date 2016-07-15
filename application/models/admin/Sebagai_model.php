<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sebagai_model extends CI_Model {

  public function __construct()
  {
    parent::__construct();

  }

  public function get_all()
  {
    $this->db->select('id_sebagai, tingkat.tingkat, sebagai, bobot');
    $this->db->join('tingkat', 'tingkat.id_tingkat = sebagai.id_tingkat_fk');
    $this->db->order_by('id_sebagai', 'DESC');
    return $this->db->get('sebagai')->result();
  }

  public function get_by_id($id)
  {
    $this->db->where('id_sebagai', $id);
    return $this->db->get('sebagai')->row();
  }

  function get_tingkat()
  {
    $result = $this->db->get('tingkat');

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
