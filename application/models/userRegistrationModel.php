<?php
// Login_model.php

defined('BASEPATH') OR exit('No direct script access allowed');

class userRegistrationModel extends CI_Model {
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    public function saveData($data){
        $this->load->database();
        $this->db->select();
        $this->db->from('tbl_userinfo');
        $this->db->where('user_email',$data['user_email']);
        $query = $this->db->get();
        if($query->result()!=null){
            $this->session->set_flashdata('error', 'Email ID Already Registered With Another Account');
            return false;
        }
        else{
                $this->load->database();
                $this->db->select();
                $this->db->from('tbl_userinfo');
                $this->db->where('user_mobile',$data['user_mobile']);
                $query = $this->db->get();
                if($query->result()!=null){
                    $this->session->set_flashdata('error', 'Phone Number Already Registered With Another Account');
                    return false;
                }
                else{
                    $status=$this->db->insert('tbl_userinfo', $data);
                    if($status){
                        return true;
                    }
                    else{
                      $this->session->set_flashdata('error', ' Something Went Wrong');
                      return false;
                    }
                }
            }
    }
}
?>