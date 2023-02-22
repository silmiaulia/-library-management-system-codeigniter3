<?php
class Petugas_model extends CI_Model{
 

  function checkPetugas($email, $password){

    $this->db->select('*');
    $this->db->from('petugas');
    $this->db->where('email', $email);
    $this->db->where('password', $password);
    $query = $this->db->get();

    return $query->num_rows();

  }

  function getPetugas(){

  }
   
}