<?php
class Admin_Bibliografi extends CI_Controller{

  function __construct(){

    parent::__construct();
    $this->load->model('bibliografi_model');
    $this->load->model('koleksi_model');
  }

  function index(){

    $data['bibliografi'] = $this->bibliografi_model->getBiblio();

    // $data['jumlahStok'] =  $this->koleksi_model->Count_BiblioinKoleksi($data['bibliografi'][0]->call_number);

    
    $this->load->view('admin/bibliografi_view', $data);
  }

  function countStok($call_number){


    $data['jumlah_stok'] = $this->koleksi_model->Count_BiblioinKoleksi($call_number);

    $this->load->view('admin/bibliografi_view', $data);
  }

  function details(){

    $id_bibliografi = $this->uri->segment(3);
    $data['biblioDetail'] = $this->bibliografi_model->getBiblioDetail($id_bibliografi);

    $data['countBiblioinKoleksi'] =  $this->koleksi_model->Count_BiblioinKoleksi($data['biblioDetail']->call_number);

    $this->load->view('user/bibliografi_detail_view', $data);

  }

  function form(){

      $this->load->view('admin/form_bibliografi');
    
  }

  function formUpdate(){

      $id_bibliografi = $this->uri->segment(3);
      $data['biblio'] = $this->bibliografi_model->getBiblioDetail($id_bibliografi);
      $this->load->view('admin/form_update_bibliografi', $data);

  }

  function add(){

    $error = null;
    if ($this->input->method() === 'post') {

        $config['upload_path'] = './assets/images/';
        $config['allowed_types'] = 'png|jpg|jpeg';
        $config['max_size'] = 2048;
        $config['max_width'] = 1080;
        $config['max_height'] = 1080;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('foto')) {

          $error = array('error' => $this->upload->display_errors());
          
        }else{
          
            $upload_data = $this->upload->data();

            $dataAdd = array(
              'isbn' => $this->input->post('isbn'),
              'call_number' => $this->input->post('call_number'),
              'judul' => $this->input->post('judul'),
              'edisi' => $this->input->post('edisi'),
              'penulis' => $this->input->post('penulis'),
              'penerbit' => $this->input->post('penerbit'),
              'tahun' => $this->input->post('tahun'),
              'kategori' => $this->input->post('kategori'),
              'harga' => $this->input->post('harga'),
              'jumlah_stok' => 0,
              'foto' => $upload_data['file_name'],
            );

          $this->bibliografi_model->addBibliografi($dataAdd);

        }

    }

    if($error == null){
      $this->index();
    }else{
      $this->load->view('admin/form_bibliografi', $error);
    }

  }

  function update(){

    $error = null;

    if ($this->input->method() === 'post') {

        $config['upload_path'] = './assets/images/';
        $config['allowed_types'] = 'png|jpg|jpeg';
        $config['max_size'] = 2048;
        $config['max_width'] = 1080;
        $config['max_height'] = 1080;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('foto')) {

          $error = array('error' => $this->upload->display_errors());
          
        }else{
          
            $upload_data = $this->upload->data();
            $id_bibliografi = $this->input->post('id_bibliografi');

            $dataUpdate = array(
              'isbn' => $this->input->post('isbn'),
              'call_number' => $this->input->post('call_number'),
              'judul' => $this->input->post('judul'),
              'edisi' => $this->input->post('edisi'),
              'penulis' => $this->input->post('penulis'),
              'penerbit' => $this->input->post('penerbit'),
              'tahun' => $this->input->post('tahun'),
              'kategori' => $this->input->post('kategori'),
              'harga' => $this->input->post('harga'),
              'foto' => $upload_data['file_name'],
            );

          $this->bibliografi_model->updateBibliografi($id_bibliografi, $dataUpdate);

        }

    }

    if($error == null){
      $this->index();
    }else{
      $this->load->view('admin/form_update_bibliografi', $error);
    }

    

  }

  function delete(){

    $id_bibliografi = $this->uri->segment(3);
    $this->bibliografi_model->delete($id_bibliografi);

    $this->index();

  }

}