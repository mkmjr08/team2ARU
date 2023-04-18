<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ProductType_model extends CI_Model {
    public function save_form_data($data){
        //cheching the same product type exist in db
        $this->db->select();
        $this->db->from('tbl_producttype');
        $this->db->where('pro_type',$this->input->post('proType'));
        $query = $this->db->get();
        if($query->result()!=null){
            return false;
        }
        // If form validation succeeds, save the data to the database
        
        $status=$this->db->insert('tbl_producttype', $data);
        if($status){
            return true;
        }
        else{
            return false;
        }
    }
    public function edit_form_data($data){
        //checking if there is a same product type exist in db
        $this->db->select();
        $this->db->from('tbl_producttype');
        $this->db->where('pro_id!=',$data['pro_id'])->where('pro_type',$data['pro_type']);
        $query = $this->db->get();
        if($query->result()!=null){
            return false;
        }
        // If form validation succeeds, save the data to the database
        $this->db->where('pro_id', $data['pro_id']);
        $temp=array(
            'pro_type'=>$data['pro_type']
        );
        $status=$this->db->update('tbl_producttype', $temp);
        if($status){
            return true;
        }
        else{
            return false;
        }
    }
    public function delete($id){
        //checking if there is any ideas associated to this
        $this->db->select();
        $this->db->from('tbl_idea');
        $this->db->where('pro_id=',$id);
        $query = $this->db->get();
        if($query->result()!=null){
            return false;
        }
        //deleting the pro type
        $this->db->where('pro_id', $id);
        $status=$this->db->delete('tbl_producttype');
        if($status){
            return true;
        }
        else{
            return false;
        }
    }
}
?>