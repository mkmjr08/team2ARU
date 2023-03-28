<?php
include("clientHeader.php");
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
  padding: 8px;
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
input[type=submit] {
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

.submit:active {
	transform: scale(0.95);
}

.submit:focus {
	outline: none;
}

.submit.ghost {
	background-color: transparent;
	border-color: #FFFFFF;
}

</style>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>
<body>
    <div style="padding-top: 5%; padding-left: 14.6%; padding-right:0%; font-family: 'Open Sans', sans-serif; ">
            <h1 align="center">Invested Ideas
            <br><br>
            </h1><form action="<?php echo site_url('ideaController/addIdea'); ?>" method="post">
            <table id="customers">
                <tr>
                    <th>#</th>
                    <th style="text-align: center;">Idea</th>
                    <th style="text-align: center;">View Details</th>
                    
                </tr>
            <?php
                $user_id=$_SESSION["Uid"];
                $sql = "SELECT * FROM tbl_idea i JOIN tbl_investedIdea n ON i.idea_id = n.idea_id WHERE n.user_id = $user_id";
                 $query = $this->db->query($sql);
                 $i=1;                 
                 foreach ($query->result() as $row) {
                ?><tr>
                    <td><?php echo $i; $i++; ?></td>
                    <td style="text-align: center;"><?php echo strtoupper($row->idea_title); ?></td>
                    <td align="center"><?php $this->load->helper('url'); echo anchor(base_url('clientIdeaController/viewInvestedDetails/'.$row->idea_id.''), 'View Details');?></td>
                </tr>
                <?php }
                     if($query->result()==null){
                        ?>
                 
                        <h1 align="center">NO RECORDS FOUND</h1>
                     
                    <?php
                     }
                ?>
            </table>
        </div>
</body>
</html>