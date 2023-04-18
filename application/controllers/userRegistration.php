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
        if ($this->form_validation->run() == false) {
            // If form validation fails, show the form again with error messages
            $this->session->set_flashdata('error', 'Check your name');
            $this->load->view('userRegistration');
        }
        if (strlen($this->input->post('phoneNumber'))<10) {
            $this->session->set_flashdata('error', 'Check Name');
            $this->load->view('userRegistration');
        }
        else{
            $this->form_validation->set_rules('gender', 'gender', 'required|alpha');
            if ($this->form_validation->run() == false) {
                $this->session->set_flashdata('error', 'Check Gender');
                $this->load->view('userRegistration');
            }
            else{
                $this->form_validation->set_rules('dob', 'dob', 'required');
                if ($this->form_validation->run() == false) {
                    $this->session->set_flashdata('error', 'Check Date of Birth');
                    $this->load->view('userRegistration');
                }
                else{
                    $this->form_validation->set_rules('email', 'email', 'required|valid_email');
                    if ($this->form_validation->run() == false) {
                        $this->session->set_flashdata('error', 'Check E-Mail ID');
                        $this->load->view('userRegistration');
                    }
                    else{
                        $this->form_validation->set_rules('address', 'address', 'required');
                        if ($this->form_validation->run() == false) {
                            $this->session->set_flashdata('error', 'Check Address');
                            $this->load->view('userRegistration');
                        }
                        else{
                            $this->form_validation->set_rules('country', 'country', 'required');
                            if ($this->form_validation->run() == false) {
                                $this->session->set_flashdata('error', 'Check Country');
                                $this->load->view('userRegistration');
                            }
                            else{
                                $this->form_validation->set_rules('sqa', 'sqa', 'required');
                                if ($this->form_validation->run() == false) {
                                    $this->session->set_flashdata('error', 'Check Sequrity Question Answer');
                                    $this->load->view('userRegistration');
                                }
                                else{
                                    $this->form_validation->set_rules('phoneNumber', 'phoneNumber', 'required|regex_match[/^[0-9]{10}$/]');
                                    if ($this->form_validation->run() == false) {
                                        $this->session->set_flashdata('error', 'Check Phone Number');
                                        $this->load->view('userRegistration');
                                    }
                                    else{
                                        $this->form_validation->set_rules('password', 'password', 'required');
                                        $this->form_validation->set_rules('cpassword', 'cpassword', 'required');if ($this->form_validation->run() == false) {
                                            $this->session->set_flashdata('error', 'Check Password');
                                            $this->load->view('userRegistration');
                                        }
                                        else{
                                            $pwd1=$this->input->post('password');
                                            $pw2=$this->input->post('cpassword');
                                            if(strlen($this->input->post('password'))<8||strlen($this->input->post('cpassword'))<8) {
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
                                            $status=$this->userRegistrationModel->saveData($data);
                                            if($status){
                                                echo "<script>alert('Registeration Sucessfull');</script>";
                                                $this->load->view('welcome_message');
                                            }
                                            else{
                                                $this->load->view('userRegistration');
                                            }
                                            }
                                            else{
                                                $this->session->set_flashdata('error', 'Check Field Confirm Password');
                                                $this->load->view('userRegistration');
                                            }
                                        }
                                    }
                                }
                            }

                        }
            
                    }
                }
            }
        }
    }
}
?>