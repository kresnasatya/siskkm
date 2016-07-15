<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda_model extends CI_Model {

  public function __construct()
  {
    parent::__construct();
  }

  public function pengumuman()
  {
    $this->db->select('pengumuman.id, judul, isi_pengumuman, slug, tanggal, users.nama_depan, users.nama_belakang');
    $this->db->join('users', 'users.id = pengumuman.id_user');
    return $this->db->get('pengumuman')->result();
  }

  public function pengumuman_paging($limit)
  {
    $sql = "SELECT pengumuman.id, judul, isi_pengumuman, slug, tanggal, users.nama_depan, users.nama_belakang
            FROM pengumuman
            INNER JOIN users ON users.id=pengumuman.id_user
            limit $limit[perpage]
            offset $limit[offset]";
    return $this->db->query($sql)->result();
  }

  public function single($slug)
  {
    $this->db->select('pengumuman.id, judul, isi_pengumuman, tanggal, slug, users.nama_depan, users.nama_belakang');
    $this->db->join('users', 'pengumuman.id_user = users.id');
    $this->db->where('slug', $slug);
    return $this->db->get('pengumuman')->result();
  }

}
