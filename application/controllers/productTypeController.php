<?php
class productTypeController extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    public function addNewProductType(){
        $this->load->view('addNewProductIndex');
    }
    public function save_form_data(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('proType', 'pro_type', 'required');
        if ($this->form_validation->run() == false) {
            // If form validation fails, show the form again with error messages
            $this->session->set_flashdata('error', 'Check Field Values');
        $this->load->view('addNewProductIndex');
        } 
        else {
            $data = array(
            'pro_type' => $this->input->post('proType')
             );
             $this->load->model('ProductType_model');
             $status=$this->ProductType_model->save_form_data($data);
             if($status){
                redirect('productTypeController/sucessMsg');
                }
            else{
                redirect('productTypeController/UnsucessMsg');
                }
        }
    }
    public function sucessMsg(){
        echo "<script>alert('Added Successfully');</script>";
        $this->load->view('productIndex');
    }
    public function UnsucessMsg(){
        echo "<script>alert('Insertion Not Successfully! Product Type Already Exist');</script>";
        $this->load->view('productIndex');
    }
    public function viewIdeas($id){
        $data= array(
            'proID' => $id
        );
        $this->load->view('viewIdeasAsso',$data);
    }
    public function edit($id){
        $data= array(
            'temp' => $id
        );
        $this->load->view('editNewProductIndex',$data);
    }
    public function edit_form_data(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('proType', 'pro_type', 'required');
        if ($this->form_validation->run() == false) {
            // If form validation fails, show the form again with error messages
            
            $this->session->set_flashdata('error', 'Check Field Values');
        $this->load->view('editNewProductIndex');
        } else {
            $data = array(
                'pro_id' => $this->input->post('id'),
                'pro_type' => $this->input->post('proType')
            );
            $this->load->model('ProductType_model');
             $status=$this->ProductType_model->edit_form_data($data);
             if($status){
                redirect('productTypeController/editSucessMsg');
                }
            else{
                redirect('productTypeController/editUnsucessMsg');
                }
    }
    }
    public function editSucessMsg(){
        echo "<script>alert('Updated Successfully');</script>";
        $this->load->view('productIndex');
    }
    public function editUnsucessMsg(){
        echo "<script>alert('Updated Not Successfully! Product Type Already Exist');</script>";
        $this->load->view('productIndex');
    }
    public function delete($id){
        $this->load->model('ProductType_model');
        $status=$this->ProductType_model->delete($id);
        if($status){
           redirect('productTypeController/deleteSucessMsg');
           }
       else{
           redirect('productTypeController/deleteUnsucessMsg');
           }
    }
    public function deleteSucessMsg(){
        echo "<script>alert('deleted Successfully');</script>";
        $this->load->view('productIndex');
    }
    public function deleteUnsucessMsg(){
        echo "<script>alert('Delete Not Successfully! Idea Exist with this product type');</script>";
        $this->load->view('productIndex');
    }
}
?>