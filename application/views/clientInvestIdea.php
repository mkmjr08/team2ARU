
<?php

$user_id=$_SESSION['Uid'];
$idea_id=$_SESSION['ideaID'];
$this->load->database();
$data= array('idea_id'=>$idea_id,
            'user_id'=>$user_id );

$this->db->select('*');
$this->db->from('tbl_investedIdea');
$this->db->where('idea_id', 'user_id');
$query = $this->db->get();
$result = $query->result();
  
if($result == NULL){
    $this->db->insert('tbl_investedIdea', $data);
    $insert_id = $this->db->insert_id();
    echo "<script>alert('Invested Succesfully!')</script>";
    $this->load->view('clientIdea');
}
else{
    //echo "<script>alert('OOPS! Run into some error!')</script>";
    $this->load->view('clientIdea');
 }
?>
