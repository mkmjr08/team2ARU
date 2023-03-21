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
        } else {
            //cheching the same product type exist in db
            $this->db->select();
            $this->db->from('tbl_producttype');
            $this->db->where('pro_type',$this->input->post('proType'));
            $query = $this->db->get();
            if($query->result()!=null){
            redirect('productTypeController/UnsucessMsg');
            }
            // If form validation succeeds, save the data to the database
            $data = array(
                'pro_type' => $this->input->post('proType')
            );
            $this->db->insert('tbl_producttype', $data);
            redirect('productTypeController/sucessMsg');
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
        $_SESSION['ideaID']=$id;
        $this->load->view('viewIdeasAsso');
    }
    public function edit($id){
        $_SESSION['proID']=$id;
        $this->load->view('editNewProductIndex');
    }
    public function edit_form_data(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('proType', 'pro_type', 'required');
        if ($this->form_validation->run() == false) {
            // If form validation fails, show the form again with error messages
            
            $this->session->set_flashdata('error', 'Check Field Values');
        $this->load->view('editNewProductIndex');
        } else {
            $proID=$this->input->post('id');
            //checking if there is a same product type exist in db
            $this->db->select();
            $this->db->from('tbl_producttype');
            $this->db->where('pro_id!=',$proID)->where('pro_type',$this->input->post('proType'));
            $query = $this->db->get();
            if($query->result()!=null){
            redirect('productTypeController/editUnsucessMsg');
            }
            // If form validation succeeds, save the data to the database
            $data = array(
                'pro_type' => $this->input->post('proType')
            );
            $this->db->where('pro_id', $proID);
            $this->db->update('tbl_producttype', $data);
            redirect('productTypeController/editSucessMsg');
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
        $tempID=$id;
        //checking if there is any ideas associated to this
        $this->db->select();
        $this->db->from('tbl_idea');
        $this->db->where('pro_id=',$tempID);
        $query = $this->db->get();
        if($query->result()!=null){
        redirect('productTypeController/deleteUnsucessMsg');
        }
        //deleting the pro type
        $this->db->where('pro_id', $tempID);
        $this->db->delete('tbl_producttype');
        redirect('productTypeController/deleteSucessMsg');
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