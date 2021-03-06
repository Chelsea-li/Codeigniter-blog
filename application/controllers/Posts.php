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
        $post_id = $data['post']['id'];
        $data['comments'] = $this->comment_model->get_comments($post_id);
        $data['comments_number'] = $this->comment_model->comments_number($post_id)['count(comments.id)'];
        if(empty($data['post'])){
            show_404();
        }

        $data['title'] = $data['post']['title']; 

        $this->load->view('templates/header',$data);
        $this->load->view('posts/show', $data);
        $this->load->view('templates/footer');
    }

    public function create(){
        // Check login
        if(!$this->session->userdata('logged_in')){
            redirect('users/login');
        }
        $data['title'] = "Create Post"; 
        $data['categories'] = $this->category_model->get_categories();
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
            $config['max_width'] = '2400';
            $config['max_height'] = '1300';
            $this->load->library('upload', $config);
            
            if(!$this->upload->do_upload()){
                 $error = array('error' => $this->upload->display_errors());
                 $post_image = "noimage.jpg";
            } else {
               // $data = array('upload_data' => $this->upload->data());
                $post_image = $_FILES['userfile']['name']; // 'name' is image's name, ex dog.jeg
            }
              $this->post_model->create_post($post_image);
              $this->session->set_flashdata('post_created', 'Your post has been created.');
              redirect('posts');
        }
    }

    public function edit($slug){
        //check if logged in
        if(!$this->session->userdata('logged_in')){
            redirect('users/login');
        }
        $data['post'] = $this->post_model->get_posts($slug);
        //check if user's post
        if($this->session->userdata('user_id') != $data['post']['user_id']){
            redirect('posts');
        }
        $data['categories'] = $this->category_model->get_categories();
        if(empty($data['post'])){
            show_404();
        }

        $data['title'] = 'Edit post'; 
  
        $this->load->view('templates/header',$data);
        $this->load->view('posts/edit', $data);
        $this->load->view('templates/footer');
    }

    public function update(){
         //check if logged in
        if(!$this->session->userdata('logged_in')){
            redirect('users/login');
        }
        $this->post_model->update_post();
        $this->session->set_flashdata('post_updated', 'Your post has been updated.');
        redirect('posts');
    }

    public function delete($id){
         //check if logged in
         $user_id = $this->input->post('user_id');
        if(!$this->session->userdata('logged_in')){
            redirect('users/login');
        }
        if($this->session->userdata('user_id') != $user_id){
            redirect('posts');
        }
        $this->post_model->delete_post($id);
        $this->session->set_flashdata('post_deleted', 'Your post has been deleted.');
        redirect('posts');
    }
}
