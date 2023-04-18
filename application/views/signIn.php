<!DOCTYPE html>
<html>
<head>
<title>Hera Funds</title>
<link rel="stylesheet" href="<?php echo base_url('assets/homePage/css/signinStyle.css'); ?>">
<link rel="icon" type="image/x-icon" href="img/icon.jpg">
<style>
.button {
  display: inline-block;
  padding: 15px 25px;
  font-size: 15px;
  cursor: pointer;
  text-align: center;
  text-decoration: none;
  outline: none;
  color: #fff;
  border-radius: 20px;
  border: 1px solid #FF4B2B;
  background-color: #FF4B2B;
  box-shadow: 0 5px #999;
}

.button:hover {background-color: #3e8e41}

.button:active {
  background-color: #3e8e41;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
}

</style>
</head>
<body>  
<div class="container" id="container">
	<div class="form-container sign-in-container">
<form action="#" method="post">
			<h1>Sign in</h1>
      <select id="UserType" name="userType" required style="background-color: #eee;color: black;border: none;padding: 12px 15px;margin: 8px 0;width: 100%;">
        <option disabled selected value>---Select---</option>
        <option value="1">ADMIN</option>
        <option value="2">RELATIONSHIP MANAGER</option>
        <option value="3">CLIENT</option>
      </select>
			<input type="email" class="inputs" placeholder="Email" name="email" required style="color: black;" />
			<input type="password" class="inputs" placeholder="Password" name="password" required style="color: black;" />
			<!--<a href="<?php echo base_url(); ?>clientPasswordIndex">Forgot your password?</a> -->
      <?php  if ($this->session->flashdata('error')) { ?>
    <div ><?php echo $this->session->flashdata('error'); ?></div>
<?php } ?>
            <button class="button" name="login">SIGN IN</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-right">
				<h1>Hello!</h1>
				<p>New Here?</p>
                <a href="<?php echo base_url(); ?>userRegistration">Create Accout</a>
                <h1><a href="<?php echo base_url(); ?>welcome_message">Home</a></h1>
			</div>
		</div>
	</div>
</div>
</body>
</html>
<?php
if(isset($_POST['login']))
{
  $userType=$_POST['userType'];
  if($userType==1)
  {
    session_start();
    $_SESSION["email"]=$_POST['email'];
    $_SESSION["password"]=$_POST['password'];;
    //echo "<script>window.location='admin/loginActionAdmin.php';</script>";
    redirect("signinController/loginAction");
  }
  elseif ($userType==3) {
    session_start();
    $_SESSION["email"]=$_POST['email'];
    $_SESSION["password"]=$_POST['password'];;
    //echo "<script>window.location='admin/loginActionAdmin.php';</script>";
    redirect("clientSignInController/loginAction");
  }{

  }
}
?>