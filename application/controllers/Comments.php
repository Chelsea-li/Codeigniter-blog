<?php
    class Comments extends CI_Controller{
        public function create($post_id){
            $slug = $this->input->post('slug');
            $data['post'] = $this->post_model->get_posts($slug);
            $data['comments'] = $this->comment_model->get_comments($post_id);

            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('body', 'Comment body', 'required');
            $this->form_validation->set_error_delimiters('<div class="alert alert-dismissible alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>', '</div>');
            if($this->form_validation->run() == FALSE){
                $this->load->view("templates/header", $data);
                $this->load->view("posts/show", $data);
                $this->load->view("templates/footer"); 
            } else {
                $this->comment_model->create_comment($post_id);
                redirect("/posts/".$slug);
            }
       
        }
    }