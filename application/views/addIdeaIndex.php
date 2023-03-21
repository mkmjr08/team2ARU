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
    input[type=date], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    }
    input[type=email], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    }
    textarea{
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    }
    input[type=number], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    }
    input[type=file], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    }
    input[type=submit] {
    width: 100%;
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
            <h1>Add New Idea</h1></button><br><br><br>
        <div style="border-radius: 5px; background-color: #f2f2f2; padding: 20px;">
        <form action="<?php echo site_url('ideaController/save_form_data'); ?>" method="post">
            <label for="name">Idea Title</label>
            <input type="text" id="idea" name="idea" placeholder="Idea Title.." pattern="[Aa-Zz]" required>
            <label for="proType">Product Type</label>
            <select id="proType" name="proType" required>
                <option disabled selected value>---Select---</option>
                <?php
                    $this->db->select();
                    $this->db->from('tbl_productType');
                    $query = $this->db->get();
                    foreach($query->result() as $row){?>
                <option value="<?php echo $row->pro_id ?>"><?php echo strtoupper($row->pro_type); ?></option>
                <?php
                }
                ?>
            </select>
            <label for="abstract">Abstract</label>
            <textarea id="abstract" name="abstract" required></textarea>
            <label for="pubdate">Publish Date</label>
            <input type="text" id="pubdate" name="pubdate" value="<?php echo date('d/m/Y'); ?>" disabled>
            <label for="expdate">Expire Date</label>
            <input type="date" id="expdate" name="expdate" min="<?php echo date('Y-m-d'); ?>" required>
            <label for="owner">Idea Owner</label>
            <input type="text" id="owner" name="owner" placeholder="Owner Name.." pattern="[Aa-Zz]" required>
            <label for="desc">Description</label>
            <textarea id="desc" name="desc" required></textarea>
            <label for="risk">Risk</label>
            <select id="risk" name="risk" required>
                <option disabled selected value>---Select---</option>
                <option value="Extremely High">Extremely High</option>
                <option value="High">High</option>
                <option value="Medium">Medium</option>
                <option value="Low">Low</option>
            </select>
            <label for="country">Country & Currency</label>
            <select id="country" name="country" required>
                <option disabled selected value>---Select---</option>
                <?php
                    $this->db->select();
                    $this->db->from('tbl_country');
                    $query1 = $this->db->get();
                    foreach($query1->result() as $row1){?>
                <option value="<?php echo $row1->co_id ?>"><?php echo strtoupper($row1->co_name); ?> - <?php echo strtoupper($row1->co_currency); ?></option>
                <?php
                }
                ?>
            </select>
            <?php  if ($this->session->flashdata('error')) { ?>
                <div ><?php echo $this->session->flashdata('error'); ?></div>
            <?php } ?>
            <input type="submit" value="Submit" name="submit">
        </form>
        </div>
    </div>
</body>
</html>
