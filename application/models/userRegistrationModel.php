<?php
// Login_model.php

defined('BASEPATH') OR exit('No direct script access allowed');

class userRegistrationModel extends CI_Model {
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    public function saveData($data){
        $this->db->insert('tbl_userInfo', $data);
        
    }
}
?>