<?php
class signinController extends CI_Controller{
    public function loginAction(){
        $this->load->database();

        if($_SESSION["email"]!=null){
            try{
                $email=$_SESSION["email"];
                $password=$_SESSION["password"];
                $this->db->select('admin_UserName, admin_Password');
                $this->db->from('tbl_admincredentionals');
                $query = $this->db->get();
                foreach ($query->result() as $row) {
                    $emailDB= $row->admin_UserName;
                    $passwordDB= $row->admin_Password;
                }
                
                if($emailDB==$email){
                    if(password_verify($password,$passwordDB)){
                        $_SESSION["password"]="Nahhhhh";
                        $password="reset";
                        $_SESSION["statusAdmin"]="active";
                        redirect("AdminController/adminIndex");
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