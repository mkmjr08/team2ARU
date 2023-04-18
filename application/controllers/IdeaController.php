<?php
class IdeaController extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    public function viewMore($id){
        $data= array(
            'proID' =>$id
        );
        $this->load->view('viewIdeaDetails',$data);
    }
    public function edit($id){
        $_SESSION['ideaID']=$id;
        $this->load->view('editIdeaIndex');
    }
    //Adding
    public function addIdea(){
        $this->load->view('addIdeaIndex');
    }
    public function save_form_data(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('idea', 'idea', 'required');
        $this->form_validation->set_rules('abstract', 'abstract', 'required|min_length[5]');
        $this->form_validation->set_rules('expdate', 'expdate', 'required');
        $this->form_validation->set_rules('owner', 'owner', 'required|alpha_numeric');
        $this->form_validation->set_rules('desc', 'desc', 'required|min_length[5]');
        if ($this->form_validation->run() == false) {
            // If form validation fails, show the form again with error messages
            $this->session->set_flashdata('error', 'Check Field Values');
            $this->load->view('addIdeaIndex');
        } 
        if($this->input->post('expdate')<=date('Y-m-d')){
            $this->session->set_flashdata('error', 'Check Expire Date');
            $this->load->view('addIdeaIndex');
        }else {
            // If form validation succeeds, save the data to the database
            $today=date('y/m/d');
            $data = array(
                'idea_title' => $this->input->post('idea'),
                'pro_id' => $this->input->post('proType'),
                'idea_short_desc' => $this->input->post('abstract'),
                'idea_pub_date' => $today,
                'idea_exp_date' => $this->input->post('expdate'),
                'idea_owner' => $this->input->post('owner'),
                'idea_desc' => $this->input->post('desc'),
                'idea_risk' => $this->input->post('risk'),
                'co_id' => $this->input->post('country')
            );
            $this->load->model('idea_model');
            $status=$this->idea_model->save($data);
            if($status){
                redirect('ideaController/sucessMsg');
                }
            else{
                redirect('ideaController/UnsucessMsg');
                }
    }
    }
    public function sucessMsg(){
        echo "<script>alert('Added Successfully');</script>";
        $this->load->view('ideaIndex');
    }
    public function UnsucessMsg(){
        echo "<script>alert('Idea already exist!');</script>";
        $this->load->view('ideaIndex');
    }
    //editing
    public function edit_form_data(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('idea', 'idea', 'required');
        $this->form_validation->set_rules('abstract', 'abstract', 'required|min_length[5]');
        $this->form_validation->set_rules('expdate', 'expdate', 'required');
        $this->form_validation->set_rules('owner', 'owner', 'required|alpha_numeric');
        $this->form_validation->set_rules('desc', 'desc', 'required|min_length[5]');
        if ($this->form_validation->run() == false) {
            // If form validation fails, show the form again with error messages
            $this->session->set_flashdata('error', 'Check Field Values');
            $this->load->view('editIdeaIndex');
        } 
        if($this->input->post('expdate')<=date('Y-m-d')){
            $this->session->set_flashdata('error', 'Check Expire Date');
            $this->load->view('editIdeaIndex');
        }else {
            $ideaID=$_SESSION['ideaID'];
            //checking if there is a same product type exist in db
            $this->db->select();
            $this->db->from('tbl_idea');
            $this->db->where('idea_id!=',$ideaID)->where('idea_title',$this->input->post('idea'))->where('idea_owner',$this->input->post('owner'))->where('idea_exp_date',$this->input->post('expdate'));
            $query = $this->db->get();
            if($query->result()!=null){
            redirect('ideaController/editUnsucessMsg');
            }
            // If form validation succeeds, save the data to the database
            $this->db->select();
            $this->db->from('tbl_idea');
            $this->db->where('idea_id',$ideaID);
            $row=$this->db->get()->row();
            $today=$row->idea_pub_date;
            echo $today;
            $data = array(
                'idea_title' => $this->input->post('idea'),
                'pro_id' => $this->input->post('proType'),
                'idea_short_desc' => $this->input->post('abstract'),
                'idea_pub_date' => $today,
                'idea_exp_date' => $this->input->post('expdate'),
                'idea_owner' => $this->input->post('owner'),
                'idea_desc' => $this->input->post('desc'),
                'idea_risk' => $this->input->post('risk'),
                'co_id' => $this->input->post('country')
            );
            $this->load->model('idea_model');
            $status=$this->idea_model->edit($data,$ideaID);
            if($status){
                redirect('ideaController/editSucessMsg');
                }
            else{
                redirect('ideaController/editUnsucessMsg');
                }
    }
    }
    public function editSucessMsg(){
        echo "<script>alert('Updated Successfully');</script>";
        $this->load->view('ideaIndex');
    }
    public function editUnsucessMsg(){
        echo "<script>alert('Updated Not Successfully! Idea Already Exist');</script>";
        $this->load->view('ideaIndex');
    }
}
?>