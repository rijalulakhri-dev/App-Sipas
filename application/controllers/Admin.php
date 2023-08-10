<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Insert_model','ins');
        $this->load->model('View_model', 'view');
        $this->load->model('Update_model', 'upd');

        if ($this->session->userdata('masuk') != TRUE && $this->session->userdata('id_level') != '1') {
            redirect('login');
        }
    }
    
    
    /**
     * index
     * function index berfungsi untuk menampilkan halaman list data petugas
     * @return void
     */
    public function index()
    {
        $login = $this->session->userdata('id_level');
        if ($login == 1) {
            $data = array(
                'title'     => 'List Data Petugas',
                'titlePage' => 'List Data Petugas',
                'page'      => 'page/petugas/List_petugas'  
            );
            $data['petugas'] = $this->view->get_all_pengguna();
            $this->load->view('index', $data);
        } else {
            redirect('404_error');
        }
       
    }
    
    /**
     * daftar
     * berfungsi untuk menampilkan halaman daftar petugas
     * @return void
     */
    public function daftar() 
    {
        $login = $this->session->userdata('id_level');
        if ($login == 1) {
            $data = array(
                'title'     => 'Daftar Petugas',
                'titlePage' => 'Daftar Petugas',
                'page'      => 'page/petugas/Daftar_petugas'
            );
            $this->load->view('index', $data);
        } else {
            redirect('404_error');
        }

        
    }
    
    /**
     * proses_daftar
     * function proses daftar berguna untuk membuat petugas baru 
     * dan terhubung ke model insert di function insert_petugas
     * @return void
     */
    public function proses_daftar()
    {
        $this->rules();

        if ($this->form_validation->run() == FALSE) {
            $this->daftar();
        } else{
            $password = $this->input->post('password', TRUE);

            $data = array(
                'nama'         => $this->input->post('nama', TRUE),
                'username'     => strtolower($this->input->post('username', TRUE)),
                'password'     => password_hash($password, PASSWORD_DEFAULT),
                'level_access' => $this->input->post('level_access', TRUE),
                'status'       => 'Aktif',
                'terdaftar'    => date('Y-m-d')
            );

            $this->session->set_flashdata('success', 'Data petugas berhasil ditambahkan!');
            $this->ins->insert_petugas($data);
            
            redirect('daftar_petugas');
        }
    }


    // belum siap
    public function update_petugas($id_user)
    {
        $row = $this->upd->get_petugas_id($id_user);
        if ($row) {
            $data = array(
                'id_user'      => set_value('nama', $row->id_user),
                'nama'         => set_value('nama', $row->nama),
                'username'     => set_value('username', $row->username),
                'password'     => set_value('password', $row->password),
                'level_access' => set_value('level_access', $row->level_access),
                'title'        => 'Update Petugas',
                'titlePage'    => 'Update Data Petugas',
                'page'         => 'page/petugas/Update_petugas'
            );
            $this->load->view('index', $data);
        }


    }

    // belum siap
    public function proses_update_petugas()
    {
        $this->rules();
        
        if ($this->form_validation->run() == FALSE) {
            $this->update_petugas($this->input->post('id_user', TRUE));
        } else {
            $data = array(
                'nama'         => $this->input->post('nama', TRUE),
                'username'     => strtolower($this->input->post('username', TRUE)),
                'password'     => password_hash($password, PASSWORD_DEFAULT),
                'level_access' => $this->input->post('level_access', TRUE),
            );
            $this->upd->update_petugas_id($this->input->post('id_user', TRUE), $data);
            redirect('list_petugas');
            
        }
        
    }

        
    /**
     * delete
     * merupakan fungsi untuk menghapus data petugas di tb_pengguna
     * @param  mixed $id_user
     * @return void
     */
    function delete($id_user)
    {
        $row = $this->upd->get_petugas_id($id_user);

        if($row) {
            $this->upd->delete_petugas($id_user);
            $this->db->query("DELETE FROM tb_pengguna WHERE id_user = '$id_user'");

            redirect('list_petugas');
        }
    }

    
    /**
     * rules
     * ini merupakan rules / aturan saat membuat akun untuk petugas
     * @return void
     */
    function rules()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required|min_length[5]|max_length[12]');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[12]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|max_length[12]');
        $this->form_validation->set_rules('level_access', 'Level Akses', 'required|callback_check_select');
    }
    
    /**
     * check_select
     * merupakan set_rules untuk pemilihan level akses
     * @param  mixed $value
     * @return void
     */
    function check_select($value)
    {
        if ($value == '--Pilih--') {
            $this->session->set_flashdata('check_select', 'Pilih level akses yang valid.');
            
            return FALSE;
        }
        return in_array($value, array('admin', 'persuratan', 'pimpinan', 'piket'));
    }


}

/* End of file Controllername.php */

?>