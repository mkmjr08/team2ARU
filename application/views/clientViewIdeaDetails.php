<?php
include("clientHeader.php");
?>
<html>
<head>
<style>
#customers {
  border-collapse: collapse;
  width: 80%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
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
    <div style="padding-top: 5%; padding-left: 35%; padding-right:0%; font-family: 'Open Sans', sans-serif;">
            <h1>Idea Details
            </h1><br><br>
            <?php
            try{
                $proID=$_SESSION['ideaID'];
                $this->db->select();
                $this->db->from('tbl_idea');
                $this->db->where('idea_id',$proID);
                $query = $this->db->get();
                foreach ($query->result() as $row) {
                 if($row==null){?>
                 
                    <h1 align="center"> OOPS! Error</h1>
                 
                <?php
                 }
                 else{
                ?>
            <table id="customers" style="text-align: center; display: block;">
                <tr>
                    <th style="text-align:left;">Title</th>
                    <td><?php echo $row->idea_title ?></td>
                </tr>
                <tr>
                    <th style="text-align:left;">Product Type</th>
                    <td><?php 
                    $catID=$row->pro_id;
                        $this->db->select();
                        $this->db->from('tbl_productType');
                        $this->db->where('pro_id',$catID);
                        $query1 = $this->db->get();
                        foreach ($query1->result() as $row1) {
                        echo $row1->pro_type;
                        }
                     ?></td>
                </tr>
                <tr>
                    <th style="text-align:left;">Abstract</th>
                    <td><?php echo $row->idea_short_desc ?></td>
                </tr>
                <tr>
                    <th style="text-align:left;">Published Date</th>
                    <td><?php echo $row->idea_pub_date ?></td>
                </tr>
                <tr>
                    <th style="text-align:left;">Expire Date</th>
                    <td><?php echo $row->idea_exp_date ?></td>
                </tr>
                <tr>
                    <th style="text-align:left;">Idea Owner</th>
                    <td><?php echo $row->idea_owner ?></td>
                </tr>
                <tr>
                    <th style="text-align:left;">Description</th>
                    <td><?php echo $row->idea_desc ?></td>
                </tr>
                <tr>
                    <th style="text-align:left;">Risk</th>
                    <td><?php echo $row->idea_risk ?></td>
                </tr>
                <tr>
                    <th style="text-align:left;">Country & Currency</th>
                    <td>
                        <?php 
                        $coID=$row->co_id;
                        $this->db->select();
                        $this->db->from('tbl_country');
                        $this->db->where('co_id',$coID);
                        $query2 = $this->db->get();
                        foreach ($query2->result() as $row2) {
                        echo $row2->co_name.' - '.$row2->co_currency;
                        }?>
                    </td>
                </tr>
                <tr>
                    <td style="border: 0px"></td>
                    <td align="center"><?php $this->load->helper('url'); echo anchor(base_url('clientIdeaController/invest/'.$row->idea_id.''), 'Invest');?></td></td>
                </tr>
            </table>
            <br><br><br><br>
            <?php
            }
        }
    }
        catch (PDOException $e)
                {
                    echo 'Query error.';
                    die();
                }
            ?>
        </div>
</body>
</html>