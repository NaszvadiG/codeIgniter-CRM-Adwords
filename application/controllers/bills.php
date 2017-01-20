<?php
/**
 * Created by PhpStorm.
 * User: Brazdys
 * Date: 12/10/2016
 * Time: 00:09
 */
class Bills extends CI_Controller{
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
        $this->load->model('bills_database');

    }
    public function index(){
        $data = $this->bills_database->getBills();
        if($data)
        {
            foreach($data as $agreement)
            {
                $client = $this->client_database->getClientById($agreement->client_bill_id);
                foreach($client as $clients)
                {
                    $agreement->client_name = $clients->name;
                }
            }
            $agreements = array('agreements'=>$data);
            $this->load->view('bills/bills', $agreements);
        }
        else{
            $this->load->view('bills/no_bills');
        }
    }
    public function generateBill(){

        $this->form_validation->set_rules('suma_be_pvm', 'Suma Be PVM', 'required');
        $this->form_validation->set_rules('pay_until', 'Imones kodas', 'required');
        $this->form_validation->set_message('required', 'Visi laukai turi būti užpildyti');
        if($this->form_validation->run() == TRUE) {
            $clientData = $this->client_database->getClientById($this->input->post("client_id"));
            $clientData = $clientData[0];
            $document = $this->word->loadTemplate('templatesWord/saskaitos.docx');
            $kliento_vardas =/* @iconv('UTF-8', 'ASCII//TRANSLIT',*/ $clientData->name/*)*/;
            var_dump($kliento_vardas);
            $formData = array(
                'client_bill_id' => $this->input->post("client_id"),
                'file_name' => $kliento_vardas . '-bill-' . date("Y-m-d H-m-s") . '.docx',
                'path' => base_url() . 'generatedWordFiles/' . $kliento_vardas . '-bill-' . date("Y-m-d H-m-s") . '.docx',
                'user_bill_id' => $this->session->userdata['logged_in']['user_id'],
            );

            $suma = $this->input->post('suma_be_pvm') + ($this->input->post('suma_be_pvm') * 0.21);
            $sumaZodziais = $this->sumToWords($suma);
            $pvm = $this->input->post('suma_be_pvm') * 0.21;
            $agreementId = 'INV' . $this->bills_database->insertBill($formData);
            $apmoketiiki = date("Y-m-d", ($this->input->post('pay_until') * 24 * 60 * 60 + strtotime(date("Y-m-d"))));
            $document->setValue('invoiceNumber', $agreementId);
            $document->setValue('ClientName', $clientData->name);
            $document->setValue('imones_kodas', $clientData->imones_kodas);
            $document->setValue('contact_name', $clientData->contact_name);
            $document->setValue('client_website', $clientData->www);
            $document->setValue('today', date("Y-m-d"));
            $document->setValue('phone', $clientData->number);
            $document->setValue('client_address', $clientData->address);
            $document->setValue('email', $clientData->email);
            $document->setValue('client_mail', $clientData->email);
            $document->setValue('pvm_kodas', $clientData->pvm_code);
            $document->setValue('sum_in_words', $sumaZodziais);
            $document->setValue('sum_be_pvm', $this->input->post('suma_be_pvm'));
            $document->setValue('pvm', $pvm);
            $document->setValue('total_sum', $suma);
            $document->setValue('pay_until', $apmoketiiki);
            $document->save('generatedWordFiles/' . $kliento_vardas . '-bill-' . date("Y-m-d H-m-s") . '.docx');
            $this->index();
        }
        else{
            $data = $this->client_database->getClients($this->session->userdata['logged_in']['user_id']);
            $userArray = array();
            foreach($data as $user)
            {
                $userArray[$user->id] = $user->name;
            }
            $data = array('clients' => $userArray, 'user_id' => $this->session->userdata['logged_in']['user_id']);
            $this->load->view("bills/newBillForm",$data);
        }

    }
    public function newBillForm(){
        $data = $this->client_database->getClients($this->session->userdata['logged_in']['user_id']);
        $userArray = array();
        foreach($data as $user)
        {
            $userArray[$user->id] = $user->name;
        }
        $data = array('clients' => $userArray, 'user_id' => $this->session->userdata['logged_in']['user_id']);
        $this->load->view("bills/newBillForm",$data);
    }
    private function sumToWords($sum)
    {
        $Sum = sprintf('%01.2f', $sum);
        list($p1, $p2) = explode('.', $Sum);
        $SumZodziais = $this->getSumZodziais($p1) . ' ' . $this->getLitai($p1) . ' ' . $p2 . ' cnt.';
        return $SumZodziais;
    }
    private function getLitai($number)
    {
        if ($number == 0)
            return 'eurų';

        $last = substr($number, -1);
        $du = substr($number, -2, 2);

        if (($du > 10) && ($du < 20))
            return 'eurų';
        else
        {
            if ($last == 0)
                return 'eurų';
            elseif ($last == 1)
                return 'euras';
            else
                return 'euras';
        }
    }
    function getTrys($skaicius)
    {
        $vienetai = array ('', 'vienas', 'du', 'trys', 'keturi', 'penki', 'šeši', 'septyni', 'aštuoni', 'devyni');
        $niolikai = array ('', 'vienuolika', 'dvylika', 'trylika', 'keturiolika', 'penkiolika', 'šešiolika', 'septyniolika', 'aštuoniolika', 'devyniolika');
        $desimtys = array ('', 'dešimt', 'dvidešimt', 'trisdešimt', 'keturiasdešimt', 'penkiasdešimt', 'šešiasdešimt', 'septyniasdešimt', 'aštuoniasdešimt', 'devyniasdešimt');

        $skaicius = sprintf("%03d", $skaicius);
        $simtai = ($skaicius{0} == 1)?"šimtas":"šimtai";
        if ($skaicius{0} == 0) $simtai = "";

        $du = substr($skaicius, 1);
        if  (($du > 10) && ($du < 20))
            return $this->getSumZodziais($skaicius{0}."00")." ".$niolikai[$du{1}];
        else
            return $vienetai[$skaicius{0}]." ".$simtai." ".$desimtys[$skaicius{1}]." ".$vienetai[$skaicius{2}];
    }

    private function getSumZodziais($skaicius)
    {
        $zodis = array(
            array("", "", ""),
            array("tūkstančių", "tūkstantis", "tūkstančiai"),
            array("milijonų", "milijonas", "milijonai"),
            array("milijardų", "milijardas", "milijardai"),
            array("bilijonų", "bilijonas", "bilijonai"));

        $return = "";
        //if ($skaicius == 0) return "nulis";

        settype($skaicius, "string");
        $size = strlen($skaicius);
        $skaicius = str_pad($skaicius, ceil($size/3)*3, "0", STR_PAD_LEFT);

        for ($ii=0; $ii<$size; $ii+=3)
        {
            $tmp = substr($skaicius, 0-$ii-3, 3);
            $return = $this->getTrys($tmp)." ".$zodis[$ii/3][($tmp{2}>1)?2:$tmp{2}]." ".$return;
        }
        return $return;
    }
}