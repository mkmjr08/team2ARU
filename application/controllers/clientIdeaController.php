<?php
class clientIdeaController extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    public function viewDetails($id){
        $_SESSION['ideaID']=$id;
        $this->load->view('clientViewIdeaDetails');
    }
    public function viewInvestedDetails($id){
        $_SESSION['ideaID']=$id;
        $this->load->view('clientViewInvestedIdeaDetails');
    }
    public function Invest(){
        $this->load->view('clientInvestIdea');
    }
}
?>