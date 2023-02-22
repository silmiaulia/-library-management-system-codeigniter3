<?php
class Koleksi_model extends CI_Model{
 
  function getKoleksi($call_number){
    $this->db->select('k.*, b.*')
    ->from('koleksi k')
    ->join('bibliografi b', 'k.call_number = b.call_number')
    ->where('k.call_number', $call_number);
    $query = $this->db->get();

        if($query->num_rows() > 0) 
        {
            return $query->result();


        }else{
            return false;
        }
  }

  function Count_BiblioinKoleksi($call_number){

    $this->db->select('*');
    $this->db->from('koleksi');
    $this->db->where('call_number', $call_number);
    $this->db->where('status', 0);
    $query = $this->db->get();

    if($query->num_rows() > 0) 
    {
        return $query->num_rows();


    }else{
      
        return 0;
    }

  }

  function getKoleksiByKode($kode_koleksi){

    $this->db->select('*');
    $this->db->from('koleksi');
    $this->db->where('kode_koleksi', $kode_koleksi);
    $this->db->where('status', 0);
    $query = $this->db->get();

        if($query->num_rows() > 0) 
        {
            return $query->row();


        }else{
            return false;
        }

  }

  function getKoleksiByID($id_koleksi){

    $this->db->select('*');
    $this->db->from('koleksi');
    $this->db->where('id_koleksi', $id_koleksi);
    $query = $this->db->get();

    return $query->row();
  }

  function updateStatus($kode_koleksi, $dataUpdate){
      $this->db->where('kode_koleksi', $kode_koleksi);
      $this->db->update('koleksi', $dataUpdate);
  }

  function addKoleksi($data){

    $this->db->insert('koleksi', $data);

  }

  function updateKoleksi($id_koleksi, $data){

    $this->db->where('id_koleksi', $id_koleksi);
    $this->db->update('koleksi', $data);

  }

  function delete($id_koleksi){

    $this->db->where('id_koleksi', $id_koleksi);
    $this->db->delete('koleksi');
  }
   


   
}