<?php

    class Product extends Controller {

        public function index() {		
            $data['title'] = 'Product List';
            $data['product'] = $this->model('ModelProduct')->getAll();
            $this->view('product/index',$data);  
        }

        public function detail($id) {
            $data['title'] = 'Detail Product';
            $data['product'] = $this->model('ModelProduct')->getById($id);
            $this->view('product/detail',$data);
        }
    }
?>

