<?php
class userRegistration extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    public function index(){
        $this->load->view('userRegistration');
    }
    public function save_form_data(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('uname', 'uname', 'required');
        $this->form_validation->set_rules('gender', 'gender', 'required');
        $this->form_validation->set_rules('dob', 'dob', 'required');
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('address', 'address', 'required');
        $this->form_validation->set_rules('country', 'country', 'required');
        $this->form_validation->set_rules('sqa', 'sqa', 'required');
        $pwd1=$this->input->post('password');
        $pw2=$this->input->post('cpassword');
        $this->form_validation->set_rules('phoneNumber', 'phoneNumber', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');
        $this->form_validation->set_rules('cpassword', 'cpassword', 'required');
        if ($this->form_validation->run() == false) {
            // If form validation fails, show the form again with error messages
            $this->session->set_flashdata('error', 'Check Field Values');
            $this->load->view('userRegistration');
        }
        if (strlen($this->input->post('phoneNumber'))<10) {
            $this->session->set_flashdata('error', 'Check Phone Number');
            $this->load->view('userRegistration');
        }
        elseif (strlen($this->input->post('password'))<8||strlen($this->input->post('cpassword'))<8) {
            $this->session->set_flashdata('error', 'Minimum Password Length is 8');
            $this->load->view('userRegistration');
        }
        elseif($pwd1==$pw2){
            $hashed_password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
            $data = array(
                'user_name' => $this->input->post('uname'),
                'user_gender' => $this->input->post('gender'),
                'user_dob' => $this->input->post('dob'),
                'user_email' => $this->input->post('email'),
                'user_mobile' => $this->input->post('phoneNumber'),
                'user_address' => $this->input->post('address'),
                'user_country' => $this->input->post('country'),
                'user_password' => $hashed_password,
                'qn_id' => $this->input->post('seq'),
                'user_securityAns' => $this->input->post('sqa')
            );
            $this->load->model('userRegistrationModel');
            $this->userRegistrationModel->saveData($data);
            redirect('userRegistration/sucessMsg');
        }
        else{
            $this->session->set_flashdata('error', 'Check Field Confirm Password');
            $this->load->view('userRegistration');
        }
    }
    public function sucessMsg(){
        echo "<script>alert('Account Request is in review! Please vist after sometime');</script>";
        $this->load->view('welcome_message');
    }
}
?>