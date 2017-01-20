<?php
/**
 * Created by PhpStorm.
 * User: Brazdys
 * Date: 11/17/2016
 * Time: 09:50
 */
class Comments extends CI_Controller{

    public function __construct() {
        parent::__construct();
// Load session, form and form validation library
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->library('form_validation');

// Load comment_database database
        $this->load->model('comment_database');
        $this->load->model('client_database');
    }
// Užkraunam komentarus pagal klientus 2016-11-18 03:20 kai nuvažiuoja stogas ir komentuoja beleką hahahahahaahaha
    public function show($id = 0){
        if($id == 0)
        {
            $data = array("Neigiamas", "Nėra pasirinktas klientas!");
            $this->load->view("comments/comments", $data);
        }
        else{
            $client = $this->client_database->getClientById($id);
            $data = $this->comment_database->getCommentsByClientId($id);
            if(empty($data))
            {
                $data = "Komentarų nerasta";
            }
            $client_name = $client[0]->name;
            $data = array("comments" => $data, "client_name" =>$client_name);
            $this->load->view("comments/comments", $data);
        }
    }
    public function newCommentForm($id){
        $data = $this->client_database->getClientById($id);
        $data = array('kliento_info'=> $data);
        $this->load->view("comments/newComment", $data);
    }
    public function newComment(){
        $formData = array(
            'description' => $this->input->post('description'),
            'client_comment_id' => $this->input->post('client_id'),
            'date' => date("Y-m-d H:i:s"),
        );
        $this->comment_database->newComment($formData);
        redirect('/');
    }
}