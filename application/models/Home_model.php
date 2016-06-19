<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model {

  public function __construct()
  {
    parent::__construct();
  }

  public function pengumuman()
  {
    $sql = "SELECT pengumuman.id, judul, isi_pengumuman, slug, tanggal, users.nama_depan, users.nama_belakang
            FROM pengumuman
            INNER JOIN users ON users.id=pengumuman.id_user";
    return $this->db->query($sql)->result();
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

  public function single($id)
  {
    $sql = "SELECT
              pengumuman.id, judul, isi_pengumuman, tanggal, slug, users.nama_depan, users.nama_belakang
            FROM
              pengumuman, users
            WHERE
              pengumuman.id = '$id'
            AND
              pengumuman.id_user=users.id";
    return $this->db->query($sql)->result();
  }
  
}
