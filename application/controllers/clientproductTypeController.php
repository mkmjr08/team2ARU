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
        $user_id=$_SESSION['Uid'];
        $data= array('pro_id'=>$id,
                    'user_id'=>$user_id );
        $this->load->model('ClientModel');
        $status=$this->ClientModel->addProductType($data);
        if($status){
            echo "<script>alert('Preference Added Sucessfully');</script>";
            $this->load->view('clientProduct');
        }
        else{
            echo "<script>alert('Already Registered Preference');</script>";
            $this->load->view('clientProduct');
        }
    }
    public function RemoveProductType($id){
        $user_id=$_SESSION['Uid'];
        $data= array(
            'pro_id'=>$id,
            'user_id'=>$user_id 
        );
        $this->load->model('ClientModel');
        $status=$this->ClientModel->removeProductType($data);
        if($status){
            echo "<script>alert('Preference Removed Sucessfully');</script>";
            $this->load->view('clientChosenProductType');
        }
        else{
            echo "<script>alert('Already Removed Preference');</script>";
            $this->load->view('clientChosenProductType');
        }
    }
} 
?>