<?php
class AdminHomeController extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->database();
     }
    public function home(){
        $this->load->view('adminIndex');
    }
    public function ideas(){
        $this->load->view('ideaIndex');
    }
    public function clients(){
        $this->load->view('adminIndex');
    }
    public function rm(){
        $this->load->view('adminIndex');
    }
    public function notification(){
        $this->load->view('adminIndex');
    }
    public function changepassword(){
        $this->load->view('passwordIndex');
    }
    public function product_type(){
        $this->load->view('productIndex');
    }
    public function logout(){
        $this->session->sess_destroy();
        $this->load->view('welcome_message');
    }
    public function country(){
        $this->load->view('countryIndex');
    }
}
?>