<?php 
    class Category_model extends CI_Model{
        public function __construct() {
            $this->load->database();
        }

        public function get_categories(){
            $this->db->order_by('name');
            $this->db->select('categories.*,count(posts.category_id) as total');
            $this->db->join('posts','categories.id = posts.category_id','left' );
            $this->db->group_by('categories.name');
            $query = $this->db->get('categories');
            return $query -> result_array();
        }

        public function get_category($id){
            $query = $this->db->get_where('categories',array('id'=>$id));
            return $query->row();
        }

        public function get_post_by_category($category_id){
            $query = $this->db->get_where('posts', array('category_id'=>$category_id));
            return $query->result_array();
        }
    }