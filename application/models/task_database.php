<?php

Class Task_database extends CI_Model {

// Insert registration data in database
    public function getTasks($id = 0){
        if($id) {
            $this->db->select();
            $this->db->from('tasks');
            $this->db->where('task_user_id_pri', $id); // Laikom kad task_user_id_pri skirtas žmogaus id kuris priskyrė taską(funkcionalumo pakeitimas)
            $query = $this->db->get();
        }
        else{
           return false;
        }
        return $query->result();
    }
    public function getMyTasks($id = 0){
        if($id) {
            $this->db->select();
            $this->db->from('tasks');
            $this->db->where('task_user_id', $id); // Laikom kad task_user_id man priskirti taskai
            $query = $this->db->get();
        }
        else{
            return false;
        }
        return $query->result();
    }
    public function newTask($formData){
            $this->db->insert('tasks', $formData);
            return true;
        }
    public function getTaskById($task_id)
    {
        $this->db->select();
        $this->db->from('tasks');
        $this->db->where('task_id', $task_id);
        $query = $this->db->get();
        return $query->result();
    }
    public function checklistToggle($formData)
    {
        if($formData['checkvalue'])
        {
            $this->db->update("tasks", array("checklist"=>"1"), array('task_id'=> $formData['task_id']));
        }
        else
        {
            $this->db->update("tasks", array("checklist"=>"0"), array('task_id'=> $formData['task_id']));
        }
    }
    public function editTask($clientData)
    {
        $this->db->update('tasks', $clientData, array('task_id'=>$clientData['task_id']));
//        $query = $this->db->get();
        return true;
    }
    public function deleteTask($task_id){
        $this->db->delete('tasks', array('task_id'=>$task_id));
        return true;
    }

    public function addFile($formData){
        $this->db->insert("files", $formData);
    }
    public function getFiles($task_id){
        $this->db->select("*");
        $this->db->from("files");
        $this->db->where("file_task_id",$task_id);
        $query = $this->db->get();
        if($query->num_rows != 0) {
            return $query->result();
        }
        else{
            return array();
        }
    }
}

?>