<?php
class Sirkulasi extends CI_Controller{

    
  function __construct(){

    parent::__construct();
    $this->load->model('bibliografi_model');
    $this->load->model('koleksi_model');
    $this->load->model('anggota_model');
    $this->load->model('transaksi_model');

  }

  function index(){

    $this->load->view('admin/sirkulasi_view');
  }

  function details(){

    $id_bibliografi = $this->uri->segment(3);
    $data['biblioDetail'] = $this->bibliografi_model->getBiblioDetail($id_bibliografi);

    $data['countBiblioinKoleksi'] =  $this->koleksi_model->Count_BiblioinKoleksi($data['biblioDetail']->call_number);

    $this->load->view('user/bibliografi_detail_view', $data);

  }

  function cariAnggota(){

    $id_anggota = $this->input->post('id_anggota');

    $data['anggota'] = $this->anggota_model->getAnggotabyID($id_anggota);

    if($data['anggota'] != false){
        $data['ada'] = 1;
        $this->load->view('admin/sirkulasi_view', $data);
    }else{
        $data['ada'] = 0;
        $this->load->view('admin/sirkulasi_view', $data);
    }

  }

  
  function cariKoleksi(){

    $id_anggota = $this->input->post('id_anggota');

    $data['anggota'] = $this->anggota_model->getAnggotabyID($id_anggota);

    $kode_koleksi = $this->input->post('kode_koleksi');

    $data['koleksi'] = $this->koleksi_model->getKoleksiByKode($kode_koleksi);


    if($data['koleksi'] != false){
        $data['ada'] = 1;

        $data['biblioDetail_CallNumber'] = $this->bibliografi_model->getBiblioDetail_ByCallNumber($data['koleksi']->call_number);

        $this->load->view('admin/sirkulasi_peminjaman', $data);
    }else{
        $data['ada'] = 0;
        $this->load->view('admin/sirkulasi_peminjaman', $data);
    }

  }

  function peminjaman(){

    $id_anggota = $this->uri->segment(3);

    $data['anggota'] = $this->anggota_model->getAnggotabyID($id_anggota);

    $this->load->view('admin/sirkulasi_peminjaman', $data);
  }

  function peminjamanSekarang(){

    $id_anggota = $this->uri->segment(3);

    $data['anggota'] = $this->anggota_model->getAnggotabyID($id_anggota);

    $data['transaksi'] = $this->transaksi_model->getTransaksiAnggota($id_anggota, 1);
    
    if($data['transaksi'] != false){
        $data['ada'] = 1;
    }else{
        $data['ada'] = 0;
    }

    $this->load->view('admin/peminjaman_sekarang', $data);
  }


  function peminjamanHistory(){

    $id_anggota = $this->uri->segment(3);

    // $data['transaksi'] = $this->transaksi_model->getTransaksiAnggota2($id_anggota, 0);
    // print_r($data);
    // exit();

    $data['anggota'] = $this->anggota_model->getAnggotabyID($id_anggota);
    $data['transaksi'] = $this->transaksi_model->getTransaksiAnggota($id_anggota, 0);
    

    if($data['transaksi'] != false){
        $data['ada'] = 1;
    }else{
        $data['ada'] = 0;
    }

    $this->load->view('admin/peminjaman_history', $data);


  }



  function addTransaksi(){

    $id_anggota = $this->input->post('id_anggota');
    $kode_koleksi = $this->input->post('kode_koleksi');
    $data['ada'] = 0;

    $data['anggota'] = $this->anggota_model->getAnggotabyID($id_anggota);

    $this->transaksi_model->addTransaksi($id_anggota, $kode_koleksi);

    $dataUpdate = array(
        'status' => 1
    );

    $this->koleksi_model->updateStatus($kode_koleksi, $dataUpdate);

    $this->load->view('admin/sirkulasi_peminjaman', $data);


  }

  
  function kembalikanTransaksi(){

    $id_anggota = $this->input->post('id_anggota');
    $id_transaksi = $this->input->post('id_transaksi');
    $kode_koleksi = $this->input->post('kode_koleksi');
 
    $data['anggota'] = $this->anggota_model->getAnggotabyID($id_anggota);

    $this->transaksi_model->updateTransaksi($id_transaksi);

    $dataUpdate = array(
        'status' => 0
    );

    $this->koleksi_model->updateStatus($kode_koleksi, $dataUpdate);

    $data['transaksi'] = $this->transaksi_model->getTransaksiAnggota($id_anggota, 1);

    if($data['transaksi'] != false){
        $data['ada'] = 1;
    }else{
        $data['ada'] = 0;
    }
    $this->load->view('admin/peminjaman_sekarang', $data);


  }
}