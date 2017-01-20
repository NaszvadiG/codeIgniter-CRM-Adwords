<?php

Class Clients extends CI_Controller {

public function __construct() {
parent::__construct();
// Load session library
$this->load->library('session');
$this->load->helper('form');
$this->load->library('form_validation');
$this->load->library('session');
// Load database
$this->load->model('client_database');

}
// Parodo visus klientus, bet dar reikia prid4ti visus variables ir taip toliau pagaliau ** prad4jau suprast
public function index() {
	$data = $this->client_database->getClients($this->session->userdata['logged_in']['user_id']);
if($data)
{
    $newArray = array();
    foreach($data as &$var){
       // var_dump($var->id);
        $value = $this->client_database->getLastComment($var->id);
        if(empty($value))
        {
            $var->komentaras = "Nėra komentaru";
        }
        else{
        foreach($value as $com)
        {
            $var->komentaras = $com->description;
        }
        }

    }
//    DONE:duomenų bazė
$data = array('klientai' => $data);
$this->load->view('clients/clients', $data);
}
else{
 $this->load->view('clients/no_clients');
}
}
    public function clientSearch(){
        $searchString = $this->input->post("searchString");
        $data = $this->client_database->getClientsSearch($this->session->userdata['logged_in']['user_id'], $searchString);
        if($data)
        {
            $newArray = array();
            foreach($data as &$var){
                // var_dump($var->id);
                $value = $this->client_database->getLastComment($var->id);
                if(empty($value))
                {
                    $var->komentaras = "Nėra komentaru";
                }
                else{
                    foreach($value as $com)
                    {
                        $var->komentaras = $com->description;
                    }
                }

            }
//    DONE:duomenų bazė
            $data = array('klientai' => $data);
            $this->load->view('clients/clients', $data);
        }
        else{
            $this->load->view('clients/no_clients');
        }
    }
    public function allClients() {
	$data = $this->client_database->getClients();
if($data)
{
    $newArray = array();
    foreach($data as &$var){
       // var_dump($var->id);
        $value = $this->client_database->getLastComment($var->id);
        if(empty($value))
        {
            $var->komentaras = "Nėra komentaru";
        }
        else {
            foreach ($value as $com) {
                $var->komentaras = $com->description;
            }
        }
    }
//    DONE:duomenų bazė
$data = array('klientai' => $data);
$this->load->view('clients/clients', $data);
}

else{
 $this->load->view('clients/no_clients');
}
}
public function newClientForm(){
	$this->load->view('clients/clientForm');
}

    /**
     *
     */
    public function newClient(){
	    $this->form_validation->set_rules('name', 'Pavadinimas', 'required');
        $isClient = $this->client_database->checkClient($this->input->post('name'));
		$this->form_validation->set_rules('imones_kodas', 'Imones kodas', 'required');
		$this->form_validation->set_rules('payment_due', 'payment_due', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_message('required', 'Visi laukai turi būti užpildyti');
	if($this->form_validation->run() == TRUE && $isClient)
	{

        $formData = array(
            'client_user_id' => $this->session->userdata['logged_in']['user_id'],
            'name' => $this->input->post('name'),
            'imones_kodas' => $this->input->post('imones_kodas'),
            'payment_due' => $this->input->post('payment_due'),
            'email' => $this->input->post('email'),
            'adwords_company_code' => $this->input->post('adwords_company_code'),
            'number' => $this->input->post('number'),
            'pvm_code' => $this->input->post('pvm_code'),
            'contact_name' => $this->input->post('contact_name'),
            'address' => $this->input->post('address'),
            'www' => $this->input->post('www'),
        );
	$this->client_database->newClient($formData);
	$this->index();
	}
	else{

		$this->load->view('clients/clientForm');
	}
}
    public function editClientForm($id)
    {
        $clientData = $this->client_database->getClientById($id);
        foreach($clientData as $klientas) {
            $data = array("clientData" => $klientas);
        }
        $this->load->view('clients/editClient', $data);
    }
    public function editClient($clientId)
    {
        $this->form_validation->set_rules('name', 'Pavadinimas', 'required');
        $this->form_validation->set_rules('imones_kodas', 'Imones kodas', 'required');
        $this->form_validation->set_rules('payment_due', 'payment_due', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        if($this->form_validation->run() == TRUE)
        {
            $this->form_validation->set_message('required', 'Visi laukai turi būti užpildyti');
            $formData = array(
                'id' => $clientId,
                'imones_kodas' => $this->input->post('imones_kodas'),
                'payment_due' => $this->input->post('payment_due'),
                'email' => $this->input->post('email'),
                'adwords_company_code' => $this->input->post('adwords_company_code'),
                'number' => $this->input->post('number'),
                'pvm_code' => $this->input->post('pvm_code'),
                'contact_name' => $this->input->post('contact_name'),
                'address' => $this->input->post('address'),
                'www' => $this->input->post('www'),
            );
            $this->client_database->editClient($formData);
            $this->index();
            return true;
        }
        else{
            $data = array('clientData' => $formData);
            $this->load->view('clients/editClient', $data);
            return false;
        }
    }
    public function deleteClientForm($clientId)
    {
        $data = array('clientId' => $clientId);
        $this->load->view('clients/deleteClientAgree', $data);
    }
    public function deleteClient($clientId){
        $this->client_database->deleteClient($clientId);
        echo "Klientas sėkmingai ištrintas";
        $this->index();
    }

}

?>