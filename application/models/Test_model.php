<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Test_model extends CI_Model {

    function get_status_surat($set, $ids) {
        switch ($set) {
            case '1':
                $data['kode_status_piket'] = 1; 
                $this->db->where('tiket_unique', $ids);
                $this->db->update('tb_piket', $data);
                return;
                break;
                
            case '2':
                $data['kode_status_persuratan'] = 1; 
                $this->db->where('tiket_unique', $ids);
                $this->db->update('tb_persuratan', $data);
                return;
                break;
            
            case '3':
                $data['kode_status_pimpinan'] = 1; 
                $this->db->where('tiket_unique', $ids);
                $this->db->update('tb_pimpinan', $data);
                return;
                break;

            default:
                # code...
                break;
        }
                        
    }
}

?>