<?php
// Login_model.php

defined('BASEPATH') OR exit('No direct script access allowed');

class SIgnin_model extends CI_Model {

	public function login($email, $password)
	{
		$this->db->select('admin_UserName, admin_Password');
		$this->db->from('tbl_admincredentionals');
		$query = $this->db->get();
		foreach ($query->result() as $row) {
			$emailDB= $row->admin_UserName;
			$passwordDB= $row->admin_Password;
		}
		
		if($emailDB==$email){
			if(password_verify($password,$passwordDB)){
				$_SESSION["password"]="Nahhhhh";
				$password="reset";
				$_SESSION["statusAdmin"]="active";
				redirect("AdminController/adminIndex");
			}
			else{
				$this->session->set_flashdata('error', 'Invalid username or password');
				redirect("signin/index");
			}
		}
		else{
			$this->session->set_flashdata('error', 'Invalid username or password');
			redirect("signin/index");
		}
	}

}
