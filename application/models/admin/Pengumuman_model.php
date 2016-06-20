<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengumuman_model extends CI_Model {

  public function __construct()
  {
    parent::__construct();
  }

  public function get_all()
  {
    $sql = "SELECT pengumuman.id, judul, isi_pengumuman, tanggal, users.nama_depan, users.nama_belakang
            FROM pengumuman
            INNER JOIN users ON users.id=pengumuman.id_user";
    return $this->db->query($sql)->result();
  }

  public function get_by_id($id)
  {
    $this->db->where('id', $id);
    return $this->db->get('pengumuman')->row();
  }

  // insert pengumuman
  public function insert($data)
  {
    $this->db->insert('pengumuman', $data);
  }

  // update pengumuman
  public function update($id, $data)
  {
    $this->db->where('id', $id);
    $this->db->update('pengumuman', $data);
  }

  // hapus pengumuman
  public function delete($id){
    $this->db->where('id', $id);
    $this->db->delete('pengumuman');
  }

}
