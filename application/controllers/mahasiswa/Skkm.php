<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Skkm extends Mahasiswa_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mahasiswa/Skkm_model', 'skkm');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $current_user = $this->ion_auth->user()->row();
        $data = array(
            'current_user' => $current_user,
            'gravatar_url' => $this->gravatar->get($current_user->email),
            'list_skkm' => $this->skkm->get_all($current_user->id),
            'sum_valid' => $this->skkm->sum_valid($current_user->id),
            'sum_belum_divalidasi' => $this->skkm->sum_belum_divalidasi($current_user->id),
            'sum_tidak_valid' => $this->skkm->sum_tidak_valid($current_user->id),
            'status_skkm' => $this->skkm->status_skkm($current_user->id)
        );
        $this->template->load('templates/mahasiswa/skkm_template', 'mahasiswa/skkm/list', $data);
    }

    public function list_skkm_valid()
    {
        $current_user = $this->ion_auth->user()->row();
        $data = array(
            'current_user' => $current_user,
            'gravatar_url' => $this->gravatar->get($current_user->email),
            'list_skkm_valid' => $this->skkm->get_skkm_valid($current_user->id),
            'sum_valid' => $this->skkm->sum_valid($current_user->id),
            'sum_belum_divalidasi' => $this->skkm->sum_belum_divalidasi($current_user->id),
            'sum_tidak_valid' => $this->skkm->sum_tidak_valid($current_user->id),
            'status_skkm' => $this->skkm->status_skkm($current_user->id)
        );
        $this->template->load('templates/mahasiswa/skkm_template', 'mahasiswa/skkm/list_valid', $data);
    }

    public function list_skkm_tidak_valid()
    {
        $current_user = $this->ion_auth->user()->row();
        $data = array(
            'current_user' => $current_user,
            'gravatar_url' => $this->gravatar->get($current_user->email),
            'list_skkm_tidak_valid' => $this->skkm->get_skkm_tidak_valid($current_user->id),
            'sum_valid' => $this->skkm->sum_valid($current_user->id),
            'sum_belum_divalidasi' => $this->skkm->sum_belum_divalidasi($current_user->id),
            'sum_tidak_valid' => $this->skkm->sum_tidak_valid($current_user->id),
            'status_skkm' => $this->skkm->status_skkm($current_user->id)
        );
        $this->template->load('templates/mahasiswa/skkm_template', 'mahasiswa/skkm/list_tidak_valid', $data);
    }

    public function list_skkm_belum_valid()
    {
        $current_user = $this->ion_auth->user()->row();
        $data = array(
            'current_user' => $current_user,
            'gravatar_url' => $this->gravatar->get($current_user->email),
            'list_skkm_belum_valid' => $this->skkm->get_skkm_belum_valid($current_user->id),
            'sum_valid' => $this->skkm->sum_valid($current_user->id),
            'sum_belum_divalidasi' => $this->skkm->sum_belum_divalidasi($current_user->id),
            'sum_tidak_valid' => $this->skkm->sum_tidak_valid($current_user->id),
            'status_skkm' => $this->skkm->status_skkm($current_user->id)
        );
        $this->template->load('templates/mahasiswa/skkm_template', 'mahasiswa/skkm/list_belum_valid', $data);
    }

    public function get_tingkat()
    {
        $id_jenis = $this->input->post('value');
        $tingkat = $this->skkm->get_tingkat($id_jenis);

        echo '<select name="">';
        echo '<option value="">Pilih Tingkat</option>';
        foreach ($tingkat as $row) {
            echo '<option value="' . $row->id_tingkat . '">' . $row->tingkat . '</option>';
        }
        echo '</select>';
    }

    public function get_prestasi()
    {
        $id_tingkat = $this->input->post('value');
        $prestasi = $this->skkm->get_prestasi($id_tingkat);

        echo '<select name="">';
        echo '<option value="">Pilih Prestasi</option>';
        foreach ($prestasi as $row) {
            echo '<option value="' . $row->id_prestasi . '">' . $row->prestasi . '</option>';
        }
        echo '</select>';
    }

    public function get_nilai()
    {
        $id_prestasi = $this->input->post('value');
        $nilai = $this->skkm->get_nilai($id_prestasi);

        $data = array();
        foreach ($nilai as $row) {
            $data['value'] = $row->bobot;
        }
        echo $data['value'];
    }

    public function tambah()
    {
        $this->rules();
        $current_user = $this->ion_auth->user()->row();
        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'current_user' => $current_user,
                'gravatar_url' => $this->gravatar->get($current_user->email),
                'dd_jenis' => $this->skkm->get_jenis(),
                'jenis_selected' => $this->input->post('id_jenis') ? $this->input->post('id_jenis') : '',
                'tingkat_selected' => $this->input->post('id_tingkat') ? $this->input->post('id_tingkat') : '',
                'prestasi_selected' => $this->input->post('id_prestasi') ? $this->input->post('id_prestasi') : ''
            );
            $this->template->load('templates/mahasiswa/skkm_template', 'mahasiswa/skkm/add', $data);
        } else {
            $config = array(
                'upload_path' => './fileskkm/',
                'allowed_types' => 'jpeg|jpg|png',
                'max_size' => '5120',
                'max_width' => '5000',
                'max_height' => '5000'
            );
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('filefoto')) {
                $this->session->set_flashdata('message', "<div style='color:#ff0000;'>" . $this->upload->display_errors() . "</div>");
                redirect(site_url('mahasiswa/skkm/tambah'));
            } else {
                $file = $this->upload->data();
                $data = array(
                    'id_user' => $current_user->id,
                    'nama_kegiatan' => $this->input->post('nama_kegiatan'),
                    'filefoto' => $file['file_name'],
                    'id_jenis' => $this->input->post('id_jenis'),
                    'id_tingkat' => $this->input->post('id_tingkat'),
                    'id_prestasi' => $this->input->post('id_prestasi'),
                    'nilai' => $this->input->post('nilai'),
                    'status' => $this->input->post('status') ? $this->input->post('status') : 0,
                    'keterangan' => $this->input->post('keterangan') ? $this->input->post('keterangan') : '-'
                );

                $this->skkm->insert($data);

                // resize file
                $resize = array(
                    'image_library' => 'gd2',
                    'source_image' => $this->upload->upload_path . $this->upload->file_name,
                    'new_image' => './fileskkm/resize',
                    'maintain_ratio' => TRUE,
                    'width' => 100,
                    'height' => 100
                );
                $this->load->library('image_lib', $resize);

                if (!$this->image_lib->resize()) {
                    $this->session->set_flashdata('errors', $this->image_lib->display_errors('', ''));
                }
                $this->session->set_flashdata('message', "<div style='color:#00a65a;'>SKKM berhasil ditambah.</div>");
                redirect(site_url('mahasiswa/skkm'));
            }
        }
    }

    public function rules()
    {
        $this->form_validation->set_rules('nama_kegiatan', 'Nama Kegiatan', 'trim|required');
        $this->form_validation->set_rules('id_jenis', 'Jenis', 'trim|required');
        $this->form_validation->set_rules('id_tingkat', 'Tingkat', 'trim|required');
        $this->form_validation->set_rules('id_prestasi', 'Prestasi', 'trim|required');
        $this->form_validation->set_rules('nilai', 'Nilai', 'trim|required|numeric');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function ubah($id)
    {
        $this->rules();
        $current_user = $this->ion_auth->user()->row();
        $row = $this->skkm->get_by_id($id);
        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'current_user' => $current_user,
                'gravatar_url' => $this->gravatar->get($current_user->email),
                'id' => $row->id,
                'nama_kegiatan' => $row->nama_kegiatan,
                'filefoto' => $row->filefoto,
                'id_jenis' => $row->id_jenis,
                'dd_jenis' => $this->skkm->get_jenis(),
                'id_tingkat' => $row->id_tingkat,
                'dd_tingkat' => $this->skkm->get_tingkat($row->id_jenis),
                'id_prestasi' => $row->id_prestasi,
                'dd_prestasi' => $this->skkm->get_prestasi($row->id_tingkat),
                'nilai' => $row->nilai
            );
            $this->template->load('templates/mahasiswa/skkm_template', 'mahasiswa/skkm/edit', $data);
        } else {
            if ($_FILES AND $_FILES['filefoto']['name']) {
                // Start uploading file
                $config = array(
                    'upload_path' => './fileskkm/',
                    'allowed_types' => 'jpeg|jpg|png',
                    'max_size' => '5120',
                    'max_width' => '5000',
                    'max_height' => '5000'
                );
                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('filefoto')) {
                    $this->session->set_flashdata('message', "<div style='color:#ff0000;'>" . $this->upload->display_errors() . "</div>");
                    redirect(site_url('mahasiswa/skkm/ubah/' . $row->id));
                } else {
                    // Uploaded file here
                    $file = $this->upload->data();
                    $id = $this->input->post('id');
                    $data = array(
                        'id_user' => $current_user->id,
                        'nama_kegiatan' => $this->input->post('nama_kegiatan'),
                        'filefoto' => $file['file_name'],
                        'id_jenis' => $this->input->post('id_jenis'),
                        'id_tingkat' => $this->input->post('id_tingkat'),
                        'id_prestasi' => $this->input->post('id_prestasi'),
                        'nilai' => $this->input->post('nilai'),
                        'status' => $this->input->post('status') ? $this->input->post('status') : 0,
                        'keterangan' => $this->input->post('keterangan') ? $this->input->post('keterangan') : '-'
                    );

                    $this->skkm->update($id, $data);

                    // resize file
                    $resize = array(
                        'image_library' => 'gd2',
                        'source_image' => $this->upload->upload_path . $this->upload->file_name,
                        'new_image' => './fileskkm/resize',
                        'maintain_ratio' => TRUE,
                        'width' => 100,
                        'height' => 100
                    );
                    $this->load->library('image_lib', $resize);

                    if (!$this->image_lib->resize()) {
                        $this->session->set_flashdata('errors', $this->image_lib->display_errors('', ''));
                    }
                    $this->session->set_flashdata('message', "<div style='color:#00a65a;'>SKKM berhasil diubah.</div>");
                    redirect(site_url('mahasiswa/skkm'));
                }
            } else {
                // No file uploaded
                $id = $this->input->post('id');
                $data = array(
                    'id_user' => $current_user->id,
                    'nama_kegiatan' => $this->input->post('nama_kegiatan'),
                    'id_jenis' => $this->input->post('id_jenis'),
                    'id_tingkat' => $this->input->post('id_tingkat'),
                    'id_prestasi' => $this->input->post('id_prestasi'),
                    'nilai' => $this->input->post('nilai'),
                    'status' => $this->input->post('status') ? $this->input->post('status') : 0,
                    'keterangan' => $this->input->post('keterangan') ? $this->input->post('keterangan') : '-'
                );
                $this->skkm->update($id, $data);

                $this->session->set_flashdata('message', "<div style='color:#00a65a;'>SKKM berhasil diubah.</div>");
                redirect(site_url('mahasiswa/skkm'));
            }
        }
    }

    public function hapus($id)
    {
        $row = $this->skkm->get_by_id($id);

        if ($row) {
            $this->skkm->delete($id);
            $this->session->set_flashdata('message', "<div style='color:#00a65a;'>SKKM berhasil dihapus.</div>");
            redirect(site_url('mahasiswa/skkm'));
        } else {
            $this->session->set_flashdata('message', "<div style='color:#dd4b39;'>Data tidak ditemukan.</div>");
            redirect(site_url('mahasiswa/skkm'));
        }
    }

    public function cetak_laporan()
    {
        $current_user = $this->ion_auth->user()->row();
        $result = array(
            'profil' => $this->skkm->get_profil($current_user->id),
            'skkm' => $this->skkm->get_all($current_user->id),
            'sum_valid' => $this->skkm->sum_valid($current_user->id),
            'sum_belum_divalidasi' => $this->skkm->sum_belum_divalidasi($current_user->id),
            'sum_tidak_valid' => $this->skkm->sum_tidak_valid($current_user->id)
        );
        $this->load->view('mahasiswa/skkm/laporan', $result);
    }

}
