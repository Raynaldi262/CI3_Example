<?php 
class User_model extends CI_Model{
    
    public function get_all_user(){
        $query = $this->db->get('users');
        return $query->result();
    }

    //cara per1
    // public function insert_user($data) :int {
    //     $this->db->insert('users', $data);
    //     return $this->db->insert_id();
    // }

    public function insert_user() :int{     //cara ke 2
        $data = array(  
            // 'name' =>  $this->input->post('name'),
            // 'created_at' =>  $this->input->post('created_at'), 
            'name' =>  $_POST['name'],
            'created_at' =>  $_POST['created_at'],
        );
        
        $this->db->insert('users', $data);
        return $this->db->insert_id();
    }

}
?>