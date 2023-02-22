<?php
class Koleksi extends CI_Controller{
  function __construct(){
    parent::__construct();
    $this->load->model('koleksi_model');
    $this->load->model('bibliografi_model');
  }
  function index(){
    
    $call_number = $this->uri->segment(3);
    $data['koleksi'] = $this->koleksi_model->getKoleksi($call_number);


    $data['call_number'] = $call_number;

    if($data['koleksi'] != false){
      $data['ada'] = 1;
    }else{
      $data['ada'] = 0;
    }

    $this->load->view('admin/koleksi_view', $data);
    
  }


  function form(){

    $data['call_number'] = $this->uri->segment(3);
    $this->load->view('admin/form_add_koleksi', $data);
  
  }

  function formUpdate(){

    $id_koleksi = $this->uri->segment(3);
    $data['koleksi'] = $this->koleksi_model->getKoleksiByID($id_koleksi);

    $this->load->view('admin/form_update_koleksi', $data);

  }

  function getJudul(){

    $call_number = $this->uri->segment(3);
    $data['bibi'] = $this->koleksi_model->getBiblio($call_number);
    $this->load->view('koleksi_view',$data);

  }


  function add(){

    if ($this->input->method() === 'post') {

      $call_number = $this->input->post('call_number');


      $dataAdd = array(
        'kode_koleksi' => $this->input->post('kode_koleksi'),
        'call_number' => $this->input->post('call_number'),
        'nomor_register' => $this->input->post('nomor_register'),
        'status' => 0,
        'id_rak' => $this->input->post('id_rak')
      );

        $this->koleksi_model->addKoleksi($dataAdd);
        $data['biblio'] = $this->bibliografi_model->getBiblioDetail_ByCallNumber($call_number);
        $this->bibliografi_model->updateJumlahStok($call_number, $data['biblio']->jumlah_stok + 1);

    }

    
    $data['koleksi'] = $this->koleksi_model->getKoleksi($call_number);
    
    $data['call_number'] = $call_number;

    if($data['koleksi'] != false){
      $data['ada'] = 1;
    }else{
      $data['ada'] = 0;
    }

    $this->load->view('admin/koleksi_view', $data);

  }

  function update(){


    if ($this->input->method() === 'post') {

        $call_number = $this->input->post('call_number');

        $id_koleksi = $this->input->post('id_koleksi');

        $dataUpdate = array(
          'kode_koleksi' => $this->input->post('kode_koleksi'),
          'nomor_register' => $this->input->post('nomor_register'),
          'id_rak' => $this->input->post('id_rak')
        );

        $this->koleksi_model->updateKoleksi($id_koleksi, $dataUpdate);

    }

    $data['koleksi'] = $this->koleksi_model->getKoleksi($call_number);
    
    $data['call_number'] = $call_number;

    if($data['koleksi'] != false){
      $data['ada'] = 1;
    }else{
      $data['ada'] = 0;
    }

    $this->load->view('admin/koleksi_view', $data);


  }

  function delete(){

    $id_koleksi = $this->uri->segment(3);

    $data['koleksiDetail'] = $this->koleksi_model->getKoleksiByID($id_koleksi);

    $data['biblio'] = $this->bibliografi_model->getBiblioDetail_ByCallNumber($data['koleksiDetail']->call_number);
    $this->bibliografi_model->updateJumlahStok($data['koleksiDetail']->call_number, $data['biblio']->jumlah_stok - 1);


    $this->koleksi_model->delete($id_koleksi);

    $data['koleksi'] = $this->koleksi_model->getKoleksi($data['koleksiDetail']->call_number);
  
    $data['call_number'] = $data['koleksiDetail']->call_number;

    if($data['koleksi'] != false){
      $data['ada'] = 1;
    }else{
      $data['ada'] = 0;
    }

    $this->load->view('admin/koleksi_view', $data);
    
 
  }


}