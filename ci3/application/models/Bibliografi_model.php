<?php
class Bibliografi_model extends CI_Model{
 

  function getBiblio(){

    $result = $this->db->get('bibliografi')->result();
    return $result;
  }

  function getBiblioDetail($id_bibliografi){

    $this->db->select('*');
    $this->db->from('bibliografi');
    $this->db->where('id_bibliografi', $id_bibliografi);
    $query = $this->db->get();

    return $query->row();

  }

  function getBiblioDetail_ByCallNumber($call_number){

    $this->db->select('*');
    $this->db->from('bibliografi');
    $this->db->where('call_number', $call_number);
    $query = $this->db->get();

    return $query->row();

  }

  function addBibliografi($data){

    $this->db->insert('bibliografi', $data);

  }

  function updateBibliografi($id_bibliografi, $data){

    $this->db->where('id_bibliografi', $id_bibliografi);
    $this->db->update('bibliografi', $data);

  }

  function updateJumlahStok($call_number, $jumlah_stok){

    $data = array(
      'jumlah_stok' => $jumlah_stok
    );

    $this->db->where('call_number', $call_number);
    $this->db->update('bibliografi', $data);

  }


  function delete($id_bibliografi){

    $this->db->where('id_bibliografi', $id_bibliografi);
    $this->db->delete('bibliografi');
  }
   
}