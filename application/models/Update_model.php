<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
                        
class Update_model extends CI_Model {

        
    /**
     * delete_surat
     * fungsi ini untuk menghapus data surat di tb_surat
     * @param  mixed $id_surat
     * @return void
     */
    function delete_surat($id_surat) {
        $this->db->where('id_surat', $id_surat);
        $this->db->delete('tb_surat');
    }

    /**
     * get_petugas_id
     * fungsi untuk mengambil id_user dari tb_pengguna
     * @param  mixed $id_user
     * @return void
     */
    function get_petugas_id($id_user) {
        $this->db->where('id_user', $id_user);
        return $this->db->get('tb_pengguna')->row();
    } 

    function update_petugas_id($id_user, $data) {
        $this->db->update('id_user', $id_user);
        $this->db->where('tb_pengguna', $data);
    }
    
    /**
     * delete_petugas
     * fungsi untuk menghapus data petugas dari tb_pengguna
     * @param  mixed $id_user
     * @return void
     */
    function delete_petugas($id_user) {
        $this->db->where('id_user', $id_user);
        $this->db->delete('tb_pengguna');  
    }

     // function call_anonymous_fun() {
    //     $this->db->select('*');
    //     $this->db->join('tb_surat', 'tb_surat.id_surat = tb_status.surat_id');
    //     return $this->db->get('tb_status');
    // }

    // function count_part_surat() {
    //     $this->db->select('*');
    //     $this->db->join('tb_surat', 'tb_surat.id_surat = tb_status.surat_id');
    //     $this->db->where('tb_status.piket', 1);
    //     return $this->db->get('tb_status');
    // }

    // function logic_part_surat($surat,$piket,$pimpinan) {
    //     $this->db->select('*');
    //     $this->db->join('tb_surat', 'tb_surat.id_surat = tb_status.surat_id');
    //     $this->db->where('tb_status.piket', $piket);
    //     $this->db->where('tb_status.persuratan', $surat);
    //     $this->db->where('tb_status.pimpinan', $pimpinan);
    //     $this->db->order_by('tb_status.tanggal_update', 'desc');
        
    //     return $this->db->get('tb_status');
        
        
    // }



    

                        
}



