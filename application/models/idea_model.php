<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class idea_model extends CI_Model {
    public function save($data){
        //cheching the same idea type exist in db
        $this->db->select();
        $this->db->from('tbl_idea');
        $this->db->where('idea_title',$data['idea_title'])->where('idea_owner',$data['idea_owner'])->where('idea_exp_date',$data['idea_exp_date']);
        $query = $this->db->get();
        if($query->result()!=null){
            return false;
        }
        $status=$this->db->insert('tbl_idea', $data);
        if($status){
            return true;
        }
        else{
            return false;
        }
    }
    public function edit($data,$id){
        $this->db->where('idea_id', $id);
        $status=$this->db->update('tbl_idea', $data);
        if($status){
            return true;
        }
        else{
            return false;
        }
    }
}
?>