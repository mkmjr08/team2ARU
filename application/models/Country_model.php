<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Country_model extends CI_Model {
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    public function saveData($cName, $cCurrency)
	{
        $this->db->select();
        $this->db->from('tbl_country');
        $this->db->where('co_name',$cName);
        $query = $this->db->get();
        if($query->result()!=null){
            return false;
        }
        // If form validation succeeds, save the data to the database
        $data = array(
            'co_name' => $cName,
            'co_currency' => $cCurrency
        );
            $status=$this->db->insert('tbl_country', $data);
            if($status){
                return true;
            }
            else{
                return false;
            }
    }
    public function editData($coID,$cName, $cCurrency)
	{
         //checking if there is a same product type exist in db
         $this->db->select();
         $this->db->from('tbl_country');
         $this->db->where('co_name',$cName)->where('co_id!=',$coID);
         $query = $this->db->get();
         if($query->result()!=null){
            return false;
         }
         // If form validation succeeds, save the data to the database
         $data = array(
             'co_name' => $cName,
             'co_currency' => $cCurrency
         );
         $this->db->where('co_id', $coID);
         $status=$this->db->update('tbl_country', $data);
        if($status){
            return true;
        }
        else{
            return false;
        }
    }
    public function deleteData($coID)
	{
        $tempID=$coID;
        //checking if there is any ideas associated to this
        $this->db->select();
        $this->db->from('tbl_idea');
        $this->db->where('co_id=',$tempID);
        $query = $this->db->get();
        if($query->result()!=null){
            return false;
        }
        //deleting the country
        $this->db->where('co_id', $tempID);
        $status=$this->db->delete('tbl_country');
        if($status){
            return true;
        }
        else{
            return false;
        }
    }
}
?>