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

	// escaping queries https://codeigniter.com/userguide3/database/queries.html
	
	//Handlin errors	return an array containing its code and message
	//if ( ! $this->db->simple_query('SELECT `example_field` FROM `example_table`'))
	//{
    //    $error = $this->db->error(); // Has keys 'code' and 'message'
	//}
}
?>
