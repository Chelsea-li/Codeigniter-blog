<?php
    class Post_model extends CI_Model{
        public function __construct(){
            $this->load->database();
        }

        public function get_posts($slug = FALSE){
            if($slug === FALSE){
                $this->db->order_by('posts.id','DESC');
                $this->db->join('categories', 'categories.id = posts.category_id');
                $query = $this->db->get('posts');
                return $query -> result_array();
            }
            $query = $this->db->get_where('posts', array('slug'=> $slug));
            return $query -> row_array();
        }

        public function create_post($post_image){
            $slug = url_title($this->input->post('title'));
            $data = array(
                'title'=>$this->input->post('title'),
                'body'=>$this->input->post('body'),
                'slug'=>$slug,
                'post_image'=>$post_image,
                'category_id'=>$this->input->post('category_id')
            );
            return $this->db->insert('posts',$data);
        }

        public function update_post(){
            $slug = url_title($this->input->post('title'));
            $data = array(
                'title'=>$this->input->post('title'),
                'body'=>$this->input->post('body'),
                'slug'=>$slug,
                'category_id'=>$this->input->post('category_id')
            );
            $id = $this->input->post('id');
            return $this->db->update('posts',$data,array('id'=> $id));
        }

        public function delete_post($id){
            return $this->db->delete('posts', array('id'=> $id));
        }

        public function get_categories(){
           //$this->db->order_by('name');
            $query = $this->db->get('categories');
            return $query -> result_array();
        }

    }