<?php
class AdminController extends CI_Controller {
    public function __construct(){
        parent::__construct();
    }
    public function adminIndex(){
        $this->load->view('adminIndex');
    }
    public function logout(){
        echo "<script>alert('Please Login');</script>";
        $this->load->view('welcome_message');
    }
}
?>