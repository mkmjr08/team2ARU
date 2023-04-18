<!DOCTYPE html>
<html>
<head>
  
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  background-color: black;
}

* {
  box-sizing: border-box;
}

/* Add padding to containers */
.container {
  padding: 16px;
  background-color: white;
}

/* Full-width input fields */
input[type=text], input[type=password], input[type=textarea], input[type=date]  {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password], input[type=textarea], input[type=date] :focus {
  background-color: #ddd;
  outline: none;
}



/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for the submit button */
.btnRegister {
  background-color: #04AA6D;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 20%;
  opacity: 0.9;
  align:center;
}

.registerbtn:hover {
  opacity: 1;
}

/* Add a blue text color to links */
a {
  color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
  background-color: #f1f1f1;
  text-align: center;
}
</style>
</head>
<body>

<form action="<?php echo site_url('userRegistration/save_form_data'); ?>" method="post">

  <div class="container">
    <h1 align="center">Register</h1>
    <p align="center">Please fill in this form to create an account.</p>
    <hr>

    <table style="padding-left: 30%;">
        <tr>
            <td><label for="uname">Name:</label></td>
            <td><input type="text" name="uname" id="uname" placeholder="Your name" required></td>
        </tr>
	    <tr>
            <td><label for="gender">Gender:</label></td>
            <td>Male: <input type="radio" id="gender" name="gender" value="male" required>
             Female: <input type="radio" id="gender" name="gender" value="female" required>
            Other: <input type="radio" id="gender" name="gender" value="other" required></td>
        </tr>
	    <tr>
            <td><label for="dob"> Date of Birth:</label></td>
            <td><input type="date" name="dob" id="dob" placeholder="DOB" required></td>
        </tr>
        <tr>
            <td><label for="email">Email:</label></td>
            <td><input type="text" name="email" id="email" placeholder="Your email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"></td>
        </tr>
 	    <tr>
            <td><label for="phoneNumber">Phone Number:</label></td>
            <td><input type="text" name="phoneNumber" id="phoneNumber" placeholder="Your Phone number" required pattern="[0-9]{10,12}"></td>
        </tr>      
        <tr>
            <td><label for="add"> Address:</label></td>
            <td><input type="text" name="address" id="address" placeholder="Your Address" required></td>
        </tr>
        <tr>
            <td><label for="country">Country:</label></td>
            <td><input type="text" name="country" id="country" placeholder="Your Country" required></td>
        </tr>    
	    <tr>
            <td><label for="password">Password:</label></td>
            <td><input type="password" name="password" id="password" placeholder="Your Password" required minlength="8"></td>
        </tr> 
        <tr>
            <td><label for="cpassword">Confirm Password:</label></td>
            <td><input type="password" name="cpassword" id="cpassword" placeholder="Confirm Your Password" required minlength="8"></td>
        </tr>
        <tr>
            <td><label for="security question">Security Question:</label></td>
            <td required>
	        <select name="seq" id="seq" style="width: 100%;padding: 15px;margin: 5px 0 22px 0;display: inline-block;border: none;background: #f1f1f1;" required>
            <option disabled selected value>--select--</option>
            <?php
                    $this->db->select();
                    $this->db->from('tbl_securityquestion');
                    $query1 = $this->db->get();
                    foreach($query1->result() as $row1){?>
                <option value="<?php echo $row1->qn_id ?>"><?php echo strtoupper($row1->qn_des); ?></option>
                <?php
                }
                ?>
    
	        </select>
            </td>
        </tr>    
        <tr>
            <td><label for="sqa">Answer:</label></td>
            <td><input type="textarea" name="sqa" id="sqa" placeholder="Type your answer" required></textarea></td>
        </tr>

    </table>

    <div style="padding-left: 30%;">
    <p>By creating an account you agree to our <a href="<?php echo base_url(); ?>privacyPolicies">Terms & Privacy</a>.</p>
    <div style="padding-left: 15%;">
    <?php  if ($this->session->flashdata('error')) { ?>
    <div ><?php echo $this->session->flashdata('error'); ?></div>
<?php } ?>
    <button type="submit" name="btnRegister" class="btnRegister">Register</button>
          </div>
          </div>
  </div>
  
  <div class="container signin">
    <p>Already have an account? <a href="<?php echo base_url(); ?>signIn">Sign in</a></p>
    <p>Go back to <a href="<?php echo base_url(); ?>welcome_message">Home</a></p>
  </div>
</form>

</body>
</html>
