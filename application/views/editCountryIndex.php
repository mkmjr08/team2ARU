<?php
include("header.php");
?>
<html>
<head>
    <style>
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
    input[type=text], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    }
    input[type=submit] {
    width: 50%;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    }
    input[type=submit]:hover {
    background-color: #45a049;
    }
</style>
</head>
<body>
    <div style="padding-top: 5%; padding-left: 16%; padding-right:0%; font-family: 'Open Sans', sans-serif; ">
            <h1>Edit Country & Currency</h1><br><br><br>
        <div style="border-radius: 5px; background-color: #f2f2f2; padding: 20px;">
        <form action="<?php echo site_url('countryController/edit_form_data'); ?>" method="post">
            <label for="category">Category</label>
            <?php
            $temp=$_SESSION['counID'];
            try{
                $this->db->select();
                $this->db->from('tbl_country');
                $this->db->where('co_id',$temp);
                $query = $this->db->get();
                foreach ($query->result() as $row) {
            ?>
            <input type="hidden" id="id" name="id" value="<?php echo strtoupper($row->co_id); ?>" hidden>
            <input type="text" id="couName" name="couName" value="<?php echo strtoupper($row->co_name); ?>" pattern="[Aa-Zz]" required>
            <input type="text" id="couCurrency" name="couCurrency" value="<?php echo strtoupper($row->co_currency); ?>" pattern="[Aa-Zz]{5}" required>
            <?php  if ($this->session->flashdata('error')) { ?>
                <div ><?php echo $this->session->flashdata('error'); ?></div>
            <?php } ?>
            <input type="submit" value="Save">
            <?php
            }
            }
             catch (PDOException $e)
            {
            echo 'Query error.';
            die();
            }
            ?>
        </form>
        </div>
    </div>
</body>
</html>