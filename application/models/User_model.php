<?php 
    class User_model extends CI_Model{
        public function __construct() {
            $this->load->database('users');
        }

        public function register($enc_password){
            $data = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'username' => $this->input->post('username'),
                'password' => $enc_password
            );
            return $this->db->insert('users', $data);
        }

        public function login($email, $password){
            $this->db->where('email',$email);
            $result = $this->db->get('users');
            $harshed_password = $result->row(0)->password;
            $user_data=array(
                'user_id' => $result->row(0)->id,
                'username' => $result->row(0)->username,
                'email' => $result->row(0)->email,
                'logged_in' => true
            );
            if(password_verify($password, $harshed_password)){
                return $user_data;
            } else {
                return false;
            }
            
        }

        public function username_exists($str){
            $query = $this->db->get_where('users', array('username' => $str));
            $result = $query->row_array();
            if(!empty($result)){
                return false; // doesn't exist
            } else {
                return true; // exists
            }
        }

            public function email_exists($str){
            $query = $this->db->get_where('users', array('email' => $str));
            $result = $query->row_array();
            if(!empty($result)){
                return false; // doesn't exist
            } else {
                return true; // exists
            }
        }
    }