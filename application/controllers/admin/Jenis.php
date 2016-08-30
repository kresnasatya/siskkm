<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenis extends Admin_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/Jenis_model', 'jenis');
        $this->load->library('form_validation');
    }

    function index()
    {
        $current_user = $this->ion_auth->user()->row();
        $data = array(
            'current_user' => $current_user,
            'jenis' => $this->jenis->get_all(),
            'gravatar_url' => $this->gravatar->get($current_user->email)
        );
        $this->template->load('templates/admin/jenis_template', 'admin/jenis/list', $data);
    }

    public function tambah()
    {
        $this->rules();
        $current_user = $this->ion_auth->user()->row();
        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'current_user' => $current_user,
                'gravatar_url' => $this->gravatar->get($current_user->email)
            );
            $this->template->load('templates/admin/jenis_template', 'admin/jenis/add', $data);
        } else {
            $jenis = $this->input->post('jenis');
            $data['jenis'] = $jenis;
            $this->jenis->insert($data);
            $this->session->set_flashdata('message', "<div style='color:#00a65a;'>Jenis berhasil ditambah.</div>");
            redirect(site_url('admin/jenis'));
        }
    }

    public function ubah($id)
    {
        $this->rules();
        $current_user = $this->ion_auth->user()->row();
        $row = $this->jenis->get_by_id($id);
        if ($this->form_validation->run() == FALSE) {
            if ($row) {
                $data = array(
                    'id_jenis' => $row->id_jenis,
                    'jenis' => $row->jenis,
                    'current_user' => $current_user,
                    'gravatar_url' => $this->gravatar->get($current_user->email)
                );
                $this->template->load('templates/admin/jenis_template', 'admin/jenis/edit', $data);
            } else {
                $this->session->set_flashdata('message', "<div style='color:#dd4b39;'>Data tidak ditemukan.</div>");
                redirect(site_url('admin/jenis'));
            }
        } else {
            $id = $this->input->post('id_jenis');
            $jenis = $this->input->post('jenis');
            $data = array('jenis' => $jenis);
            $this->jenis->update($id, $data);
            $this->session->set_flashdata('message', "<div style='color:#00a65a;'>Jenis berhasil diubah.</div>");
            redirect(site_url('admin/jenis'));
        }
    }

    public function hapus($id)
    {
        $row = $this->jenis->get_by_id($id);

        if ($row) {
            $this->jenis->delete($id);
            $this->session->set_flashdata('message', "<div style='color:#00a65a;'>Jenis berhasil dihapus.</div>");
            redirect(site_url('admin/jenis'));
        } else {
            $this->session->set_flashdata('message', "<div style='color:#dd4b39;'>Data tidak ditemukan.</div>");
            redirect(site_url('admin/jenis'));
        }
    }

    public function rules()
    {
        $this->form_validation->set_rules('jenis', 'Jenis', 'trim|required');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}
