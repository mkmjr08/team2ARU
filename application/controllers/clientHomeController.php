<?php
class ClientHomeController extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->database();
     }
    public function home(){
        $this->load->view('clientHomePage');
    }
    public function profile(){
        $this->load->view('#');
    }
    public function Product_type(){
        $this->load->view('clientProduct');
    }
    public function chosen_product_type(){
        $this->load->view('clientChosenProductType');
    }
    public function idea(){
        $this->load->view('clientIdea');
    }
    public function invested_idea(){
        $this->load->view('clientInvestedIdea');
    }
    public function changepassword(){
        $this->load->view('clientPasswordIndex');
    }
    public function logout(){
        $this->session->sess_destroy();
        $this->load->view('welcome_message');
    }
    public function logout2(){
        echo "<script>alert('Please Login');</script>";
        $this->load->view('welcome_message');
    }
}