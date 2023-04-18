<?php
class countryController extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    public function addNewCountry(){
        $this->load->view('addNewCountryIndex');
    }
    public function save_form_data(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('couName', 'country', 'required');
        $this->form_validation->set_rules('couCurrency', 'currency', 'required|max_length[5]');
        if ($this->form_validation->run() == false) {
            // If form validation fails, show the form again with error messages
            $this->session->set_flashdata('error', 'Check Field Values');
            $this->load->view('addNewCountryIndex');
        } else {
            $cName=$this->input->post('couName');
            $cCurrency=$this->input->post('couCurrency');
            $this->load->model('Country_model');
            $status=$this->Country_model->saveData($cName, $cCurrency);
            if($status){
                redirect('countryController/sucessMsg');
            }
            else{
                redirect('countryController/UnsucessMsg');
            }
    }
    }
    public function sucessMsg(){
        echo "<script>alert('Added Successfully');</script>";
        $this->load->view('countryIndex');
    }
    public function UnsucessMsg(){
        echo "<script>alert('country already exist!');</script>";
        $this->load->view('countryIndex');
    }



    //editing 
    public function edit($id){
        $data= array(
            'id' =>$id
        );
        $this->load->view('editCountryIndex',$data);
    }
    public function edit_form_data(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('couName', 'country', 'required');
        $this->form_validation->set_rules('couCurrency', 'currency', 'required|max_length[5]');
        if ($this->form_validation->run() == false) {
            // If form validation fails, show the form again with error messages
            $this->session->set_flashdata('error', 'Check Field Values');
            $this->load->view('editCountryIndex');
        } else {
            $coID=$this->input->post('id');
            $cName=$this->input->post('couName');
            $cCurrency=$this->input->post('couCurrency');
            $this->load->model('Country_model');
            $status=$this->Country_model->editData($coID,$cName, $cCurrency);
           if($status){
            redirect('countryController/editSucessMsg');
            }
        else{
            redirect('countryController/editUnsucessMsg');
            }
    }
    }
    public function editSucessMsg(){
        echo "<script>alert('Updated Successfully');</script>";
        $this->load->view('countryIndex');
    }
    public function editUnsucessMsg(){
        echo "<script>alert('Updated Not Successfully! Country Name Already Exist');</script>";
        $this->load->view('countryIndex');
    }
    

    //deleting
    public function delete($id){
        $this->load->model('Country_model');
        $status=$this->Country_model->deleteData($id);
        if($status){
            redirect('countryController/deleteSucessMsg');
            }
        else{
            redirect('countryController/deleteUnsucessMsg');
            }
    }
    public function deleteSucessMsg(){
        echo "<script>alert('deleted Successfully');</script>";
        $this->load->view('countryIndex');
    }
    public function deleteUnsucessMsg(){
        echo "<script>alert('Delete Not Successfully! Idea Exist with this Country');</script>";
        $this->load->view('countryIndex');
    }
}
?>