<?php
class clientSignInController extends CI_Controller{
    public function loginAction(){
        $this->load->database();

        if($_SESSION["email"]!=null){
            try{
                $email=$_SESSION["email"];
                $password=$_SESSION["password"];
                $this->db->select('user_id,user_name,user_email,user_password');
                $this->db->from('tbl_userInfo');
                $this->db->where('user_email',$email);
                $query = $this->db->get();
                foreach ($query->result() as $row) {
                    $emailDB= $row->user_email;
                    $passwordDB= $row->user_password;
                    $_SESSION["Uname"]=$row->user_name;
                    $_SESSION["Uid"]=$row->user_id;
                }
                
                if($emailDB==$email){
                    if(password_verify($password,$passwordDB)){
                        $_SESSION["password"]="Nahhhhh";
                        $password="reset";
                        $_SESSION["statusClient"]="active";
                        
                        redirect("clientHomeController/home");
                    }
                    else{
                        $this->session->set_flashdata('error', 'Invalid username or password');
                        redirect("signin/index");
                    }
                }
                else{
                    $this->session->set_flashdata('error', 'Invalid username or password');
                    redirect("signin/index");
                }
            }
            catch (PDOException $e)
            {
                echo 'Query error.';
                die();
            }
        }
    }
}
?>