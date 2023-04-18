<?php
include("header.php");
?>
<html>
<head>
<style>
#customers {
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 82px;
  font-weight: bold;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #FF4B2B;
  color: white;
}
button {
	border-radius: 20px;
	border: 1px solid #FF4B2B;
	background-color: #FF4B2B;
	color: #FFFFFF;
	font-size: 12px;
	font-weight: bold;
	padding: 12px 45px;
	letter-spacing: 1px;
	text-transform: uppercase;
	transition: transform 80ms ease-in;
    float: right;
}

.button:active {
	transform: scale(0.95);
}

.button:focus {
	outline: none;
}

.button.ghost {
	background-color: transparent;
	border-color: #FFFFFF;
}

</style>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>
<body>
    <div style="padding-top: 5%; padding-left: 20%; padding-right:0%; font-family: 'Open Sans', sans-serif;">
            <h2>Products Associated With This Category:<h2><h1>
                <?php
                $this->db->select();
                $this->db->from('tbl_producttype');
                $this->db->where('pro_id',$proID);
                $query1 = $this->db->get(); 
                foreach ($query1->result() as $row1){
                    echo $row1->pro_type;
                }
                ?>
            </h1><br><br>
            <?php
                $this->db->select();
                $this->db->from('tbl_idea');
                $this->db->where('pro_id',$proID);
                $query = $this->db->get();
                foreach ($query->result() as $row){
                ?>
                <h2><?php $this->load->helper('url'); echo anchor(base_url('ideaController/viewMore/'.$row->idea_id.''), $row->idea_title);?><h2>
                <?php
                }
                ?>
            <br><br><br><br>
            <?php
            if($query->result()==null){
                ?>
                 
                <h1 align="center"> OOPS! No Ideas Associated To This Product Type</h1>
            <?php 
            }
            ?>
        </div>
</body>
</html>