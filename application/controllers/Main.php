<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data = array(
            'title' => 'Beranda',
            'titlePage' => 'Sample Title Page',
            'page' => 'page/beranda'
        );

        $this->load->view('index', $data);
        
    }
}

/* End of file Main.php and path \application\controllers\Main.php */
