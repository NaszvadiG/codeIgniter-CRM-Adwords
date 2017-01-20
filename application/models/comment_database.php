<?php
Class Comment_database extends CI_Model{

    public function getCommentsByClientId($id){
        $this->db->select()
            ->from('comments')
            ->where('client_comment_id', $id);
        $this->db->order_by("date", "DESC");
        $query = $this->db->get();
        return $query->result();
    }
    public function newComment($formData){
        $this->db->insert('comments', $formData);
    }
}