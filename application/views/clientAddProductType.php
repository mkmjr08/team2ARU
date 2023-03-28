
<?php

$user_id=$_SESSION['Uid'];
$pro_id=$_SESSION['pro_id'];
$this->load->database();
$data= array('pro_id'=>$pro_id,
            'user_id'=>$user_id );
/*
$this->db->select('*');
$this->db->from('tbl_chosenProductType');
$this->db->where('idea_id', 'user_id');
$query = $this->db->get();
$result = $query->result();
*/

$this->db->insert('tbl_chosenProductType', $data);
$insert_id = $this->db->insert_id();

if(!$insert_id){
   echo "<script>alert('Product type added Succesfully!')</script>";
   $this->load->view('clientProduct');
}
else{
    echo "<script>alert('OOPS! Run into some error!')</script>";
    $this->load->view('clientProduct');
 } 
?>
