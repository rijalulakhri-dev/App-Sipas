<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
                        
class Insert_model extends CI_Model 
{
    
    public function __construct()
    {
        parent::__construct();
    }
        
    /**
     * select_surat
     * berguna untuk memasukkan data ke tb_surat
     * @param  mixed $data
     * @param  mixed $status
     * @return void
     */
    public function save_surat($data, $status, $aktivitas) {
        $this->db->insert('tb_surat', $data);
        $this->db->insert('tb_status', $status);
        $this->db->insert('tb_aktivitas', $aktivitas);
    }      
            
    /**
     * save_disposisi
     * merupakan fungsi untuk menyimpan data di tb_disposisi dan disposisi_item
     * fungsi ini juga mempunyai kaitan dengan fungsi process_disposisi 
     * di controller surat
     * @param  mixed $data
     * @param  mixed $dataTwo
     * @return void
     */
    public function save_disposisi($data, $dataTwo) {

        $this->db->insert('tb_disposisi', $data);
        $this->db->insert('disposisi_item', $dataTwo);        
    }
    
    /**
     * update_disposisi
     * ini merupakan update data untuk tb_disposisi
     * function ini mempunyai kaitan dengan fungsi process_update di 
     * controller surat
     * @param  mixed $id_disposisi
     * @param  mixed $dataTwo
     * @return void
     */
    function update_disposisi($id_disposisi, $dataTwo) {
        $this->db->where('disposisi_id', $id_disposisi);
        $this->db->update('disposisi_item', $dataTwo);
        return;
    }

    /**
     * get_surat_status
     * inner join antara tb_surat dan tb_status 
     * @return void
     */
    function get_surat_status() {
        
        $this->db->select('*');
        $this->db->join('tb_status', 'tb_status.surat_id = tb_surat.id_surat');
        $this->db->order_by('tb_status.tanggal_update', 'desc');
        $query = $this->db->get('tb_surat');
        return $query->result();

    } 
        
    /**
     * get_surat_disposisi
     * inner join tb_disposisi, tb_status dan tb_surat
     * @return void
     */
    function get_surat_disposisi() {
        
        $this->db->select('*');
        $this->db->join('tb_status', 'tb_status.surat_id = tb_surat.id_surat');
        $this->db->join('tb_disposisi', 'tb_disposisi.surat_id = tb_surat.id_surat');
        $this->db->order_by('tb_status.tanggal_update', 'desc');
        $query = $this->db->get('tb_surat');
        return $query->result();

    } 

    function get_surat_id($id_disposisi)
    {
        $this->db->select('*');
        $this->db->where('id_disposisi', $id_disposisi);
        $this->db->join('disposisi_item', 'disposisi_item.disposisi_id = tb_disposisi.id_disposisi');
        $this->db->limit(1);
        return $this->db->get('tb_disposisi')->row();
    }

    /**
     * get_status_surat
     * logika sederhana untuk tracking surat
     * @param  mixed $set
     * @param  mixed $ids
     * @return void
     */
    function get_status_surat($set, $ids) {
        switch ($set) {
            case '1':
                $data['piket'] = 1; 
                $this->db->where('unique_tiket', $ids);
                $this->db->update('tb_status', $data);
                return;
                break;
            case '2':
                $data['persuratan'] = 1; 
                $this->db->where('unique_tiket', $ids);
                $this->db->update('tb_status', $data);
                return;
                break;
            
            case '3':
                $data['pimpinan'] = 1; 
                $this->db->where('unique_tiket', $ids);
                $this->db->update('tb_status', $data);
                return;
                break;

            default:
                # code...
                break;
        }
                        
    }
    
    /**
     * insert_petugas
     * berguna untuk memasukkan data petugas baru ke tb_pengguna
     * @param  mixed $data
     * @return void
     */
    function insert_petugas($data)
    {
        $this->db->insert('tb_pengguna', $data);
    }
           

}


