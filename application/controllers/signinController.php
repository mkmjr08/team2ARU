<?php
class signinController extends CI_Controller{
    public function loginAction(){
        $this->load->database();
        if($_SESSION["email"]!=null){
                $email=$_SESSION["email"];
                $password=$_SESSION["password"];
                $this->load->model('Signin_model');
                $this->Signin_model->login($email, $password);
        }
    }
}
?>