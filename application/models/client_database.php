<?php

Class Client_database extends CI_Model {

// Insert registration data in database
public function getClients($id = 0){
    if($id) {
        $this->db->select();
        $this->db->from('clients');
        $this->db->where('client_user_id', $id);
        $query = $this->db->get();
    }
    else{
        $this->db->select();
        $this->db->from('clients');
        $query = $this->db->get();
    }
	return $query->result();
}
    public function getClientsSearch($id = 0, $searchString){
        if($id) {
            $this->db->select();
            $this->db->from('clients');
            $this->db->where('client_user_id', $id);
            $this->db->like('name', $searchString);
            $query = $this->db->get();
        }
        else{
            $this->db->select();
            $this->db->from('clients');
            $query = $this->db->get();
        }
        return $query->result();
    }
public function newClient($formData){
    $this->db->select();
    $this->db->from('clients');
    $this->db->where('name',$formData['name']);
    $query = $this->db->get();
    if($query->num_rows() > 0)
    {
        echo "Tokiu pavadinimu klientas jau buvo pridėtas";
        return false;
    }
    else {
        $this->db->insert('clients', $formData);
        return true;
    }
}
    public function getClientById($clientID)
    {
        $this->db->select();
        $this->db->from('clients');
        $this->db->where('id', $clientID);
        $query = $this->db->get();
        return $query->result();
    }
    public function editClient($clientData)
    {
        $this->db->update('clients', $clientData, array('id'=>$clientData['id']));
//        $query = $this->db->get();
        return true;
    }
    public function deleteClient($clientId){
        $this->db->delete('clients', array('id'=>$clientId));
        return true;
    }
    public function checkClient($name=false)
    {
        if($name) {
            $this->db->select();
            $this->db->from('clients');
            $this->db->where('name', $name);
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                return false;
            } else {
                return true;
            }
        }
        else{
            return true;
        }
    }
    public function getLastComment($id){
        $this->db->select('description')
            ->from('comments')
            ->where('client_comment_id', $id);
        $this->db->order_by("date", "DESC");
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->result();
    }
}

?>