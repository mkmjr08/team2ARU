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
            <h1>
            Product Type
            </h1>
            <form action="#" method="post">
            <input type="submit" name="btn" value="Add New Catagory"></form><br><br><br>
            <table id="customers">
                <tr>
                    <th>#</th>
                    <th>Product Type</th>
                    <th># of ideas Associated</th>
                    <th style="text-align: center;">View Products</th>
                    <th style="text-align: center;">Edit</th>
                    <th style="text-align: center;">Delete</th>
                </tr>
            <?php
                $this->db->select();
                $this->db->from('tbl_producttype');
                $query = $this->db->get();
                $i=1;
                foreach ($query->result() as $row) {
                  ?>
                <tr>
                    <td><?php echo $i; $i++; ?></td>
                    <td><?php echo strtoupper($row->pro_type); ?></td>
                    <td> 
                        <?php
                            $temp=$row->pro_id;
                            $this->db->select();
                            $this->db->from('tbl_idea');
                            $this->db->where('pro_id',$temp);
                            echo $this->db->count_all_results();
                        ?>
                    </td>
                    <td align="center"><?php $this->load->helper('url'); echo anchor(base_url('productTypeController/viewIdeas/'.$row->pro_id.''), 'View Ideas');?></td>
                    <td align="center"><?php $this->load->helper('url'); echo anchor(base_url('productTypeController/edit/'.$row->pro_id.''), 'Edit');?></td>
                    <td align="center"><?php $this->load->helper('url'); echo anchor(base_url('productTypeController/delete/'.$row->pro_id.''), 'Delete');?></td>
                </tr>
                <?php
                }
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
<?php
if(isset($_POST['btn']))
{
    redirect("productTypeController/addNewProductType");
}
?>