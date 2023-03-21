<?php
// Login_model.php

defined('BASEPATH') OR exit('No direct script access allowed');

class SIgnin_model extends CI_Model {

	public function login($username, $password)
	{
		$this->db->where('username', $username);
		$this->db->where('password', md5($password));
		$query = $this->db->get('users');

		if ($query->num_rows() == 1)
		{
			return $query->row();
		}
		else
		{
			return false;
		}
	}

}
