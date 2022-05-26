<?php 
class Product_model extends CI_Model{

    public function get_all_products() :array {
        $query = $this->db->get('products');
        return $query->result();
    }

    public function insert_product($img_name) :int{     //cara ke 2
        $data = array(  
            'name' =>  $this->input->post('name'),
            'brand' =>  $this->input->post('brand'),
            'qty' =>  $this->input->post('qty'),
            'img' =>  $img_name,
            'created_at' =>  $this->input->post('created_at'), 
		
            //'name' =>  $_POST['name'],
            //'created_at' =>  $_POST['created_at'],
        );
        
        $this->db->insert('products', $data);
        return $this->db->insert_id();
    }

}
?>