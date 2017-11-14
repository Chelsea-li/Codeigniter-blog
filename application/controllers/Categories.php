<?php 
class Categories extends CI_Controller{
    public function index(){
        $data['title'] = "Categories";
        $data['categories'] = $this->category_model->get_categories();
        $this->load->view('templates/header',$data);
        $this->load->view('categories/index',$data);
        $this->load->view('templates/footer');
    }
    
    public function posts($id){
        $data['title'] = $this->category_model->get_category($id)->name;
        $data['posts'] = $this->category_model->get_post_by_category($id);
        $this->load->view('templates/header',$data);
        $this->load->view('categories/posts', $data);
        $this->load->view('templates/footer');
    }
}