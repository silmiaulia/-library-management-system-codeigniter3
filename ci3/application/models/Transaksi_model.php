<?php
class Transaksi_model extends CI_Model{
 


  function addTransaksi($id_anggota, $kode_koleksi){

    $date = date('Y-m-d');
    $due_date = date('Y-m-d', strtotime($date .' +5 day'));
    $data = array(
        'kode_koleksi' => $kode_koleksi,
        'id_anggota' => $id_anggota,
        'tanggal_pinjam' => $date,
        'tanggal_jatuh_tempo' => $due_date,
        'is_lent' => 1,
        'is_return' => 0

    );

    $this->db->insert('transaksi', $data);

  }

    function updateTransaksi($id_transaksi){

        $date = date('Y-m-d');
        $data = array(
            'tanggal_kembali' => $date,
            'is_lent' => 0,
            'is_return' => 1

        );

        $this->db->where('id_transaksi', $id_transaksi);
        $this->db->update('transaksi', $data);

  }

  function getTransaksiAnggota($id_anggota, $isLent){

    $this->db->select('*');
    $this->db->from('transaksi');
    $this->db->where('id_anggota', $id_anggota);
    $this->db->where('is_lent', $isLent);
    $query = $this->db->get();

        if($query->num_rows() > 0) 
        {
            return $query->result();


        }else{

            return false;
        }
  }

  function getTransaksiAnggota2($id_anggota, $isLent){

    $data = $this->db->query("SELECT
    koleksi.kode_koleksi,
    transaksi.tanggal_pinjam,
    transaksi.tanggal_jatuh_tempo,
    transaksi.tanggal_kembali,
    bibliografi.judul
    FROM
    koleksi
    Inner Join transaksi ON koleksi.kode_koleksi = transaksi.kode_koleksi
    Inner Join bibliografi ON bibliografi.call_number = koleksi.call_number
    WHERE transaksi.id_anggota = '$id_anggota' and transaksi.is_lent = '$isLent'");

    return $data->result();
  }
   
}