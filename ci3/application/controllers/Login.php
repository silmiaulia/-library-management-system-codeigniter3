<?php
class Login extends CI_Controller{

  function __construct(){
    parent::__construct();
    $this->load->model('petugas_model');
  }

  function index(){
    
    $this->load->view('admin/login_form');

  }

  function prosesLogin(){

    $email = $this->input->post('email');
    $password = $this->input->post('password');

    $cek = $this->petugas_model->checkPetugas($email, $password);

    if($cek > 0){

        $data_session = array(
			'email' => $email,
			'status' => "login"
		);

        $this->session->set_userdata($data_session);

        redirect(base_url("index.php/admin_bibliografi"));
    }else{
        echo "Email atau password salah";
    }


  }

    function logout(){

        $this->session->sess_destroy();
        redirect(base_url("index.php/login"));
    }


}