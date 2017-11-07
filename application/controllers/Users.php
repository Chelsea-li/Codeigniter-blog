<?php 
    class Users extends CI_Controller{
        public function register(){
            $data['title'] = "Sign Up";
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required');
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_rules('password2', 'Confirm password', 'required|matches[password]');
            $this->form_validation->set_error_delimiters('<div class="alert alert-dismissible alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>', '</div>');

            if ($this->form_validation->run() === FALSE) {
                $this->load->view('templates/header',  $data);
                $this->load->view('users/register', $data);
                $this->load->view('templates/footer');
            } else {
                $enc_password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
                $this->user_model->register($enc_password);
                $this->session->set_flashdata('user_registered', 'You are now registered and can log in');
                redirect('posts');
            }
        }
    }