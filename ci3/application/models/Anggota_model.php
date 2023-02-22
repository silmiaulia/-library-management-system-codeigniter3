<?php
class Anggota_model extends CI_Model{
 

  function getAnggota(){

    $result = $this->db->get('anggota')->result();
    return $result;
  }

  function getAnggotabyID($id_anggota){

    $this->db->select('*');
    $this->db->from('anggota');
    $this->db->where('id_anggota', $id_anggota);
    $query = $this->db->get();

        if($query->num_rows() > 0) 
        {
            return $query->row();


        }else{
            return false;
        }

  }

  function addAnggota($data){

    $this->db->insert('anggota', $data);

  }

  function updateAnggota($id_anggota, $data){

    $this->db->where('id_anggota', $id_anggota);
    $this->db->update('anggota', $data);

  }

  function delete($id_anggota){

    $this->db->where('id_anggota', $id_anggota);
    $this->db->delete('anggota');
  }

}