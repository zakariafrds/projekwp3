<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Status extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();

        $this->load->model('Admin_model', 'admin');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = "Status";
        $data['status'] = $this->admin->getTanaman();
        $this->template->load('templates/dashboard', 'status/data', $data);
    }

    private function _validasi()
    {
        $this->form_validation->set_rules('status', 'Nama Status', 'required');
        // $this->form_validation->set_rules('jenis_id', 'Jenis Status', 'required');
        // $this->form_validation->set_rules('satuan_id', 'Satuan Status', 'required');
    }

    public function add()
    {
        $this->_validasi();

        if ($this->form_validation->run() == false) {
            $data['title'] = "Status";
            $data['jenis'] = $this->admin->get('jenis');
            $data['satuan'] = $this->admin->get('satuan');

            // Mengenerate ID Status
            $kode_terakhir = $this->admin->getMax('status', 'id_status');
            $kode_tambah = substr($kode_terakhir, -6, 6);
            $kode_tambah++;
            $number = str_pad($kode_tambah, 6, '0', STR_PAD_LEFT);
            $data['id_status'] = 'K' . $number;

            $this->template->load('templates/dashboard', 'status/add', $data);
        } else {
            $input = $this->input->post(null, true);
            $insert = $this->admin->insert('status', $input);

            if ($insert) {
                set_pesan('data berhasil disimpan');
                redirect('status');
            } else {
                set_pesan('gagal menyimpan data');
                redirect('status/add');
            }
        }
    }

    public function edit($getId)
    {
        $id = encode_php_tags($getId);
        $this->_validasi();

        if ($this->form_validation->run() == false) {
            $data['title'] = "Status";
            $data['barang'] = $this->admin->get('barang', ['id_barang' => $id]);
            $data['kondisi'] = $this->db->get_where('tanaman', ['kode_tanaman' => $this->uri->segment('4')])->row_array();
            $this->template->load('templates/dashboard', 'status/edit', $data);
        } else {
            // var_dump($this->input->post());
            // die;
            $input = [
                "kondisi" => $this->input->post('status')
            ];

            // var_dump($input);
            // die;
            $kode_tanaman = $this->input->post('kode_tanaman');
            $this->load->model('Tanaman_model');
            $update = $this->Tanaman_model->update('tanaman', 'kode_tanaman', $kode_tanaman, $input);

            if ($update) {
                set_pesan('data berhasil disimpan');
                redirect('status');
            } else {
                set_pesan('gagal menyimpan data');
                redirect('status/edit/' . $id);
            }
        }
    }

    public function delete($getId)
    {
        $id = encode_php_tags($getId);
        if ($this->admin->delete('status', 'id_status', $id)) {
            set_pesan('data berhasil dihapus.');
        } else {
            set_pesan('data gagal dihapus.', false);
        }
        redirect('status');
    }

    public function getstok($getId)
    {
        $id = encode_php_tags($getId);
        $query = $this->admin->cekStok($id);
        output_json($query);
    }
}