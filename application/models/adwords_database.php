<?php
Class Adwords_database extends CI_Model{

    public function getAdwordsClients(){
        $this->db->select()
            ->from('clients');
        $this->db->where("adwords_company_code is not null");
        $this->db->where("adwords_company_code !=", "");
        $query = $this->db->get();
        return $query->result();
    }
    public function getAdwords($clientID, $laikotarpis="MONTH"){
        $this->db->select()
            ->from('adwords');
        $this->db->where("laikotarpis", $laikotarpis);
        $this->db->where("client_adwords_id", $clientID);
        $query = $this->db->get();
        return $query->result();
    }
}