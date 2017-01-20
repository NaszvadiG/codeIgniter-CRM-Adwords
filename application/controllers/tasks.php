<?php
/**
 * Created by PhpStorm.
 * User: Brazdys
 * Date: 12/8/2016
 * Time: 02:27
 */


Class Tasks extends CI_Controller {

    public function __construct() {
        parent::__construct();
// Load session library
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
// Load database
        $this->load->model('task_database');
        $this->load->model('login_database');

    }
// Parodomos priskirtos ir sukurtos užduotys
    public function index() {
        $data = $this->task_database->getTasks($this->session->userdata['logged_in']['user_id']);
        $mydata = $this->task_database->getMyTasks($this->session->userdata['logged_in']['user_id']);
        if($data || $mydata)
        {
            $data = array('tasks' => $data, 'mytasks' => $mydata);
            $this->load->view('tasks/tasks', $data);
        }
        else{
            $this->load->view('tasks/no_tasks');
        }
    }
//    Parodomas pasirinktos užduoties vidus
    public function viewTask($task_id){
        $data = $this->task_database->getTaskById($task_id);
        $priskirta = $this->login_database->getUserById($data[0]->task_user_id); //kam priskirta
        $priskyre = $this->login_database->getUserById($data[0]->task_user_id_pri); //kas priskyre
        $files = $this->task_database->getFiles($task_id);
        $data = array("task_data" => $data[0], 'priskirta' => $priskirta[0], 'priskyre' => $priskyre[0], "files" => $files);
        $this->load->view('tasks/viewTask', $data);
    }
    public function checklist(){
        $checkvalue = $this->input->post("done");
        $task_id = $this->input->post("task_id");
        $formData = array(
            'checkvalue' => $checkvalue,
            'task_id' => $task_id,
        );
        $this->task_database->checklistToggle($formData);
        redirect(base_url()."index.php/tasks");
    }
    public function editTaskForm($id)
    {
        $taskData = $this->task_database->getTaskById($id);
        foreach($taskData as $klientas) {
            $data = array("taskData" => $klientas);
        }
        $this->load->view('tasks/editTask', $data);
    }
    public function editTask($taskID)
    {
            $formData = array(
                'task_id' => $taskID,
                'title' => $this->input->post('title'),
                'description' => $this->input->post('description'),
            );
            $this->task_database->editTask($formData);
            $this->index();
            return true;
    }
    public function deleteTaskForm($clientId)
    {
        $data = array('task_id' => $clientId);
        $this->load->view('tasks/deleteTaskAgree', $data);
    }
    public function deleteTask($task_id){
        $this->task_database->deleteTask($task_id);
        echo "Užduotis sėkmingai ištrinta";
        redirect(base_url().'index.php/tasks/');
    }
    public function newTaskForm()
    {
        $user_id = $this->session->userdata['logged_in']['user_id'];
        $users = $this->login_database->getUsers();
        $userArray = array();
        foreach($users as $user)
        {
            $userArray[$user->id] = $user->name." ".$user->surname;
        }
        $data = array("userdata" => $userArray, "user_id"=>$user_id);
        $this->load->view("tasks/newTaskForm", $data);
    }
    public function newTask(){
        $this->form_validation->set_rules('title', 'Pavadinimas', 'required');
        $formData = array(
            "task_user_id" => $this->input->post('task_user_id'),
            "task_user_id_pri" => $this->input->post('task_user_id_pri'),
            "title" => $this->input->post('title'),
            "description" => $this->input->post('description'),
            "checklist" => "0",
        );
        $this->task_database->newTask($formData);
        redirect(base_url().'index.php/tasks/');
    }
    public function addFileForm($task_id)
    {
        $data = array("task_id" => $task_id);
        $this->load->view("tasks/addFileForm", $data);
    }
    public function addFile(){
        $config['upload_path'] = "./uploads/";
        $config['allowed_types'] = '*';
        $this->load->library('upload', $config);
        $this->upload->do_upload('file');
        $fileData = $this->upload->data();
        $postas = $this->input->post("file_name");
        if(!empty($postas))
        {
            $fileName = $this->input->post("file_name");
        }
        else{
            $fileName = $fileData['file_name'];
        }
        $formData = array(
            "file_name" => $fileName,
            "path" => str_replace('/home/brskis/domains/crm.brazdauskis.eu/public_html', '', $fileData['full_path']), //TODO: pakeisti po migracijos
            "file_task_id" => $this->input->post("task_id"),
        );
        $this->task_database->addFile($formData);
        redirect(base_url()."index.php/tasks/viewTask/".$this->input->post("task_id"));
    }
}

?>