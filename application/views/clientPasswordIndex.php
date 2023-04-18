<?php
include("clientHeader.php");
?>
<html>
<head>
    <style>
    input[type=password], select {
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
            <h1>Change Password</h1><br><br>
        <div style="border-radius: 5px; background-color: #f2f2f2; padding: 20px;">
        <form action="<?php echo site_url('clientChangePasswordController/changePassword'); ?>" method="post">
            <label for="currentPassword">Current Password</label>
            <input type="password" id="currentPassword" name="currentPassword" placeholder="Current Password.." required>
            <label for="newPassword">New Password</label>
            <input type="password" id="newPassword" name="newPassword" placeholder="New Password.." required>
            <label for="reNewPassword">Re-enter New Password</label>
            <input type="password" id="reNewPassword" name="reNewPassword" placeholder="Re-enter New Password.." required>
            <?php  if ($this->session->flashdata('error2')) { ?>
                <div ><?php echo $this->session->flashdata('error2'); ?></div>
            <?php } ?>
             <div id="password-message" style="font-size: 10; padding-left:100px; padding-top: 40px;"></div> 
            <input type="submit" value="Change Password" name="changePWD">
        </form>
        </div>
    </div>
</body>
</html>
<script>
const newPasswordInput = document.getElementById('newPassword');
const confirmPasswordInput = document.getElementById('reNewPassword');
const passwordMessage = document.getElementById('password-message');

confirmPasswordInput.addEventListener('input', checkPasswordMatch);
function checkPasswordMatch() {
  const newPassword = newPasswordInput.value;
  const confirmPassword = confirmPasswordInput.value;
  if (newPassword === confirmPassword) {
    passwordMessage.textContent = 'Passwords match!';
    passwordMessage.style.color = 'green';
  } else {
    passwordMessage.textContent = 'Passwords do not match.';
    passwordMessage.style.color = 'red';
  }
}
</script>