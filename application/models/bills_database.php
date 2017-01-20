<?php
Class Bills_database extends CI_Model{

    public function getBills(){
        $this->db->select()
            ->from('bills');
        $this->db->order_by("bill_id", "ASC");
        $query = $this->db->get();
        return $query->result();
}
    public function insertBill($formData){
        $this->db->insert('bills ', $formData);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
}