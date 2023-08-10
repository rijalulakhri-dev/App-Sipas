<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
                        
class View_model extends CI_Model 
{
    public function get_surat()
    {
        $query = $this->db->get('tb_surat');
        return $query->result();
    }     

    public function get_disposisi()
    {
        $this->db->order_by('tanggal_surat', 'desc');
        $query = $this->db->get('tb_disposisi');
        return $query->result();
    }
    
    public function get_all_pengguna() 
    {
        return $this->db->get('tb_pengguna')->result();
    }

    public function get_pengguna_count() 
    {
        $query = $this->db->get('tb_pengguna');
        return $query->num_rows();
    }
    
    public function get_surat_count() 
    {
        $query = $this->db->get('tb_surat');
        return $query->num_rows();
    }

    public function get_proses_count() 
    {
        $query = $this->db->get('tb_status');
        return $query->num_rows();
    }

    public function get_nomorAgenda($nomor_agenda)
    {   
        $this->db->select('nomor_agenda');
        $this->db->where('nomor_agenda', $nomor_agenda);
        $query = $this->db->get('tb_disposisi')->row();
        return $query->nomor_agenda;
        
    }

    public function join_disposisi($id_disposisi)
    {
        $this->db->select('*');
        $this->db->join('disposisi_item', 'disposisi_item.disposisi_id = tb_disposisi.id_disposisi');
        $this->db->where('id_disposisi', $id_disposisi);
        return $this->db->get('tb_disposisi');
        
    }

    public function download_pdf($id_surat) {
        $this->db->where('id_surat', $id_surat);
        $query = $this->db->get('tb_surat');
        if ($query->num_rows() == 1) {
            return $query->row();
        } else {
            return null;
        }
    }
    

}


