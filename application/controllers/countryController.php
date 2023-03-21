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
            //cheching the same product type exist in db
            $this->db->select();
            $this->db->from('tbl_country');
            $this->db->where('co_name',$this->input->post('couName'));
            $query = $this->db->get();
            if($query->result()!=null){
            redirect('countryController/UnsucessMsg');
            }
            // If form validation succeeds, save the data to the database
            $data = array(
                'co_name' => $this->input->post('couName'),
                'co_currency' => $this->input->post('couCurrency')
            );
            $this->db->insert('tbl_country', $data);
            redirect('countryController/sucessMsg');
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
        $_SESSION['counID']=$id;
        $this->load->view('editCountryIndex');
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
            //checking if there is a same product type exist in db
            $this->db->select();
            $this->db->from('tbl_country');
            $this->db->where('co_name',$this->input->post('couName'))->where('co_id!=',$coID);
            $query = $this->db->get();
            if($query->result()!=null){
            redirect('countryController/editUnsucessMsg');
            }
            // If form validation succeeds, save the data to the database
            $data = array(
                'co_name' => $this->input->post('couName'),
                'co_currency' => $this->input->post('couCurrency')
            );
            $this->db->where('co_id', $coID);
            $this->db->update('tbl_country', $data);
            redirect('countryController/editSucessMsg');
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
        $tempID=$id;
        //checking if there is any ideas associated to this
        $this->db->select();
        $this->db->from('tbl_idea');
        $this->db->where('co_id=',$tempID);
        $query = $this->db->get();
        if($query->result()!=null){
        redirect('countryController/deleteUnsucessMsg');
        }
        //deleting the country
        $this->db->where('co_id', $tempID);
        $this->db->delete('tbl_country');
        redirect('countryController/deleteSucessMsg');
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