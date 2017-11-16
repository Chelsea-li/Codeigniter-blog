<?php 
    class Comment_model extends CI_Model{
        public function __construct() {
            $this->load->database();
        }

        public function create_comment($post_id){      
            $data = Array(
                'post_id' => $post_id,
                'user_id' => $this->input->post('user_id'),
                'body'=>$this->input->post('body')
            );
            return $this->db->insert('comments',$data);
        }

        public function get_comments($post_id){
            $this->db->select('comments.*, users.username');
            $this->db->join('users', 'comments.user_id = users.id');
            $query = $this->db->get_where('comments', array('post_id'=>$post_id));
            return $query->result_array();
        }

        public function comments_number($post_id){
            $this->db->select('count(comments.id), comments.post_id, comments.user_id, users.username');
            $this->db->join('users', 'comments.user_id = users.id');
            $this->db->group_by('comments.post_id');
            $query = $this->db->get_where('comments', array('post_id'=> $post_id));
            return $query->row_array();
        }
    }