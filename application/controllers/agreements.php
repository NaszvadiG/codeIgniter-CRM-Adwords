<?php
/**
 * Created by PhpStorm.
 * User: Brazdys
 * Date: 12/10/2016
 * Time: 00:09
 */
class Agreements extends CI_Controller{
    public function __construct() {
        parent::__construct();
// Load session library
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->library('word');
// Load database
        $this->load->model('client_database');
        $this->load->model('agreement_database');

    }
    public function index(){
        $data = $this->agreement_database->getAgreements();
        if($data)
        {
            foreach($data as $agreement)
            {
                $client = $this->client_database->getClientById($agreement->client_agreement_id);
                $agreement->client_name = $client[0]->name;
            }
            $agreements = array('agreements'=>$data);
            $this->load->view('agreements/agreements', $agreements);
        }
        else{
            $this->load->view('agreements/no_agreements');
        }
    }
    public function generateAgreement(){
        $clientData = $this->client_database->getClientById($this->input->post("client_id"));
        $clientData = $clientData[0];
        $document = $this->word->loadTemplate('templatesWord/sutartis.docx');
        $kliento_vardas = /*@iconv('UTF-8', 'ASCII//TRANSLIT', */$clientData->name/*)*/;
        $formData = array(
            'client_agreement_id' => $this->input->post("client_id"),
            'file_name' => $kliento_vardas.'-adwords-agreement.docx',
            'path' => base_url().'generatedWordFiles/'.$kliento_vardas.'-adwords-agreement.docx',
        );
        $agreementId = $this->agreement_database->insertAgreement($formData);
        $document->setValue('agreementID', $agreementId);
        $document->setValue('client_name', $clientData->name);
        $document->setValue('imones_kodas', $clientData->imones_kodas);
        $document->setValue('contact_name', $clientData->contact_name);
        $document->setValue('client_website', $clientData->www);
        $document->setValue('order_date', date("Y-m-d"));
        $document->setValue('client_phone', $clientData->number);
        $document->setValue('client_address', $clientData->address);
        $document->setValue('client_mail', $clientData->email);
        $document->setValue('pvm_code', $clientData->pvm_code);
        $document->save('generatedWordFiles/'.$kliento_vardas.'-adwords-agreement.docx');
        $this->index();

    }
    public function newAgreementForm(){
        $data = $this->client_database->getClients($this->session->userdata['logged_in']['user_id']);
        $userArray = array();
        foreach($data as $user)
        {
            $userArray[$user->id] = $user->name;
        }
        $data = array('clients' => $userArray);
        $this->load->view("agreements/newAgreementForm",$data);
    }
}