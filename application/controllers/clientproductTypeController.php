<?php
class clientproductTypeController extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->database();
     }
    public function viewIdeas($id){
        $_SESSION['ideaID']=$id;
        $this->load->view('clientviewIdeasAsso');
    }
    public function AboutProduct($id){
        $_SESSION['ideaID']=$id;
        $this->load->view('clientAboutProduct');
    }
    public function viewMore($id){
        $_SESSION['ideaID']=$id;
        $this->load->view('clientViewIdeaDetails');
    }
    public function AddProductType($id){
        $_SESSION['pro_id']=$id;
        $this->load->view('clientAddProductType');
    }
    public function RemoveProductType($id){
        $_SESSION['pro_id']=$id;
        $this->load->view('clientRemoveProductType');
    }
} 
?>