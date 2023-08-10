<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model', 'user');
        
    }

    public function login() 
    {
        $data = array(
            'title' => 'Login',
            'titlePage' => 'Selamat Datang'
        );

        $this->load->view('page/auth/login', $data);

    }

    public function proses_login()
    {

        $username = htmlspecialchars(strtolower($this->input->post('username', TRUE)),ENT_QUOTES);
        $password = htmlspecialchars($this->input->post('password', TRUE),ENT_QUOTES);
        
        $validasi = $this->user->login($username, $password);

        if ($validasi->num_rows() == 1) {
            $data = $validasi->row_array();
            if (password_verify($password, $data['password'])) {
                switch ($data['level_access']) {
                    case 'admin':
                        $this->session->set_userdata('masuk', TRUE);
                        $this->session->set_userdata('nama', $data['nama']);
                        $this->session->set_userdata('username', $data['username']);
                        $this->session->set_userdata('password', $data['password']);
                        $this->session->set_userdata('level_access', 'admin');
                        $this->session->set_userdata('id_level', '1');
                        
                        redirect('Main');
                        break;
                    case 'pimpinan':
                        $this->session->set_userdata('masuk', TRUE);
                        $this->session->set_userdata('nama', $data['nama']);
                        $this->session->set_userdata('username', $data['username']);
                        $this->session->set_userdata('password', $data['password']);
                        $this->session->set_userdata('level_access', 'pimpinan');
                        $this->session->set_userdata('id_level', '2');
                        redirect('Main');
                        break;
                    case 'persuratan':
                        $this->session->set_userdata('masuk', TRUE);
                        $this->session->set_userdata('nama', $data['nama']);
                        $this->session->set_userdata('username', $data['username']);
                        $this->session->set_userdata('password', $data['password']);
                        $this->session->set_userdata('level_access', 'persuratan');
                        $this->session->set_userdata('id_level', '3');
                        
                        redirect('Main');
                        break;
                    case 'piket':
                        $this->session->set_userdata('masuk', TRUE);
                        $this->session->set_userdata('nama', $data['nama']);
                        $this->session->set_userdata('username', $data['username']);
                        $this->session->set_userdata('password', $data['password']);
                        $this->session->set_userdata('level_access', 'piket');
                        $this->session->set_userdata('id_level', '4');
                        
                        redirect('Main');
                        break;
                    
                    default:
                        # code...
                        break;
                }

            }
        }else {
            
            redirect('login');
            
        }
        
    }

    public function logout()
    {
        $this->session->set_flashdata('message', 'Anda telah keluar!');
        $this->session->sess_destroy();
        redirect('login');
    }

}

?>