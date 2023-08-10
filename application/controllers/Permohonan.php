<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Permohonan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('session');

        $this->load->model('Insert_model', 'ins');
        $this->load->model('Update_model', 'upd');
        $this->load->model('View_model', 'view');        
    }
    
    
    /**
     * index
     * halaman daftar surat yang di kirimkan melalui halaman masukkan permohonan surat
     * @return void
     */
    public function index() {
        
        $data = array(
            'title' => 'Daftar Surat',
            'titlePage' => 'Daftar Surat',
            'page' => 'page/piket/List_berkas'
        );

        // $data['surat'] = $this->view->get_surat();
        $data['surat'] = $this->ins->get_surat_status();

        $this->load->view('index', $data);
        
    }
    
    /**
     * create
     * halaman masukkan permohonan surat
     * @return void
     */
    function create() {     

            $data = array(
                'title' => 'Masukkan Permohonan',
                'titlePage' => 'Masukkan Permohonan Surat',
                'page' => 'page/piket/Add_berkas'
            );
    
            $this->load->view('index', $data);
            
    }
    
    /**
     * create_process
     * isi dari create_process ada perintah post untuk masuk ke dalam tb_surat
     * untuk perintah post nya juga memiliki rule
     * @return void
     */
    function create_process() {
        $this->_rules('create_surat');

        $nomor_surat = $this->input->post('nomor_surat');
        $judul_surat = $this->input->post('judul_surat');
        $tanggal_surat = $this->input->post('tanggal_surat');
        $keterangan_surat = $this->input->post('keterangan_surat');
        $tujuan = $this->input->post('tujuan');
        $lampiran = $_FILES['lampiran']['tmp_name'];
        
        
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
        
        if ($nomor_surat !== NULL) {
            
            $id_surat = 'SURAT_' . $nomor_surat . date('Ymd', strtotime($tanggal_surat));
            $unique_tiket = time();  

            $config = array(
                'allowed_types' => 'pdf|docx|doc|odt',
                'max_size'      => 10000,
                'overwrite'     => TRUE,
                'file_name'     => $id_surat,
                'upload_path'   => './lampiran/',
                'encrypt_name'  => FALSE,
            );

            $this->load->library('upload', $config);

            $data = array(
                'id_surat'         => $id_surat,
                'nomor_surat'      => $nomor_surat,
                'judul_surat'      => $judul_surat,
                'tanggal_surat'    => $tanggal_surat,
                'keterangan_surat' => $keterangan_surat
            );

            if (!empty($_FILES['lampiran']['name'])) {
                if ($this->upload->do_upload('lampiran')) {
                  $data_file = $this->upload->data();
                  $data['lampiran']  = $id_surat.$data_file['file_ext'];
                }
            }           

            // tb_status
            $status = array(
                'unique_tiket'   => $unique_tiket,
                'surat_id'       => $id_surat,
                'piket'          => 1,
                'tujuan'         => $tujuan,
                // 'notifikasi' => $ecp,
                'tanggal_update' => $tanggal_surat
            );

            $aktivitas = array(
                'surat_id' => $id_surat,
                'penerima' => $tujuan,
                'tanggal_aktivitas' => $tanggal_surat
            );

            $this->session->set_flashdata('success', 'Data berhasil ditambahkan!');
            
            $this->ins->save_surat($data, $status, $aktivitas);

            // die();
            switch ($this->session->userdata('id_level')) {
                case '4':
                    redirect('list_surat');
                    break;
                case '3':
                    redirect('lembar_disposisis/'. $id_surat);
                    break;
                case '1':
                    redirect('lembar_disposisis/'. $id_surat);
                    break;
                default:
                    redirect('404');
                    break;
            }
            
            
        }

        
        }

        
    }
    
    /**
     * detail
     * menampilkan halaman detail untuk tracking surat
     * @return void
     */
    public function detail() {

        $data = array(
            'title' => 'Tracking Surat',
            'titlePage' => 'Tracking Surat',
            'page' => 'page/piket/Track_berkas'
        );

        $this->load->view('index', $data);
        
    }
    
    /**
     * delete
     * ini merupakan perintah untuk menghapus data surat di tb_surat
     * @param  mixed $id_surat
     * @return void
     */
    public function delete($id_surat) {
        
        $this->session->set_flashdata('success', 'Data Berhasil Dihapus!');
        $data['surat'] = $this->upd->delete_surat($id_surat);
        redirect('list_surat');

    }
    
    /**
     * _rules
     * ini merupakan rules yang harus di berikan ke function create_process
     * @param  mixed $function
     * @return void
     */
    function _rules($function) {
        
            switch ($function) {
            case 'create_surat':
                $this->form_validation->set_rules('nomor_surat', 'Nomor Surat', 'trim|required|numeric|min_length[2]|max_length[4]');
                $this->form_validation->set_rules('judul_surat', 'Judul Surat', 'trim|required|min_length[1]|max_length[25]');
                $this->form_validation->set_rules('tanggal_surat', 'Tanggal Surat', 'trim|required');
                $this->form_validation->set_rules('keterangan_surat', 'Keterangan Surat', 'trim|required|min_length[5]|max_length[25]');

                break;
            default:
                # code...
                break;
        }
        
    }
    
    /**
     * sample_surat
     * merupakan fungsi untuk mengambil inner join dari tb_surat dan tb_status
     * @param  mixed $go
     * @param  mixed $ids
     * @return void
     */
    function sample_surat($go, $ids) {

        $this->ins->get_status_surat($go, $ids);
        redirect('list_surat');
        
    }

}

?>