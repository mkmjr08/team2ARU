<?php
class clientChangePasswordController extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    public function changePassword(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('currentPassword', 'currentPassword', 'required');
        $this->form_validation->set_rules('newPassword', 'newPassword', 'required|min_length[8]');
        $this->form_validation->set_rules('reNewPassword', 'reNewPassword', 'required|min_length[8]');
        if ($this->form_validation->run() == false){
            // If form validation fails, show the form again with error messages
            $this->session->set_flashdata('error2', 'Check Field Values');
            $this->load->view('passwordIndex');
        }
        else{
            $cPwd=$this->input->post('currentPassword');
            $newPwd=$this->input->post('newPassword');
            $reNewPwd=$this->input->post('reNewPassword');
            $this->load->model('ClientModel');
            $status=$this->ClientModel->changePassword($cPwd,$newPwd,$reNewPwd);
            if($status){
                echo "<script>alert('Invest Interest Removed Sucessfully');</script>";
                $this->load->view('clientInvestedIdea');
            }
            else{
                echo "<script>alert('Already Removed Interest');</script>";
                $this->load->view('clientInvestedIdea');
            }
        }
    }
        
    public function SucessMsg(){
        echo "<script>alert('Password Updated Successfully');</script>";
        $this->load->view('clientHomePage');
    }
    public function missMatchMsg(){
        echo "<script>alert('Check Current Password!');</script>";
        $this->load->view('ClientPasswordIndex');
    }
    public function reEnterMatchMsg(){
        echo "<script>alert('Check New Password!');</script>";
        $this->load->view('ClientPasswordIndex');
    }
}
?>