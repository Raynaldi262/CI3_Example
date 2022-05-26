<?php 
class Product extends CI_Controller{

    public function __construct()
    {
        parent::__construct();

        $config['upload_path']          = './uploads/products';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 1024;  //kb
        $config['max_width']            = 1024; 
        $config['max_height']           = 768;
        $config['file_ext_tolower']     = TRUE;

        $this->load->library('upload', $config);
        $this->load->model('product_model');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
    }

    public function index(){
        $data['products'] = $this->product_model->get_all_products();
        $data['title'] = 'Product';
        
        $this->load->view('product/index',$data);
    }

    public function add_product()  :void {

        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('qty', 'Qty', 'trim|required|numeric|greater_than[0]');
        $this->form_validation->set_rules('brand', 'Brand', 'trim|required|min_length[3]');
        if (empty($_FILES['img']['name']))
        {
            $this->form_validation->set_rules('img', 'Image', 'required');
        }
    

        if($this->form_validation->run() == FALSE){ //kalau gagal
            log_message('error', 'Product not created error when validate.');
            $data['products'] = $this->product_model->get_all_products();
            $data['title'] = 'Product';
                
            $this->load->view('product/index',$data);
        }
        else{
            if (!$this->upload->do_upload('img'))
            {
                $error = $this->upload->display_errors('<p>', '</p>');
                
                log_message('error', 'Product not created error when upload. '. $error);
                
                // var_dump($error);
                
                $data['products'] = $this->product_model->get_all_products();
                $data['title'] = 'Product';
                
                $this->load->view('product/index',$data);
            }
            else
            {
                $img = $this->upload->data();
                $img_name = $img['file_name'];

                $this->product_model->insert_product($img_name);

                log_message('info', 'Product successful created');
                redirect(base_url('/product'),'refresh' );
            }
        }

        

    }
}
?>