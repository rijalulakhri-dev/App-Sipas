<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('View_model','view'); 
    }

    public function index()
    {

        $data = array(
            'title' => 'Beranda',
            'titlePage' => 'Beranda',
            'page' => 'page/beranda',
            'surat_masuk' => $this->view->get_surat_count(),
            'surat_proses' => $this->view->get_proses_count(),
            'jumlah_pengguna' => $this->view->get_pengguna_count()
        );
        $this->load->view('index', $data);
    }

    public function error() {
        $data = array(
            'title' => '404',
        );

        $this->load->view('page/404', $data);
        
    }
}


