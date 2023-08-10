<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

require FCPATH.'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\templateSpreadsheet; 
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

class Surat extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('View_model', 'view');
        $this->load->model('Insert_model', 'ins');
        $this->load->model('Test_model', 'test');
        $this->load->library('session');
        
    }
    
    public function index()
    {
        $data = array(
            'title' => 'Buat Surat',
            'titlePage' => 'Buat Surat',
            'page' => 'page/piket/Create_surat'
        );

        $this->load->view('index', $data);
        
    }
    
    /**
     * laporan
     * halaman ini berisikan seluruh informasi 
     * mengenai surat dan lembar disposisi
     * @return void
     */
    public function laporan() 
    {
        $login = $this->session->userdata('id_level');

        if ($login == 4) {
            redirect('404_error');
        } else {
            $data = array(
                'title' => 'Laporan Surat',
                'titlePage' => 'Laporan Surat',
                'page' => 'page/piket/Laporan',
                'surat' => $this->ins->get_surat_disposisi()
            );
            
            $this->load->view('index', $data);
        }
        
        
    }
        
    /**
     * form_disposisi
     * page Create lembar disposisi
     * @return void
     */
    public function form_disposisi()
    {
        $data = array(
            'title' => 'Data Form Disposisi',
            'titlePage' => 'Data Form Disposisi',
            'page' => 'page/piket/Form_disposisi',
            'surat' => $this->view->get_disposisi()
        );
        
        $this->load->view('index', $data);
        
    }
    
    /**
     * lembar_disposisi
     * 
     * @param  mixed $id_surat
     * @return void
     */
    public function lembar_disposisi($id_surat)
    {
        $data = array(
            'title' => 'Buat Lembar Disposisi',
            'titlePage' => 'Buat Lembar Disposisi',
            'page' => 'page/piket/Lembar_disposisi',
            'id_surat' => $id_surat
        );
         
        $this->load->view('index', $data);
    }
    
    /**
     * disposisi_pimpinan
     * page diposisi pimpinan
     * @param  mixed $id_disposisi
     * @return void
     */
    public function disposisi_pimpinan($id_disposisi)
    {
        $data = array(
            'title' => 'Buat Lembar Disposisi',
            'titlePage' => 'Buat Lembar Disposisi',
            'page' => 'page/pimpinan/Disposisi_pimpinan',
            'sample' => $this->ins->get_surat_id($id_disposisi),
            'id_disposisi' => $id_disposisi
        );
         
        $this->load->view('index', $data);
    }

        
    /**
     * process_disposisi
     * merupakan fungsi proses disposisi untuk level akses persuratan
     * @param  mixed $id_surat
     * @return void
     */
    public function process_disposisi($id_surat)
    {
        $idk = date('Y') .time();

        $nomor_agenda = $this->input->post('nomor_agenda');
        $tanggal_penerimaan = $this->input->post('tanggal_penerimaan');
        $tanggal_surat = $this->input->post('tanggal_surat');
        $dari = $this->input->post('dari');
        $ringkasan_surat = $this->input->post('ringkasan_surat');
        $lampiran = $this->input->post('lampiran');
        $tanggal_penyelesaian = $this->input->post('tanggal_penyelesaian');
        $tingkat_keamanan = $this->input->post('tingkat_keamanan');        

        $dataTwo = array(
            // Tingkat Keamanan
            'disposisi_id' => $idk,
            'Q6' => $this->input->post('Q6') === null ? 0 : 1,
            'Q7' => $this->input->post('Q7') === null ? 0 : 1,
            'Q8' => $this->input->post('Q8') === null ? 0 : 1,
            'Q9' => $this->input->post('Q9') === null ? 0 : 1
        );
        
        $data = array(
            'id_disposisi'         => $idk, 
            'nomor_agenda'         => $nomor_agenda, 
            'tanggal_penerimaan'   => $tanggal_penerimaan,
            'tanggal_surat'        => $tanggal_surat,
            'dari'                 => $dari,
            'ringkasan_surat'      => $ringkasan_surat,
            'lampiran'             => $lampiran,
            'tanggal_penyelesaian' => $tanggal_penyelesaian,
            'tingkat_keamanan'     => $tingkat_keamanan,
            'surat_id'             => $id_surat

        );

        $this->ins->save_disposisi($data, $dataTwo);
        $this->session->set_flashdata('success', 'Data berhasil ditambahkan!');
        redirect('laporan');
        
    }
    
    /**
     * process_update
     * merupakan fungsi dari update disposis yang ada 
     * disisi level akses pimpinan
     * @param  mixed $id_disposisi
     * @return void
     */
    public function process_update($id_disposisi)
    {
        $dataTwo = array(
            'disposisi_id' => $id_disposisi, 
            'A17' => $this->input->post('A17') === null ? 0 : 1,
            'A18' => $this->input->post('A18') === null ? 0 : 1,
            'A19' => $this->input->post('A19') === null ? 0 : 1,
            'A20' => $this->input->post('A20') === null ? 0 : 1,
            'A21' => $this->input->post('A21') === null ? 0 : 1,
            'A22' => $this->input->post('A22') === null ? 0 : 1,
            'A23' => $this->input->post('A23') === null ? 0 : 1,
            'A24' => $this->input->post('A24') === null ? 0 : 1,
            'A25' => $this->input->post('A25') === null ? 0 : 1,
            'A26' => $this->input->post('A26') === null ? 0 : 1,
            'A27' => $this->input->post('A27') === null ? 0 : 1,
            'A28' => $this->input->post('A28') === null ? 0 : 1,
            'A29' => $this->input->post('A29') === null ? 0 : 1,
            'A30' => $this->input->post('A30') === null ? 0 : 1,
            'A31' => $this->input->post('A31') === null ? 0 : 1,
            'A32' => $this->input->post('A32') === null ? 0 : 1,
            'A33' => $this->input->post('A33') === null ? 0 : 1,
            'A34' => $this->input->post('A34') === null ? 0 : 1,
            'F17' => $this->input->post('F17') === null ? 0 : 1,
            'F19' => $this->input->post('F19') === null ? 0 : 1,
            'F20' => $this->input->post('F20') === null ? 0 : 1,
            'F21' => $this->input->post('F21') === null ? 0 : 1,
            'F22' => $this->input->post('F22') === null ? 0 : 1,
            'F23' => $this->input->post('F23') === null ? 0 : 1,
            'F24' => $this->input->post('F24') === null ? 0 : 1,
            'F25' => $this->input->post('F25') === null ? 0 : 1,
            'F26' => $this->input->post('F26') === null ? 0 : 1,
            'F27' => $this->input->post('F27') === null ? 0 : 1,
            'F28' => $this->input->post('F28') === null ? 0 : 1,
            'F29' => $this->input->post('F29') === null ? 0 : 1,
            'F30' => $this->input->post('F30') === null ? 0 : 1,
            'F31' => $this->input->post('F31') === null ? 0 : 1,
            'F32' => $this->input->post('F32') === null ? 0 : 1,
            'F34' => $this->input->post('F34') === null ? 0 : 1,
            // Tujuan
            'L17' => $this->input->post('L17') === null ? 0 : 1,
            'L19' => $this->input->post('L19') === null ? 0 : 1,
            'L21' => $this->input->post('L21') === null ? 0 : 1,
            'L23' => $this->input->post('L23') === null ? 0 : 1,
            'L25' => $this->input->post('L25') === null ? 0 : 1,
            'L27' => $this->input->post('L27') === null ? 0 : 1,
            'L30' => $this->input->post('L30') === null ? 0 : 1,
            'L32' => $this->input->post('L32') === null ? 0 : 1,
            'L34' => $this->input->post('L34') === null ? 0 : 1,
            'L36' => $this->input->post('L36') === null ? 0 : 1,

        );

        $this->ins->update_disposisi($id_disposisi, $dataTwo);
        redirect('laporan');
        
    }

    function accept_surat($set, $ids)
    {
        $this->test->get_status_surat($set, $ids);
        redirect('list_surat');
    }
        
    /**
     * cetak_excel
     * merupakan fungsi dari proses untuk mencetak file disposisi 
     * dala format excel
     * @param  mixed $id_disposisi
     * @return void
     */
    function cetak_excel($id_disposisi)
    {

        $query = $this->view->join_disposisi($id_disposisi)->row_array(); 

        $template_path = './public/template/excel/template_form_disposisi.xlsx';
        $spreadsheet = IOFactory::load($template_path);
        $sheet = $spreadsheet->getActiveSheet();
        
        $sheet->setCellValue('E5', ucfirst($query['nomor_agenda']));
        $sheet->setCellValue('E6', $query['tanggal_penerimaan']);
        $sheet->setCellValue('E7', $query['tanggal_surat']);
        $sheet->setCellValue('E8', $query['dari']);
        $sheet->setCellValue('E9', $query['ringkasan_surat']);
        $sheet->setCellValue('E13', $query['lampiran']);
        $sheet->setCellValue('P5', $query['tanggal_penyelesaian']);

        if ($query['A17'] != 0) {
            $sheet->setCellValue('A17', '✓');
        }
        if ($query['A18'] != 0) {
            $sheet->setCellValue('A18', '✓');
        }
        if ($query['A19'] != 0) {
            $sheet->setCellValue('A19', '✓');
        }
        if ($query['A20'] != 0) {
            $sheet->setCellValue('A20', '✓');
        }
        if ($query['A21'] != 0) {
            $sheet->setCellValue('A21', '✓');
        }
        if ($query['A22'] != 0) {
            $sheet->setCellValue('A22', '✓');
        }
        if ($query['A23'] != 0) {
            $sheet->setCellValue('A23', '✓');
        }
        if ($query['A24'] != 0) {
            $sheet->setCellValue('A24', '✓');
        }
        if ($query['A25'] != 0) {
            $sheet->setCellValue('A25', '✓');
        }
        if ($query['A26'] != 0) {
            $sheet->setCellValue('A26', '✓');
        }
        if ($query['A27'] != 0) {
            $sheet->setCellValue('A27', '✓');
        }
        if ($query['A28'] != 0) {
            $sheet->setCellValue('A28', '✓');
        }
        if ($query['A29'] != 0) {
            $sheet->setCellValue('A29', '✓');
        }
        if ($query['A30'] != 0) {
            $sheet->setCellValue('A30', '✓');
        }
        if ($query['A31'] != 0) {
            $sheet->setCellValue('A31', '✓');
        }
        if ($query['A32'] != 0) {
            $sheet->setCellValue('A32', '✓');
        }
        if ($query['A33'] != 0) {
            $sheet->setCellValue('A33', '✓');
        }
        if ($query['A34'] != 0) {
            $sheet->setCellValue('A34', '✓');
        }
        if ($query['F17'] != 0) {
            $sheet->setCellValue('F17', '✓');
        }
        if ($query['F19'] != 0) {
            $sheet->setCellValue('F19', '✓');
        }
        if ($query['F20'] != 0) {
            $sheet->setCellValue('F20', '✓');
        }
        if ($query['F21'] != 0) {
            $sheet->setCellValue('F21', '✓');
        }
        if ($query['F22'] != 0) {
            $sheet->setCellValue('F22', '✓');
        }
        if ($query['F23'] != 0) {
            $sheet->setCellValue('F23', '✓');
        }
        if ($query['F24'] != 0) {
            $sheet->setCellValue('F24', '✓');
        }
        if ($query['F25'] != 0) {
            $sheet->setCellValue('F25', '✓');
        }
        if ($query['F26'] != 0) {
            $sheet->setCellValue('F26', '✓');
        }
        if ($query['F27'] != 0) {
            $sheet->setCellValue('F27', '✓');
        }
        if ($query['F28'] != 0) {
            $sheet->setCellValue('F28', '✓');
        }
        if ($query['F29'] != 0) {
            $sheet->setCellValue('F29', '✓');
        }
        if ($query['F30'] != 0) {
            $sheet->setCellValue('F30', '✓');
        }
        if ($query['F31'] != 0) {
            $sheet->setCellValue('F31', '✓');
        }
        if ($query['F32'] != 0) {
            $sheet->setCellValue('F32', '✓');
        }
        if ($query['F34'] != 0) {
            $sheet->setCellValue('F34', '✓');
        }
        // Tujuan
        if ($query['L17'] != 0) {
            $sheet->setCellValue('L17', '✓');
        }
        if ($query['L19'] != 0) {
            $sheet->setCellValue('L19', '✓');
        }
        if ($query['L21'] != 0) {
            $sheet->setCellValue('L21', '✓');
        }
        if ($query['L23'] != 0) {
            $sheet->setCellValue('L23', '✓');
        }
        if ($query['L25'] != 0) {
            $sheet->setCellValue('L25', '✓');
        }
        if ($query['L27'] != 0) {
            $sheet->setCellValue('L27', '✓');
        }
        if ($query['L30'] != 0) {
            $sheet->setCellValue('L30', '✓');
        }
        if ($query['L32'] != 0) {
            $sheet->setCellValue('L32', '✓');
        }
        if ($query['L34'] != 0) {
            $sheet->setCellValue('L34', '✓');
        }
        if ($query['L36'] != 0) {
            $sheet->setCellValue('L36', '✓');
        }
        // Tingkat Keamanan
        if ($query['Q6'] != 0) {
            $sheet->setCellValue('Q6', '✓');
        }
        if ($query['Q7'] != 0) {
            $sheet->setCellValue('Q7', '✓');
        }
        if ($query['Q8'] != 0) {
            $sheet->setCellValue('Q8', '✓');
        }
        if ($query['Q9'] != 0) {
            $sheet->setCellValue('Q9', '✓');
        }

       
        /* Excel File Format */
        $writer = new Xlsx($spreadsheet);
        $filename = 'LEMBAR_DISPOSISI' . date('dmy');
        
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
        header('Cache-Control: max-age=0');

        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save('php://output');

    }
    
    /**
     * cetak_pdf
     * merupakan fungsi untuk mendownload surat dalam 
     * format pdf
     * @param  mixed $id_surat
     * @return void
     */
    function cetak_pdf($id_surat)
    {
        $surat = $this->view->download_pdf($id_surat);

        if ($surat != NULL) {
         
         redirect('lampiran/'.$surat->lampiran);
            
        } else{
            redirect('laporan');
        }
    }

}

/* End of file Controllername.php */

?>