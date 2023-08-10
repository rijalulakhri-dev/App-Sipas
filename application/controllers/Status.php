<?php 

defined('BASEPATH') OR exit('No direct script access allowed');


class Status extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Insert_model', 'ins');
        $this->load->model('View_model', 'view');
        
    }
        
    /**
     * get_surat_all
     * berguna untuk mengambil semua surat dan memberikan status
     * @return void
     */
    public function get_surat_all()
    {
        $data = $this->ins->get_surat_status();

    }
    
    /**
     * get_status
     *
     * @param  mixed $go
     * @param  mixed $ids
     * @return void
     */
    public function get_status($go, $ids){
        $this->view->get_surat_status($go, $ids);
    }
}



?>