<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require FCPATH.'vendor/autoload.php';
class Receipt extends CI_Controller
{
   
    function __construct() { 
        parent::__construct();
        error_reporting(1);
         $this->load->database();
         $this->load->helper('url');


         }

    

    public function home()
      {
    // Pass data to view
        $this->load->view('home');
      }

    public function search_data() {
    $query = $this->input->post('query');
    $result = $this->db->select('*')->from('pdf_form_data')->where('certificate_number', $query)->get()->result();
    echo json_encode($result);

    }  

   public function print($certificate_number='')
    {
        // Load model
        $this->load->model('Pdf_model');
        // Fetch customer data
        $customer = $this->Pdf_model->get_customer_by_id($certificate_number);
        // Pass data to view
        $data['customer'] = $customer;
        // Load view with data
        $html = $this->load->view('receipt_pdf', $data, true);

        // Generate PDF
        $mpdf = new \Mpdf\Mpdf([
        'mode' => 'utf-8',
        'orientation' => 'P',
        'format'=>'A4',
        'margin_top'=>0,
        'margin_right'=>0,
        'margin_left'=>0,
        'margin_bottom'=>0,
        'autoLangToFont' => true,
        'autoScriptToLang' => true,
        ]);
        // Set the font directory
        $mpdf->SetBasePath(__DIR__ . '/fonts/');

        // Set the font for Urdu language
        $mpdf->fontdata['ur'] = [
        'R' => 'NotoNastaliqUrdu-Regular.ttf',
        'useOTL' => 0xFF,
        'useKashida' => 75,
        ];

        // Set the font for Arabic language
        $mpdf->fontdata['ar'] = [
        'R' => 'Amiri-Regular.ttf',
        'useOTL' => 0xFF,
        'useKashida' => 75,
        ];
        $mpdf->autoLangToFont = true;
        $mpdf->WriteHTML($html);
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="certificate.pdf"');
        $mpdf->Output('certificate.pdf', 'D');
    }


    public function trainee_print($certificate_no='')
    {
        // Load model
        $this->load->model('Pdf_model');
        // Fetch customer data
        $customer = $this->Pdf_model->get_trainee_by_id($certificate_no);
        // Pass data to view
        $data['customer'] = $customer;
        // Load view with data
        $html = $this->load->view('trainee_receipt_pdf', $data, true);

        // Generate PDF
        $mpdf = new \Mpdf\Mpdf([
        'mode' => 'utf-8',
        'orientation' => 'P',
        'format'=>'A4',
        'margin_top'=>0,
        'margin_right'=>0,
        'margin_left'=>0,
        'margin_bottom'=>0,
        'autoLangToFont' => true,
        'autoScriptToLang' => true,
        ]);
        // Set the font directory
        $mpdf->SetBasePath(__DIR__ . '/fonts/');

        // Set the font for Urdu language
        $mpdf->fontdata['ur'] = [
        'R' => 'NotoNastaliqUrdu-Regular.ttf',
        'useOTL' => 0xFF,
        'useKashida' => 75,
        ];

        // Set the font for Arabic language
        $mpdf->fontdata['ar'] = [
        'R' => 'Amiri-Regular.ttf',
        'useOTL' => 0xFF,
        'useKashida' => 75,
        ];
        $mpdf->autoLangToFont = true;
        $mpdf->WriteHTML($html);
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="trainee_certificate.pdf"');
        $mpdf->Output('', 'I');
    }

     public function id_card_print($id_no='')
    {
        // Load model
        $this->load->model('Pdf_model');
        // Fetch customer data
        $customer = $this->Pdf_model->get_id_card_generator($id_no);
        // Pass data to view
        $data['customer'] = $customer;
        //echo "<pre>";
       // print_r($data['customer']);
        //echo "</pre>";die();
        // Load view with data
        $html = $this->load->view('id_card_receipt_pdf', $data, true);

        // Generate PDF

        $mpdf = new \Mpdf\Mpdf([
        'mode' => 'utf-8',
        'orientation' => 'P',
        'format'=>[105, 70],
        'margin_top'=>0,
        'margin_right'=>0,
        'margin_left'=>0,
        'margin_bottom'=>0,
        'autoLangToFont' => true,
        'autoScriptToLang' => true,
        ]);
        // Set the font directory
        $mpdf->SetBasePath(__DIR__ . '/fonts/');

        // Set the font for Urdu language

        $mpdf->fontdata['ur'] = [
        'R' => 'NotoNastaliqUrdu-Regular.ttf',
        'useOTL' => 0xFF,
        'useKashida' => 75,
        ];

        // Set the font for Arabic language
        $mpdf->fontdata['ar'] = [
        'R' => 'Amiri-Regular.ttf',
        'useOTL' => 0xFF,
        'useKashida' => 75,
        ];
        $mpdf->autoLangToFont = true;
        $mpdf->WriteHTML($html);
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="trainee_certificate.pdf"');
        $mpdf->Output('', 'I');
    }

    

}

?>