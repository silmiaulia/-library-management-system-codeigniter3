<?php
class Anggota extends CI_Controller{

    function __construct(){
        parent::__construct();
        $this->load->model('koleksi_model');
        $this->load->model('bibliografi_model');
        $this->load->model('anggota_model');
    }

    function index(){ //tampilkan tabel anggota

        $data['anggota'] = $this->anggota_model->getAnggota();

        $this->load->view('admin/anggota_view', $data);

    }


    function form(){ //tampilkan form untuk menambahkan anggota baru

        $this->load->view('admin/form_add_anggota');

    }
    


    function formUpdate(){ //tampilkan form untuk mengupdate data anggota

        $id_anggota = $this->uri->segment(3);
        $data['anggota'] = $this->anggota_model->getAnggotabyID($id_anggota);

        $this->load->view('admin/form_update_anggota', $data);
    }


    function add(){ //untuk proses submit add anggota

        if ($this->input->method() === 'post') {

        //semua data post disimpan dalam array
        $dataAdd = array(
            'nama_anggota' => $this->input->post('nama_anggota'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'alamat' => $this->input->post('alamat'),
            'no_telepon' => $this->input->post('no_telepon'),
            'email' => $this->input->post('email')
        );

            $this->anggota_model->addAnggota($dataAdd); 

        }

        $this->index(); //kembali tampilkan tabel anggota

    }

    function update(){

        if ($this->input->method() === 'post') {

            $id_anggota = $this->input->post('id_anggota');

            $dataUpdate = array(
                'nama_anggota' => $this->input->post('nama_anggota'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'alamat' => $this->input->post('alamat'),
                'no_telepon' => $this->input->post('no_telepon'),
                'email' => $this->input->post('email')
            );

            $this->anggota_model->updateAnggota($id_anggota, $dataUpdate);

        }

        $this->index();


    }

    function delete(){

        $id_anggota = $this->uri->segment(3);

        $this->anggota_model->delete($id_anggota);

        $this->index();
        
    }


}