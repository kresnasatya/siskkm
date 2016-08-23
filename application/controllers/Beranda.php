<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Beranda_model', 'beranda');
    }

    public function index()
    {
        $data['pengumuman'] = $this->beranda->pengumuman();
        $this->template->load('templates/beranda_template', 'beranda', $data);
    }

}
