<?php

use Dotenv\Dotenv;

require_once __DIR__ . '../../../vendor/autoload.php';

defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $dotenv = Dotenv::createImmutable(FCPATH);
        $dotenv->load();
    }

    public function report_history(){
        
        $adviser_id = $_GET['adviser_id'];
        $date_from = $_GET['date_from'];
        $date_to = $_GET['date_to'];
        $status = $_GET['status'];
        $type = $_GET['type'];

        $this->db->select('*,lpad(a.report_number,4,"0") as report_numbers,a.status as cir_status')->from('ta_cir a');
        $this->db->join('advisers b', 'b.id = a.adviser_id', 'left');
        $this->db->where('a.type', $type);


        if (!str_contains($adviser_id, 'all')) {
            $this->db->where('adviser_id in ('.$adviser_id.')');   
        }

        if (!str_contains($status, 'all')) {
            $this->db->where('a.status', $_GET['status']);  
        }


        $this->db->where('b.name !=', "");
        $this->db->where("date_created BETWEEN '$date_from' AND '$date_to'");

        //print_r($this->db);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return 0;
        }      
    }

   

    public function adviser_list()
    {
        $this->db->select('*')->from('advisers');
        $this->db->where('type', 'Adviser');
        $this->db->order_by('name', 'asc');
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return 0;
        }
    }

     public function admin_adviser()
    {
        $type = array('Staff','Management');
        $this->db->select('*')->from('advisers');
        $this->db->where_in('type', $type);
        $this->db->order_by('name', 'asc');
        $query = $this->db->get();

        // $db2 = $this->load->database('second', TRUE);
        // $query = $db2->query("SELECT * FROM ei_test.ta_user a WHERE a.id_user IN (SELECT MAX(id_user) FROM ta_user WHERE id_user != '1' and email_address like '%eliteinsure.co.nz' and id_user_type not in ('2','7','8') GROUP BY email_address) AND a.status = '1'  ORDER BY a.first_name");

        // if ($query->num_rows() > 0) {
        //     return $query->result_array();
        // } else {
        //     return 0;
        // }

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return 0;
        }
    }

    public function report_number()
    {
        $this->db->select('lpad(IFNULL(MAX(report_number),0)+1,4,"0") as report_number')->from('ta_cir');
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return 0;
        }
    }

    public function add_cir()
    {
        $link_password = $this->generateRandomString();
        
        $data = array(
                'report_number' => $this->input->post('report_number'),
                'send_date' => $this->input->post('send_date'),
                'due_date' => $this->input->post('due_date'),
                'investigation_information' => $this->input->post('investigation_information'),
                'adviser_id' => $this->input->post('adviser_id'),
                'link_password' => $link_password,
                'representative_id' => $this->input->post('representative_id'),
                'type' =>  $this->input->post('type'),
        ); 

        $res = $this->db->insert('ta_cir', $data);
        $uid = $this->db->insert_id();
        $token = $this->input->post('token');
        $type = $this->input->post('type');

        $issue_address = $this->input->post('issue_address');

        foreach ($issue_address as $value) {
            $data = array(
                'report_number' => $uid,
                'issue_address' => $value,
            );
            $res = $this->db->insert('ta_cir_address', $data);
        }

        $issue_identified = $this->input->post('issue_identified');

        foreach ($issue_identified as $value) {
            $data = array(
                'report_number' => $uid,
                'issue_identified' => $value,
            );
            $res = $this->db->insert('ta_cir_identified', $data);
        }

        $this->db->select('*')->from('advisers');
        $this->db->where('id', $this->input->post('adviser_id'));

        $getEmail = $this->db->get();
        $data = $getEmail->row_array();
        $email = $data['email'];
        $adviser_name = $data['name'];



        $this->db->select('lpad(MAX(report_number),4,"0") as report_number,representative_id,type')->from('ta_cir');
        $this->db->where('report_number', $uid);

        $getCIR = $this->db->get();
        $data = $getCIR->row_array();
        $textReportNum = $data['report_number'];

        if($type == 0){
            $text = "";
            $subject = "Incident Report(IR2021".$textReportNum.")";
            $system = "Incident Report";
        }else{
            $subject = "CIR";
            $text = "adviser";
            $system = "Compliance Investigation Report";
        }


        $link = base_url() . 'admin/provide_password?report_number=' . $uid . '&user_type=1&type=' .$type;

        $bodyMessage = '
Hi '.$text.' ' . $adviser_name . ',

Please be informed that a '.$system.' is being lodged by Eliteinsure representative. We will need your cooperation to complete the investigation. 

Kindly click the link below to answer questions from the company representative: 

' . $link . '

Link Password: ' . $link_password . '

Eliteinsure Admin Team';

        $this->sendEmail($subject, $email, $link_password, $link, $adviser_name, $bodyMessage);

        return 1;
    }

    public function submit_password()
    {
        $this->db->select('*')->from('ta_cir');
        $this->db->where('link_password', $this->input->post('password'));
        $this->db->where('report_number', $this->input->post('report_number'));
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $data = array('access_status' => 1);
            $this->db->where('report_number', $this->input->post('report_number'));
            $res = $this->db->update('ta_cir', $data);

            return 1;
        } else {
            return 0;
        }
    }

    public function report_details()
    {
        $this->db->select('*, a.type as systype ')->from('ta_cir a');
        $this->db->join('advisers b', 'b.id = a.adviser_id', 'left');
        $this->db->where('report_number', $_GET['report_number']);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return 0;
        }
    }

    public function report_details_identified()
    {
        $this->db->select('*')->from('ta_cir_identified');
        $this->db->where('report_number', $_GET['report_number']);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return 0;
        }
    }

    public function report_details_address()
    {
        $this->db->select('*')->from('ta_cir_address');
        $this->db->where('report_number', $_GET['report_number']);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return 0;
        }
    }

    public function cir_max()
    {
        $this->db->select('lpad(MAX(report_number),4,"0") as report_number')->from('ta_cir');
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return 0;
        }
    }

    public function answer_question()
    {
        $id_question = $this->input->post('id_question');
        $answer_question = $this->input->post('answer_question');

        for ($i = 0; $i < count($id_question); $i++) {
            $data = array('adviser_answer' => $answer_question[$i]);

            $this->db->where('id_question', $id_question[$i]);
            $res = $this->db->update('ta_cir_address', $data);
        }

        $report_number = $this->input->post('report_number');
        $type = $this->input->post('type');

        $data = array(
            'to_address' => 1,
        );

        $this->db->where('report_number', $report_number);
        $res = $this->db->update('ta_cir', $data);

        $this->db->select('lpad(MAX(report_number),4,"0") as report_number,representative_id,type')->from('ta_cir');
        $this->db->where('report_number', $report_number);

        $getCIR = $this->db->get();
        $data = $getCIR->row_array();
        $rep_id = $data['representative_id'];
        $textReportNum = $data['report_number'];
        $type = $data['type'];

        $this->db->select('*')->from('users');
        $this->db->where('id', $rep_id);

        $getEmail = $this->db->get();
        $data = $getEmail->row_array();
        $token = $this->input->post('token');
        $email = $data['email'];
        $adviser_name = $data['name'];


      if($type == 0){
            $text = "";
            $subject = "Incident Report(IR2021".$textReportNum.")";
            $system = "Incident Report";
            $user = "Contractor/Employee";
            $number = "IR2021";
            $second = 0;
        }else{
            $user = "Adviser";
            $subject = "CIR";
            $text = "adviser";
            $number = "CIR2021";
            $second = 1;
            $system = "Compliance Investigation Report";
        }

           $link = base_url() . 'admin/provide_password?report_number=' . $report_number . '&user_type=0&type='.$type;

        $bodyMessage = '
Dear Eliteinsure Representative,
    
'.$user.' subject to Report Number '.$number.'' . $textReportNum . ' has replied to your questions. Please click the link below to continue the investigation. 

' . $link . '

Eliteinsure Admin Team';

        $this->sendEmail($subject,$email, '', $link, $adviser_name, $bodyMessage);

        $data = array('access_status' => 0);
        $this->db->where('report_number', $this->input->post('report_number'));
        $res = $this->db->update('ta_cir', $data);

        return 1;
    }

    public function company_response()
    {
        $link_password = $this->generateRandomString();

        $report_number = $this->input->post('report_number');
        $company_response = $this->input->post('company_response');
        $type = $this->input->post('type');

        $data = array(
            'rep_response' => $company_response,
            'link_password' => $link_password,
        );

        $this->db->where('report_number', $report_number);
        $res = $this->db->update('ta_cir', $data);

        $this->db->select('lpad(MAX(report_number),4,"0") as report_number,adviser_id')->from('ta_cir');
        $this->db->where('report_number', $report_number);

        $getCIR = $this->db->get();
        $data = $getCIR->row_array();
        $rep_id = $data['adviser_id'];
        $textReportNum = $data['report_number'];

        $this->db->select('*')->from('advisers');
        $this->db->where('id', $rep_id);

        $getEmail = $this->db->get();
        $token = $this->input->post('token');
        $data = $getEmail->row_array();

        $email = $data['email'];
        $adviser_name = $data['name'];

        if($type == 0){
            $text = "";
            $subject = "Incident Report(IR2021".$textReportNum.")";
            $system = "Incident Report";
            $user = "Contractor/Employee";
            $number = "IR2021";
        }else{
            $user = "Adviser";
            $subject = "CIR";
            $text = "adviser";
            $number = "CIR2021";
            $system = "Compliance Investigation Report";
        }


        $link = base_url() . 'admin/provide_password?report_number=' . $report_number . '&user_type=1&type='.$type;

        $bodyMessage = '
Dear '.$adviser_name.',
        
In reference to '.$system.' no. '.$number.'' . $textReportNum . ' being conducted, please click the link below and provide your response.  

' . $link . '

Link Password: ' . $link_password . '

Eliteinsure Admin Team';

        $this->sendEmail($subject,$email, $link_password, $link, $adviser_name, $bodyMessage);

        $data = array('access_status' => 0);
        $this->db->where('report_number', $this->input->post('report_number'));
        $res = $this->db->update('ta_cir', $data);

        return 1;
    }

    public function adviser_response()
    {
        $report_number = $this->input->post('report_number');
        $adviser_response = $this->input->post('adviser_response');
        $adv_signature = $this->input->post('adv_signature');
        $type = $this->input->post('type');

        $data = array(
            'adv_response' => $adviser_response,
            'adv_signature' => $adv_signature,
            'adv_response_date' => date('Y-m-d'),
        );

        $this->db->where('report_number', $report_number);
        $res = $this->db->update('ta_cir', $data);

        $this->db->select('lpad(MAX(report_number),4,"0") as report_number,representative_id')->from('ta_cir');
        $this->db->where('report_number', $report_number);

        $getCIR = $this->db->get();
        $data = $getCIR->row_array();
        $rep_id = $data['representative_id'];
        $textReportNum = $data['report_number'];

        $this->db->select('*')->from('users');
        $this->db->where('id', $rep_id);

        $getEmail = $this->db->get();
        $token = $this->input->post('token');
        $data = $getEmail->row_array();

        $email = $data['email'];
        $adviser_name = $data['name'];

        if($type == 0){
            $text = "";
            $subject = "Incident Report(IR2021".$textReportNum.")";
            $system = "Incident Report";
            $user = "Contractor/Employee";
            $number = "IR2021";
        }else{
            $user = "Adviser";
            $subject = "CIR";
            $text = "adviser";
            $number = "CIR2021";
            $system = "Compliance Investigation Report";
        }


        $link = base_url() . 'admin/provide_password?report_number=' . $report_number . '&user_type=0&type='.$type;

        $bodyMessage = '
Dear Eliteinsure Representative,
    
'.$user.' subject to Report Number '.$number.'' . $textReportNum . ' has replied to your questions. Please click the link below to continue the investigation. 

' . $link . '

Eliteinsure Admin Team';

       $this->sendEmail($subject,$email, '', $link, $adviser_name, $bodyMessage);

        $data = array('access_status' => 0);
        $this->db->where('report_number', $this->input->post('report_number'));
        $res = $this->db->update('ta_cir', $data);

        return 1;
    }

    public function action_response()
    {
        $report_number = $this->input->post('report_number');
        $action_response = $this->input->post('action_response');
        $satisfactorily = $this->input->post('satisfactorily');
        $if_not = $this->input->post('if_not');
        $finalisation = $this->input->post('finalisation');
        $signature = $this->input->post('signature');

        $data = array(
            'rep_action' => $action_response,
            'satisfactory' => $satisfactorily,
            'if_not' => $if_not,
            'finalisation' => $finalisation,
            'rep_signature' => $signature,
            'rep_response_date' => date('Y-m-d'),
            'status' => 1,
        );

        $this->db->where('report_number', $report_number);
        $res = $this->db->update('ta_cir', $data);

        return 1;
    }

    public function submit_login()
    {
        $this->db->select('*')->from('ta_cir');
        $this->db->where('report_number', $this->input->post('report_number'));

        $getEmail = $this->db->get();
        $data = $getEmail->row_array();
        $rep_id = $data['representative_id'];

        $this->db->select('*')->from('users');
        $this->db->where('id', $rep_id);
        $query = $this->db->get();
        $data = $query->row_array();
        $pass = $data['password'];
        $email = $data['email'];

        $password = $this->input->post('password');

        if ($this->bcrypt->check_password($password, $pass) && $email == $this->input->post('email')) {
            $data = array('access_status' => 1);
            $this->db->where('report_number', $this->input->post('report_number'));
            $res = $this->db->update('ta_cir', $data);

            return 1;
        } else {
            return 0;
        }
    }

    public function generateRandomString($length = 5)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';

        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        return $randomString;
    }

    public function sendEmail($subject,$email, $password, $link, $adviser_name, $bodyMessage)
    {
        $message = new Swift_Message();
        $message->setSubject($subject);

        $message->setFrom([$_ENV['MAIL_FROM_ADDRESS'] => $_ENV['MAIL_FROM_NAME']]);
        $message->setTo($email);

        $message->setBody($bodyMessage);

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

    public function getHistory()
    {


        $this->db->select('lpad(report_number,4,"0") as report_number')->from('ta_cir');
        $this->db->where('adviser_id', $this->input->post('adviser_id'));
        $this->db->where('type', $this->input->post('type'));

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return 0;
        }
    }

    public function reportHistory($report_number)
    {
        $this->db->select('*')->from('ta_cir');
        $this->db->where('report_number', $_GET['report_number']);

        $query1 = $this->db->get();
        $data = $query1->row_array();
        $adviser_id = $data['adviser_id'];
        $type = $data['type'];
        
        $this->db->select('lpad(report_number,4,"0") as report_number')->from('ta_cir');
        $this->db->where('adviser_id', $adviser_id);
        $this->db->where('report_number !=', $_GET['report_number']);
        $this->db->where('type', $type);
        
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return 0;
        }
    }

    public function cir_list($token)
    {
        $this->db->select('*,d.name AS role')->from('personal_access_tokens a');
        $this->db->join('users b', 'b.id = a.tokenable_id', 'left');
        $this->db->join('model_has_roles c', 'b.id = c.model_id', 'left');
        $this->db->join('roles d', 'd.id = c.role_id', 'left');
        $this->db->where('token', $token);
        $this->db->where('token', $token);

       

        $type = $_GET['type'];

        $query = $this->db->get();
        $data = $query->row_array();
        $id = $data['tokenable_id'];
        $role = $data['role'];

        $this->db->select('lpad(a.report_number,4,"0") as report_number,a.adviser_id,a.type ,a.send_date,a.due_date,a.representative_id,a.report_number as id,a.status,b.name,c.name as adv_name')->from('ta_cir a');
        $this->db->join('users b', 'b.id = a.representative_id', 'left');
        $this->db->join('advisers c', 'c.id = a.adviser_id', 'left');
        $this->db->where('report_number !=', '0');
        $this->db->where('a.type', $type);

        if ('admin' != $role) {
            $this->db->where('representative_id', $id);
        }

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return 0;
        }
    }

    public function checkToken($token)
    {
        $this->db->select('*')->from('personal_access_tokens');
        $this->db->where('token', $token);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return 0;
        }
    }

    public function getUserID($token)
    {
        $this->db->select('*')->from('personal_access_tokens a');
        $this->db->join('users b', 'b.id = a.tokenable_id', 'left');
        $this->db->where('token', $token);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return 0;
        }
    }

    public function comp_rep($report_number)
    {
        $this->db->select('lpad(MAX(report_number),4,"0") as report_number,representative_id')->from('ta_cir');
        $this->db->where('report_number', $report_number);

        $getCIR = $this->db->get();
        $data = $getCIR->row_array();
        $rep_id = $data['representative_id'];

        $this->db->select('*')->from('users');
        $this->db->where('id', $rep_id);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return 0;
        }
    }

    public function getStatus($report_number)
    {
        $this->db->select('*')->from('ta_cir');
        $this->db->where('report_number', $report_number);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $data = $query->row_array();

            return $data['access_status'];
        } else {
            return 0;
        }
    }
    public function delete_cir(){
        $this->db->where('report_number', $this->input->post('report_number'));
        $res = $this->db->delete('ta_cir');

        $this->db->where('report_number', $this->input->post('report_number'));
        $res = $this->db->delete('ta_cir_identified');

        $this->db->where('report_number', $this->input->post('report_number'));
        $res = $this->db->delete('ta_cir_address');

        return 1;
    }

}
