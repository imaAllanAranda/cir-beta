<?php

use Dotenv\Dotenv;

require_once __DIR__ . '../../../vendor/autoload.php';

defined('BASEPATH') or exit('No direct script access allowed');

header('Access-Control-Allow-Origin: *');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $dotenv = Dotenv::createImmutable(FCPATH);
        $dotenv->load();
    }

    public function index()
    {
        if (isset($_GET['token'])) {
            $this->load->view('admin/dashboard');
        } else {
            $this->load->view('admin/access_denied');
        }
    }

    public function create_cir()
    {
        if (isset($_GET['token'])) {
            $token = $this->checkToken($_GET['token']);

            if (1 == $token) {
                $data['adviser_list'] = $this->admin_model->adviser_list();
                
                $data['admin_adviser'] = $this->admin_model->admin_adviser();
                
                $data['report_number'] = $this->admin_model->report_number();
                $data['access_token'] = $_GET['token'];
                $data['user_details'] = $this->admin_model->getUserID($_GET['token']);
                $this->load->view('admin/create_cir', $data);
            } else {
                $this->load->view('admin/access_denied');
            }
        } else {
            $this->load->view('admin/access_denied');
        }
    }

    public function add_cir()
    {
        echo $this->admin_model->add_cir() ? 1 : 0;
    }

    public function cir_list()
    {
        if (isset($_GET['token'])) {
            $token = $this->checkToken($_GET['token']);

            if (1 == $token) {
                $data['cir_list'] = $this->admin_model->cir_list($_GET['token']);
                $data['adviser_list'] = $this->admin_model->adviser_list();
                $data['admin_adviser'] = $this->admin_model->admin_adviser();
                $data['access_token'] = $_GET['token'];
                $this->load->view('admin/cir_list', $data);
            } else {
                $this->load->view('admin/access_denied');
            }
        } else {
            $this->load->view('admin/access_denied');
        }
    }

    public function report_history(){
        $data['report'] = $this->admin_model->report_history();
        $data['user'] = $this->admin_model->getUserID($_GET['token']);

       // $print_r($data);
       // // print_r($data['report'][1]['name']);

        $htmlFooter = '
        <p style="font-size:9px;; text-align: justify; font-family: calibri;">Disclaimer: Eliteinsure has used reasonable endeavours to ensure the accuracy and completeness of the information provided but makes no warranties as to the accuracy or completeness of such information. The information should not be taken as advice. Eliteinsure accepts no responsibility for the results of any omissions or actions taken on basis of this information. This report includes commercially sensitive information. Accordingly, it may be used for the purpose provided; may not be disclosed to any third party; and will be subject to any obligation of confidence owed by the recipient under contract or otherwise.</p><footer>
        <div class="footer" style="font-size:6pt;">
        <img src="assets/admin/img/logo.png" alt="eliteinsure" class="logo" width="200"/>
        <div style="margin-left:520px; margin-top:-15px;" >
        <a style="font-size:11px;" href="https://eliteinsure.co.nz" class="footer-link" target="_blank">
        www.eliteinsure.co.nz
        </a>&nbsp;|&nbsp;Page
        {PAGENO}
        </div>
        </div>
        </footer>';

        $mpdf = new \Mpdf\Mpdf();
        $report = $this->load->view('admin/report_history', $data, true);
        $mpdf->SetHTMLFooter($htmlFooter);
        $mpdf->WriteHTML($report);
        $mpdf->Output();
    }

    public function report_details()
    {
        $access = $this->admin_model->getStatus($_GET['report_number']);

        if (1 == $access) {
            $data['report_details_cir'] = $this->admin_model->report_details();
            $data['report_details_identified'] = $this->admin_model->report_details_identified();
            $data['report_details_address'] = $this->admin_model->report_details_address();
            $data['reportHistory'] = $this->admin_model->reportHistory($_GET['report_number']);
            $data['comp_rep'] = $this->admin_model->comp_rep($_GET['report_number']);
            $data['cir_max'] = $this->admin_model->cir_max();
            $this->load->view('admin/report_details', $data);
        } else {
            $this->load->view('admin/access_denied');
        }
    }

    public function access_denied()
    {
        $this->load->view('admin/access_denied');
    }

    public function provide_password()
    {
        $this->load->view('admin/provide_password');
    }

    public function submit_password()
    {
        echo $this->admin_model->submit_password() ? 1 : 0;
    }

    public function answer_question()
    {
        echo $this->admin_model->answer_question() ? 1 : 0;
    }

    public function company_response()
    {
        echo $this->admin_model->company_response() ? 1 : 0;
    }

    public function adviser_response()
    {
        echo $this->admin_model->adviser_response() ? 1 : 0;
    }

    public function action_response()
    {
        $data = $this->admin_model->action_response() ? 1 : 0;

        $this->send_to_director();

        echo 1;
    }

    public function submit_login()
    {
        echo $this->admin_model->submit_login();
    }

    public function getHistory()
    {
        echo json_encode($this->admin_model->getHistory());
    }

    public function report(){
        $data['report_details_cir'] = $this->admin_model->report_details();
        $data['report_details_identified'] = $this->admin_model->report_details_identified();
        $data['report_details_address'] = $this->admin_model->report_details_address();
        $data['reportHistory'] = $this->admin_model->reportHistory($_GET['report_number']);
        $data['comp_rep'] = $this->admin_model->comp_rep($_GET['report_number']);
        $data['cir_max'] = $this->admin_model->cir_max();

        $this->load->view('admin/report',$data);
    }

    public function Compliance_Report()
    {
        $_SERVER['REQUEST_METHOD'] = 'POST';
        $_POST['report_number'] = $_GET['report_number'];

        $data['report_details_cir'] = $this->admin_model->report_details();
        $data['report_details_identified'] = $this->admin_model->report_details_identified();
        $data['report_details_address'] = $this->admin_model->report_details_address();
        $data['reportHistory'] = $this->admin_model->reportHistory($_GET['report_number']);
        $data['cir_max'] = $this->admin_model->cir_max();
        $data['comp_rep'] = $this->admin_model->comp_rep($_GET['report_number']);

        $htmlFooter = '
        <footer>
        <div class="footer" style="font-size:6pt;">
        <img src="assets/admin/img/logo.png" alt="eliteinsure" class="logo" width="200"/>
        <div style="margin-left:520px; margin-top:-15px;" >
        <a style="font-size:11px;" href="https://eliteinsure.co.nz" class="footer-link" target="_blank">
        www.eliteinsure.co.nz
        </a>&nbsp;|&nbsp;Page
        {PAGENO}
        </div>
        </div>
        </footer>';

        $mpdf = new \Mpdf\Mpdf();
        $cirtemplate = $this->load->view('admin/cirtemplate', $data, true);
        $mpdf->SetHTMLFooter($htmlFooter);
        $mpdf->WriteHTML($cirtemplate);

        $addresstemplate = $this->load->view('admin/addresstemplate', $data, true);

        $mpdf->SetHTMLFooter($htmlFooter);
        $mpdf->AddPage('P');
        $mpdf->WriteHTML($addresstemplate);

        $representative = $this->load->view('admin/representative', $data, true);
        $mpdf->SetHTMLFooter($htmlFooter);
        $mpdf->AddPage('P');
        $mpdf->WriteHTML($representative);

        $adviserresponse = $this->load->view('admin/adviserresponse', $data, true);
        $mpdf->SetHTMLFooter($htmlFooter);
        $mpdf->AddPage('P');
        $mpdf->WriteHTML($adviserresponse);

        $actionresponse = $this->load->view('admin/actionresponse', $data, true);
        $mpdf->SetHTMLFooter($htmlFooter);
        $mpdf->AddPage('P');
        $mpdf->WriteHTML($actionresponse);

        $followup = $this->load->view('admin/followup', $data, true);
        $mpdf->SetHTMLFooter($htmlFooter);
        $mpdf->AddPage('P');
        $mpdf->WriteHTML($followup);

        $final = $this->load->view('admin/finalisation', $data, true);
        $mpdf->SetHTMLFooter($htmlFooter);
        $mpdf->AddPage('P');
        $mpdf->WriteHTML($final);


        if (1 == $_GET['download']) {
            $mpdf->Output('Report.pdf', 'D');
        } else {
           $mpdf->SetHTMLFooter($htmlFooter);
           $mpdf->Output();
       }
   }

   public function send_to_director()
   {
    $_SERVER['REQUEST_METHOD'] = 'GET';
    $_GET['report_number'] = $this->input->post('report_number');
        //$type = $this->input->post('type');

    $data['report_details_cir'] = $this->admin_model->report_details();
    $data['report_details_identified'] = $this->admin_model->report_details_identified();
    $data['report_details_address'] = $this->admin_model->report_details_address();
    $data['reportHistory'] = $this->admin_model->reportHistory($_GET['report_number']);
    $data['cir_max'] = $this->admin_model->cir_max();
    $data['comp_rep'] = $this->admin_model->comp_rep($_GET['report_number']);

    $htmlFooter = '
    <footer>
    <div class="footer" style="font-size:6pt;">
    <img src="assets/admin/img/logo.png" alt="eliteinsure" class="logo" width="200"/>
    <div style="margin-left:520px; margin-top:-15px;" >
    <a style="font-size:11px;" href="https://eliteinsure.co.nz" class="footer-link" target="_blank">
    www.eliteinsure.co.nz
    </a>&nbsp;|&nbsp;Page
    {PAGENO}
    </div>
    </div>
    </footer>';

    $mpdf = new \Mpdf\Mpdf();
    $cirtemplate = $this->load->view('admin/cirtemplate', $data, true);
    $mpdf->SetHTMLFooter($htmlFooter);
    $mpdf->WriteHTML($cirtemplate);

    $addresstemplate = $this->load->view('admin/addresstemplate', $data, true);

    $mpdf->SetHTMLFooter($htmlFooter);
    $mpdf->AddPage('P');
    $mpdf->WriteHTML($addresstemplate);

    $representative = $this->load->view('admin/representative', $data, true);
    $mpdf->SetHTMLFooter($htmlFooter);
    $mpdf->AddPage('P');
    $mpdf->WriteHTML($representative);

    $adviserresponse = $this->load->view('admin/adviserresponse', $data, true);
    $mpdf->SetHTMLFooter($htmlFooter);
    $mpdf->AddPage('P');
    $mpdf->WriteHTML($adviserresponse);

    $actionresponse = $this->load->view('admin/actionresponse', $data, true);
    $mpdf->SetHTMLFooter($htmlFooter);
    $mpdf->AddPage('P');
    $mpdf->WriteHTML($actionresponse);

    $followup = $this->load->view('admin/followup', $data, true);
    $mpdf->SetHTMLFooter($htmlFooter);
    $mpdf->AddPage('P');
    $mpdf->WriteHTML($followup);

    $final = $this->load->view('admin/finalisation', $data, true);
    $mpdf->SetHTMLFooter($htmlFooter);
    $mpdf->AddPage('P');
    $mpdf->WriteHTML($final);

    $content = $mpdf->Output('', 'S');

    $this->db->select('*')->from('ta_cir');
    $this->db->where('report_number', $this->input->post('report_number'));

    $query1 = $this->db->get();
    $data = $query1->row_array();
    $type = $data['type'];

    $this->db->select('lpad(MAX(report_number),4,"0") as report_number,representative_id,type,date_created')->from('ta_cir');
    $this->db->where('report_number', $_GET['report_number']);

    $getCIR = $this->db->get();
    $data = $getCIR->row_array();
    $textReportNum = $data['report_number'];
    $dataYear = $data['date_created'];
    if($type == 0){
        $subject = "Final Report for Incident Report(IR".date('Y', strtotime($dataYear)).$textReportNum.")";
    }else{
        $subject = "Final Report for Compliance Investigation Report(CIR".date('Y', strtotime($dataYear)).$textReportNum.")";
    }

    $attachment = (new Swift_Attachment($content, $subject, 'application/pdf'));


    $info['step'] = 5;
    $info['subject'] = $subject;
    $info['type'] = $type;
    $bodyMessage = $this->load->view('admin/email_template',$info,true);


    $message = new Swift_Message();
    $message->setSubject($subject);

    $message->setFrom([$_ENV['MAIL_FROM_ADDRESS'] => $_ENV['MAIL_FROM_NAME']]);
    $message->setTo('jeaniva@eliteinsure.co.nz');

    //$message->setBcc(array('allanaranda4@gmail.com' => 'Admin'));

    $message->setBody($bodyMessage);

    $message->setContentType("text/html");

    $message->attach($attachment);

    if ($_ENV['MAIL_BCC']) {
        $bcc = [];

        $mails = explode(';', $_ENV['MAIL_BCC']);

        foreach ($mails as $mail) {
            $parts = explode(',', $mail);

            $bcc[$parts[0]] = $parts[1];
        }

        $message->setBcc($bcc);
    }

    $transport = (new Swift_SmtpTransport($_ENV['MAIL_HOST'], $_ENV['MAIL_PORT']))
    ->setUsername($_ENV['MAIL_USERNAME'])
    ->setPassword($_ENV['MAIL_PASSWORD']);

        // Create the Mailer using your created Transport
    $mailer = new Swift_Mailer($transport);

        // Send the created message
    $isSent = $mailer->send($message);
}

public function checkToken($token)
{
    return $this->admin_model->checkToken($token) ? 1 : 0;
}
public function delete_cir(){
    return $this->admin_model->delete_cir() ? 1 : 0;
}

public function generatepdf(){

    $subject = 'Nzoia Price Quotation';
    if($_GET['invoice'] == 1){
       $invoice = $this->admin_model->insertInvoice($_GET['name'],$_GET['email']);
       $subject = "Nzoia Tax Invoice";
    }

    $data['invoice_number'] = $invoice;
    $data['name'] =  $_GET['name'];
    $data['type'] = $_GET['type'];
    $data['qty'] = $_GET['qty'];
    $data['price'] = $_GET['price'];
    $data['email'] = $_GET['email'];
    $data['contact'] = $_GET['contact'];
    $data['note'] = $_GET['note'];
    $data['quoteType'] = $_GET['quoteType'];
    $data['invoice'] = $_GET['invoice'];

    $mpdf = new \Mpdf\Mpdf();
    $final = $this->load->view('admin/quotation',$data,true);


    $htmlFooter = '
        <footer>
        <div  class="footer" style="font-size:6pt; color:white;">
            <div style="font-size: 11px; z-index: 2;">
                <p><span style="font-weight:bold; font-size:12px;">NZOIA Auto Spares Ltd</span>.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span><a style="z-index: 2; font-size:11px; font-weight:normal; color:white;" href="https://nzoiaautospares.com/" class="footer-link" target="_blank">
                www.nzoiaautospares.com
                </a>&nbsp;|&nbsp;Page {PAGENO}</span></p>
            </div>
            <div >
            </div>  
        </div>
        </footer>';

    $mpdf->SetHTMLFooter($htmlFooter);
    $mpdf->AddPage('P');
    $mpdf->WriteHTML($final);

    $mpdf->Output($subject, 'I');

    if($_GET['sendEmail'] == 1){

        $content = $mpdf->Output('', 'S'); 

        $attachment = (new Swift_Attachment($content, $subject, 'application/pdf'));


        $message = new Swift_Message();
        $message->setSubject($subject);

        $message->setFrom([$_ENV['MAIL_FROM_ADDRESS_NZOIA'] => $_ENV['MAIL_FROM_NAME_NZOIA']]);
        $message->setTo($_GET['email']);

        $message->setBcc(array('nzoia@eliteinsure.co.nz' => 'Admin'));

        $message->setBody('Please see attached file');

        $message->attach($attachment);

        if ($_ENV['MAIL_BCC']) {
            $bcc = [];

            $mails = explode(';', $_ENV['MAIL_BCC']);

            foreach ($mails as $mail) {
                $parts = explode(',', $mail);

                $bcc[$parts[0]] = $parts[1];
            }

            $message->setBcc($bcc);
        }

        $transport = (new Swift_SmtpTransport($_ENV['MAIL_HOST'], $_ENV['MAIL_PORT']))
        ->setUsername($_ENV['MAIL_USERNAME'])
        ->setPassword($_ENV['MAIL_PASSWORD']);

        // Create the Mailer using your created Transport
        $mailer = new Swift_Mailer($transport);

        // Send the created message
        $isSent = $mailer->send($message);      
        }
    
    }
    public function email_template(){

        $data['name'] = 'Allan Aranda';
        $data['link'] = 'Link';
        $data['password'] = 'asdsad';

        $this->load->view('admin/email_template',$data);
    }
}




