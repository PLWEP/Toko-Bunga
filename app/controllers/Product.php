<?php

    class Product extends Controller {

        public function index() {		
            if (isset($_SESSION['id'])) {
                $data['title'] = 'Product List';
                $data['product'] = $this->model('ModelProduct')->getAll();
                $this->viewFolder('product', 'index', $data);
            } else {
                $this->view('login/index');
            }     
        }

        public function detail($id) {
            $data['title'] = 'Detail Product';
            $data['product'] = $this->model('ModelProduct')->getById($id);
            $this->viewFolder('product', 'detail', $data);
        }
        
        public function edit($id) {
            $data['title'] = 'Edit Product';
            $data['product'] = $this->model('ModelProduct')->getById($id);
            $this->view('product/edit', $data);
        }
        
        public function add(){
            $data['title'] = 'Tambah Product';  
            $this->view('product/tambah');
        }
        
        public function inpProduct(){    
            $hasil=$this->model('ModelProduct')->add($_POST,$_FILES['foto']);		
            header("location:".BASEURL."/product");
        }
        
        public function editProduct(){  
            $this->model('ModelProduct')->edit($_POST,$_FILES['foto']);
            header("location:".BASEURL."/product");
        }
        
        public function deleteProduct($id){       
            $this->model('ModelProduct')->delete($id);	
            header("location:".BASEURL."/product");
        }
    }
?>

