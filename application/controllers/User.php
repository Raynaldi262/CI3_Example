<?php 
class User extends CI_Controller{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
    }

    public function index()
    {
        $data['users'] = $this->user_model->get_all_user();
        $data['title'] = 'User';
        
        $this->load->view('user/index',$data);
    }

    public function detail($id){

        echo $id;
    }

    // cara per1 langsung insert dari controller

    // public function create(){
    //     $this->form_validation->set_rules('name', 'name', 'required');
    //     $this->form_validation->set_rules('created_at', 'created_at', 'required');

    //     if ($this->form_validation->run() === TRUE)
    //     { 
    //         $data = array(
    //             'name' =>  $this->input->post('name'),
    //             'created_at' =>  $this->input->post('created_at'), 
    //         );
        
    //         $this->db->insert('users', $data);

    //         $id = $this->db->insert_id();

    //         if($id){
    //             redirect(base_url(),'refresh' );
    //         }else{
    //             show_error("Error when insert user", 301);
    //         }
    //     }else{
    //         $data['users'] = $this->user_model->get_all_user();
    //         $data['title'] = 'User';
    //         $this->load->view('user/index',$data);
    //     }
    // }

    //cara ke 2 insert dari model

    public function create(){
        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('created_at', 'created_at', 'required');

        if ($this->form_validation->run() === TRUE)
        { 
            // $data = array(   cara per1
            //     'name' =>  $this->input->post('name'),
            //     'created_at' =>  $this->input->post('created_at'), 
            // );
        
            // $id = $this->user_model->insert_user($data);

            $id = $this->user_model->insert_user();

            if($id){
				log_message('info', 'User successful created');
                redirect(base_url(),'refresh' );
            }else{
				log_message('error', 'User not created.');
				show_error('Error when insert user', 301, $heading = 'An Error Was Encountered')

                //show_error("Error when insert user", 301);
            }
        }else{
            $data['users'] = $this->user_model->get_all_user();
            $data['title'] = 'User';
            $this->load->view('user/index',$data);
        }
    }
}
?>
