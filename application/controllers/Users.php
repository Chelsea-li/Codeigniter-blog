<?php 
    class Users extends CI_Controller{
        public function register(){
            $data['title'] = "Sign Up";
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|callback_email_check');
            $this->form_validation->set_rules('username', 'Username', 'required|callback_username_check');
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
                redirect('users/login');
            }
        }

        public function login(){
            $data['title'] = "Log in";
            $this->form_validation->set_rules('email', 'Email', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_error_delimiters('<div class="alert alert-dismissible alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>', '</div>');

            if ($this->form_validation->run() === FALSE) {
                $this->load->view('templates/header',  $data);
                $this->load->view('users/login', $data);
                $this->load->view('templates/footer');
            } else {
                $email = $this->input->post('email');
                $password = $this->input->post('password');
                $result = $this->user_model->login($email,$password);
                if($result){
                    //create session
                 
                    $this->session->set_userdata($result);
                    //set session flash message
                     $this->session->set_flashdata('login_succeed', 'You are now logged in as');
                     redirect('posts');
                } else {
                     $this->session->set_flashdata('login_failure', 'Invalid email or password');
                     redirect('users/login');
                }
               
            }
        }

        public function logout(){
            //unset user data
            $this->session->unset_userdata('username');
            $this->session->unset_userdata('email');
            $this->session->unset_userdata('user_id');
            $this->session->unset_userdata('logged_in');
            //set message
            $this->session->set_flashdata('log_out', 'You are logged out');
            redirect('users/login');
        }

        public function username_check($str){
             $this->form_validation->set_message("username_check", 'Sorry, the username has been taken, please pick a different one.');
            $result = $this->user_model->username_exists($str);
            if($result){
                return true; // pass the test
            } else {
               return false; // does not pass test
            }
        }

         public function email_check($str){
             $this->form_validation->set_message("email_check", 'Sorry, the email has registered with us, please choose a different one.');
            $result = $this->user_model->email_exists($str);
            if($result){
                return true; // pass the test
            } else {
               return false; // does not pass test
            }
        }
    }