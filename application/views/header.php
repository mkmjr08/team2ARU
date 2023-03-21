<?php

if(!isset($_SESSION["statusAdmin"]))
{
    redirect('AdminController/logout');
}
?>
<html lang="en">
<head>
<title>Hera Funds</title>
    <link rel="icon" type="image/x-icon" href="<?php echo base_url('assets/homePage/img/icon.jpg'); ?>"> 
    <link rel="stylesheet" href="<?php echo base_url('assets/homePage/css/styleHeader.css'); ?>">   
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet"  type='text/css'>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .topnav {
            overflow: hidden;
            background-color: #FF4B2B;
            padding-left:14.6%;
        }

        .topnav a {
            float: right;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 17px;
        }

        .topnav a:hover {
            background-color: #fa412d;
            color: white;
        }

        .topnav a.active {
            background-color: #fa412d;
                color: white;
        }
        .dropdown {
            float: right;
            overflow: hidden;
            font-family: 'Open Sans', sans-serif;
            padding-top: 10px;
        }
        .dropdown .dropbtn {  
            border: none;
            outline: none;
            color: white;
            background-color: #fa412d;
            font-family: 'Open Sans', sans-serif;
        }
        .navbar a:hover, .dropdown:hover .dropbtn {
            background-color: red;
        }
        .dropdown-content {
            display: none;
            position: absolute;
            padding-top: 10px;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }
        .dropdown-content a {
            float: none;
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            text-align: center;
        }
        .dropdown-content a:hover {
            background-color: #fa412d;
        }
        .dropdown:hover .dropdown-content {
            display: block;
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
</head>
<body>

    <div class="wrapper">
        <div class="sidebar">
             <div class="profile">
                <h3><?php print($_SESSION["email"]);   ?></h3>
                <p>Admin</p>
            </div>
            <div>
                <ul>
                <li>
                        <span class="icon">
                             <?php $this->load->helper('url'); echo anchor(base_url('AdminHomeController/home'), 'Home');?>
                        </span>
                </li>
                <li>
                        <span class="icon">
                            <?php $this->load->helper('url'); echo anchor(base_url('AdminHomeController/ideas'), 'Ideas');?>
                        </span>
                </li>
                <li>
                        <span class="icon">
                            <?php $this->load->helper('url'); echo anchor(base_url('AdminHomeController/clients'), 'Clients');?>
                        </span>
                </li>
                <li>
                        <span class="icon">
                            <?php $this->load->helper('url'); echo anchor(base_url('AdminHomeController/rm'), 'Relationship Managers');?>
                        </span>
                </li>
                <li>
                        <span class="icon">
                            <?php $this->load->helper('url'); echo anchor(base_url('AdminHomeController/notification'), 'Notification');?>
                        </span>
                </li>
                <li>
                        <span class="icon">
                            <?php $this->load->helper('url'); echo anchor(base_url('AdminHomeController/product_type'), 'Product Type');?>
                        </span>
                </li>
                <li>
                        <span class="icon">
                            <?php $this->load->helper('url'); echo anchor(base_url('AdminHomeController/country'), 'Country & Currency');?>
                        </span>
                </li>
            </ul>
        </div>
        </div>

    </div>
    <div class="topnav">
        <span class="icon">
            <?php $this->load->helper('url'); echo anchor(base_url('AdminHomeController/logout'), 'Log Out');?>
        </span>
        <span class="icon">
            <?php $this->load->helper('url'); echo anchor(base_url('AdminHomeController/changepassword'), 'Change Password');?>
        </span>
        <!--    <a href="viewProfile.php">
            <span class="icon"><i class="fa fa-smile"></i></span>
            <span class="item">Profile</span>
        </a>
        
        <div class="dropdown">
            <button class="dropbtn">Reports 
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <a href="#">Link 1</a>
                <a href="#">Link 2</a>
                <a href="#">Link 3</a>
            </div>
         </div>-->
    </div>
  <script>

  </script>
</body>
</html>