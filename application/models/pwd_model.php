<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class pwd_model extends CI_Model {
    public function changePassword($data,$dbUser){
        $this->db->where('admin_UserName', $dbUser);
        $status=$this->db->update('tbl_admincredentionals', $data);
        if($status){
            return true;
            }
        else{
            return false;
            }
    }
}
?>