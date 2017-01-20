<?php
Class Pagespeed_database extends CI_Model{

    public function getPageSpeedData($clientID){
        $this->db->select('*');
        $this->db->from("pagespeed");
        $this->db->where("client_pagespeed_id", $clientID);
        $query = $this->db->get();
        return $query->result();
    }
    public function insertPageSpeed($formData){
        $this->db->insert('pagespeed', $formData);
    }
}