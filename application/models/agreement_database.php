<?php
Class Agreement_database extends CI_Model{

    public function getAgreements(){
        $this->db->select()
            ->from('agreements');
        $this->db->order_by("agreement_id", "ASC");
        $query = $this->db->get();
        return $query->result();
}
    public function insertAgreement($formData){
        $this->db->insert('agreements ', $formData);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
}