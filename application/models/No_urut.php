<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class No_urut extends CI_Model
{

    function buat_kode_barang()   {    
      $this->db->select('RIGHT(barang.id_barang,4) as kode', FALSE);
      $this->db->order_by('id_barang','DESC');    
      $this->db->limit(1);     
      $query = $this->db->get('barang');      //cek dulu apakah ada sudah ada kode di tabel.    
      if($query->num_rows() <> 0){       
       //jika kode ternyata sudah ada.      
       $data = $query->row();      
       $kode = intval($data->kode) + 1;     
      }
      else{       
       //jika kode belum ada      
       $kode = 1;     
      }
      $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT);    
      $kodejadi = "BRG".$kodemax;     
      return $kodejadi;  
     }
	 
	 function buat_kode_anggota()   {    
      $this->db->select('RIGHT(anggota.id_anggota,4) as kode', FALSE);
      $this->db->order_by('id_anggota','DESC');    
      $this->db->limit(1);     
      $query = $this->db->get('anggota');      //cek dulu apakah ada sudah ada kode di tabel.    
      if($query->num_rows() <> 0){       
       //jika kode ternyata sudah ada.      
       $data = $query->row();      
       $kode = intval($data->kode) + 1;     
      }
      else{       
       //jika kode belum ada      
       $kode = 1;     
      }
      $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT);    
      $kodejadi = "BKT28".$kodemax;     
      return $kodejadi;  
     }
	 
	 function buat_kode_member()   {    
      $this->db->select('RIGHT(member.id,4) as kode', FALSE);
      $this->db->order_by('id','DESC');    
      $this->db->limit(1);     
      $query = $this->db->get('member');      //cek dulu apakah ada sudah ada kode di tabel.    
      if($query->num_rows() <> 0){       
       //jika kode ternyata sudah ada.      
       $data = $query->row();      
       $kode = intval($data->kode) + 1;     
      }
      else{       
       //jika kode belum ada      
       $kode = 1;     
      }
      $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT);    
      $kodejadi = "BKT".$kodemax;     
      return $kodejadi;  
     }
	 
	 
	 function buat_kode_penjualan()   {    
      $this->db->select('RIGHT(transaksi.id_transaksi,5) as kode', FALSE);
      $this->db->order_by('id_transaksi','DESC');    
      $this->db->limit(1);     
      $query = $this->db->get('transaksi');      //cek dulu apakah ada sudah ada kode di tabel.    
      if($query->num_rows() <> 0){       
       //jika kode ternyata sudah ada.      
       $data = $query->row();      
       $kode = intval($data->kode) + 1;     
      }
      else{       
       //jika kode belum ada      
       $kode = 1;     
      }
      $kodemax = str_pad($kode, 5, "0", STR_PAD_LEFT);    
      $kodejadi = "TR".$kodemax;     
      return $kodejadi;  
     }

     function buat_kode_santri()   {    
      $this->db->select('RIGHT(santri.id_santri,5) as kode', FALSE);
      $this->db->order_by('id_santri','DESC');    
      $this->db->limit(1);     
      $query = $this->db->get('santri');      //cek dulu apakah ada sudah ada kode di tabel.    
      if($query->num_rows() <> 0){       
       //jika kode ternyata sudah ada.      
       $data = $query->row();      
       $kode = intval($data->kode) + 1;     
      }
      else{       
       //jika kode belum ada      
       $kode = 1;     
      }
      $kodemax = str_pad($kode, 5, "0", STR_PAD_LEFT);    
      $kodejadi = "SN".$kodemax;     
      return $kodejadi;  
     }

}
