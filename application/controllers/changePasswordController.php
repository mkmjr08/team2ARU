<?php
class changePasswordController extends CI_Controller {
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
            //checking if there is a same product type exist in db
            $this->db->select();
            $this->db->from('tbl_admincredentionals');
            $query = $this->db->get();
            foreach($query->result() as $row){
                $dbPWD=$row->admin_Password;
                $dbUser=$row->admin_UserName;
            }
            $cPwd=$this->input->post('currentPassword');
            $newPwd=$this->input->post('newPassword');
            $reNewPwd=$this->input->post('reNewPassword');
            if(!password_verify($cPwd,$dbPWD)){
                redirect('changePasswordController/missMatchMsg');
            }
            elseif($reNewPwd!=$newPwd){
                redirect('changePasswordController/reEnterMatchMsg');
            }
            else{
            $hashPWD=password_hash($reNewPwd,PASSWORD_DEFAULT);
            $data = array(
                'admin_Password' => $hashPWD
            );
            $this->db->where('admin_UserName', $dbUser);
            $this->db->update('tbl_admincredentionals', $data);
            echo $row->admin_UserName;
            redirect('changePasswordController/SucessMsg');
            }
        }
    }
    public function SucessMsg(){
        echo "<script>alert('Password Updated Successfully');</script>";
        $this->load->view('adminIndex');
    }
    public function missMatchMsg(){
        echo "<script>alert('Check Current Password!');</script>";
        $this->load->view('passwordIndex');
    }
    public function reEnterMatchMsg(){
        echo "<script>alert('Check New Password!');</script>";
        $this->load->view('passwordIndex');
    }
}
?>