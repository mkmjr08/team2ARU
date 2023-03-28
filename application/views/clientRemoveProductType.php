
<?php

//$user_id=$_SESSION['Uid'];
$pro_id=$_SESSION['pro_id'];
$this->load->database();
$table = 'tbl_chosenProductType';
$this->db->where('pro_id',$pro_id);

$this->db->delete($table);

if ($this->db->affected_rows() > 0) {

   echo "<script>alert('Product type removed Succesfully!')</script>";
   $this->load->view('clientChosenProductType');
}
else{
    echo "<script>alert('OOPS! Run into some error!')</script>";
    $this->load->view('clientChosenProductType');
 } 

/*
$this->db->select('*');
$this->db->from('tbl_chosenProductType');
$this->db->where('idea_id', 'user_id');
$query = $this->db->get();
$result = $query->result();
*/

?>