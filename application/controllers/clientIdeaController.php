<?php
class clientIdeaController extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    public function viewDetails($id){
        $data= array(
            'proID'=> $id
        );
        $this->load->view('clientViewIdeaDetails',$data);
    }
    public function viewInvestedDetails($id){
        $_SESSION['ideaID']=$id;
        $this->load->view('clientViewInvestedIdeaDetails');
    }
    public function Invest($id){
        $user_id=$_SESSION['Uid'];
        $idea_id=$id;
        $data= array(
            'idea_id'=>$idea_id,
            'user_id'=>$user_id 
        ); 
        $this->load->model('ClientModel');
        $status=$this->ClientModel->invest($data);
        if($status){
            echo "<script>alert('Invest Interest Added Sucessfully');</script>";
            $this->load->view('clientIdea');
        }
        else{
            echo "<script>alert('Already Interest Registered Idea');</script>";
            $this->load->view('clientIdea');
        }
    }
    public function removeIdea($id){
        $user_id=$_SESSION['Uid'];
        $idea_id=$id;
        $data= array(
            'idea_id'=>$idea_id,
            'user_id'=>$user_id 
        ); 
        $this->load->model('ClientModel');
        $status=$this->ClientModel->removeInvest($data);
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
?>