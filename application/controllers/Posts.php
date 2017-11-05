<?php
class Posts extends CI_Controller{
    public function index() {
        $data['title'] = "Latest posts";
        $data['posts'] = $this->post_model->get_posts();
        $this->load->view('templates/header', $data);
        $this->load->view('posts/index', $data);
        $this->load->view('templates/footer');    
    }

    public function view($slug = null){
        $data['post'] = $this->post_model->get_posts($slug);

        if(empty($data['post'])){
            show_404();
        }

        $data['title'] = $data['post']['title']; 

        $this->load->view('templates/header',$data);
        $this->load->view('posts/show', $data);
        $this->load->view('templates/footer');
    }

    public function create(){
        $data['title'] = "Create Post"; 
        $data['categories'] = $this->post_model->get_categories();
        $this->form_validation->set_rules('title', 'post title', 'required');
        $this->form_validation->set_rules('body', 'post body', 'required');
        if($this->form_validation->run() === FALSE){
            $this->load->view('templates/header',$data);
            $this->load->view('posts/create', $data);
            $this->load->view('templates/footer');
        } else {
            $config['upload_path'] ='./assets/images/posts';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '2048'; //2048KB = 2MB
            $config['max_width'] = '1024';
            $config['max_height'] = '768';
            $this->load->library('upload', $config);
            
            if(!$this->upload->do_upload()){
                 $error = array('error' => $this->upload->display_errors());
                 $post_image = "noimage.jpg";
            } else {
               // $data = array('upload_data' => $this->upload->data());
                $post_image = $_FILES['userfile']['name']; // 'name' is image's name, ex dog.jeg
            }
              $this->post_model->create_post($post_image);
                redirect('posts');
        }
    }

    public function edit($slug){
        $data['post'] = $this->post_model->get_posts($slug);
        $data['categories'] = $this->post_model->get_categories();
        if(empty($data['post'])){
            show_404();
        }

        $data['title'] = 'Edit post'; 
  
        $this->load->view('templates/header',$data);
        $this->load->view('posts/edit', $data);
        $this->load->view('templates/footer');
    }

    public function update(){
        $this->post_model->update_post();
        redirect('posts');
    }

    public function delete($id){
        $this->post_model->delete_post($id);
        redirect('posts');
    }
}