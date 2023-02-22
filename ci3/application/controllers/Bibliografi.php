<?php
class Bibliografi extends CI_Controller{

  function __construct(){
    parent::__construct();
    $this->load->model('bibliografi_model');
    $this->load->model('koleksi_model');
  }

  function index(){
    
    $data['bibliografi'] = $this->bibliografi_model->getBiblio();
    
    $this->load->view('user/bibliografi_view',$data);
  }

  function details(){

    $id_bibliografi = $this->uri->segment(3);
    $data['biblioDetail'] = $this->bibliografi_model->getBiblioDetail($id_bibliografi);

    $data['countBiblioinKoleksi'] =  $this->koleksi_model->Count_BiblioinKoleksi($data['biblioDetail']->call_number);

    $this->load->view('user/bibliografi_detail_view', $data);

  }


}