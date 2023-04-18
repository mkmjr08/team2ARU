<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class clientModel extends CI_Model{
    public function invest($data){
        $this->load->database();
        $this->db->select();
        $this->db->from('tbl_investedIdea');
        $this->db->where('idea_id',$data['idea_id'])->where('user_id',$data['user_id']);
        $query = $this->db->get();
        $result = $query->result();          
        if($result == NULL){
            $status=$this->db->insert('tbl_investedIdea', $data);
            if($status){
                return true;
            }
            else{
                return false;
            }
        }
        else{
            return false;
        }
    }
    public function addProductType($data){
        $this->db->select('*');
        $this->db->from('tbl_chosenProductType');
        $this->db->where('pro_id',$data['pro_id'])->where('user_id',$data['user_id']);
        $query = $this->db->get();
        $result = $query->result();
        if($result!=null){
            return false;
        }
        else{
        $this->db->insert('tbl_chosenProductType', $data);
        $insert_id = $this->db->insert_id();
        
        if(!$insert_id){
            return true;
        }
        else{
            return true;
        } 
        }
    }
    public function removeProductType($data){
        $this->db->where('pro_id',$data['pro_id'])->where('user_id',$data['user_id']);
        $status=$this->db->delete('tbl_chosenProductType');
        if($status){
            return true;
        }
        else{
            return true;
        } 
    }
    public function removeInvest($data){
        $this->db->where('idea_id',$data['idea_id'])->where('user_id',$data['user_id']);
        $status=$this->db->delete('tbl_investedidea');
        if($status){
            return true;
        }
        else{
            return true;
        }
    }
    public function changePassword($cPwd,$newPwd,$reNewPwd){
        $this->load->database();
        $this->db->select();
        $this->db->from('tbl_userInfo');
        $this->db->where('user_id',$_SESSION['Uid']);
        $query = $this->db->get();
        foreach($query->result() as $row){
            $dbPWD=$row->user_password;
            $dbUser=$row->user_email;
        }
        if(!password_verify($cPwd,$dbPWD)){
            redirect('clientChangePasswordController/missMatchMsg');
        }
        elseif($reNewPwd!=$newPwd){
            redirect('clientChangePasswordController/reEnterMatchMsg');
        }
        else{
        $hashPWD=password_hash($reNewPwd,PASSWORD_DEFAULT);
        $data = array(
            'user_password' => $hashPWD
        );
        $this->db->where('user_email', $dbUser);
        $this->db->update('tbl_userInfo', $data);
        redirect('clientChangePasswordController/SucessMsg');
        }
    }
}
?>