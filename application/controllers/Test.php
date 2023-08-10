<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Test_model','test');
    }
    

    public function lihat_surat($id_disposisi)
    {
        $data = $this->test->get_surat_id($id_disposisi);
        echo "<pre>";
        var_dump($data->nomor_agenda);
        echo "</pre>";
        
    }

}

/* End of file Test.php */

?>