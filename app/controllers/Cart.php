<?php 
    class Cart extends Controller {
        public function index() {		
            $data['title'] = 'Product List';
            if (isset($_SESSION['id'])) {
                $data['cart'] = $this->model('ModelCart')->getAllWithLogin($_SESSION['id']);
            } else {
                $data['cart'] = $this->model('ModelCart')->getAllWithoutLogin();
            }
            $data['price'] = $this->sumPrice($data['cart']);
            $this->view('keranjang/index', $data);  
        }

        public function checkOut() {
            if (isset($_SESSION['id'])) {
                $data['title'] = 'Check Out Product';
                $data['cart'] = $this->model('ModelCart')->getAllWithLogin($_SESSION['id']);
                $data['member'] = $this->model('ModelLogin')->getByID($_SESSION['id']);
                $data['price'] = $this->sumPrice($data['cart']);

                if($data['cart']) {
                    $this->view('keranjang/checkout', $data);
                } else {
                    echo 
                    "<script type='text/javascript'>
                    if(!alert('Cart Kosong'))
                    {
                        document.location = '".BASEURL."/cart/';
                    }
                    ;
                    </script>";
                }
            } else {
                $this->viewWithoutTemplates('login/index');
            }
        }

        public function addCart($id) {
            $data['barangid'] = $id;
            $data['jumlah'] = $_POST['jumlah'];
            if (isset($_SESSION['id'])) {
                $this->model('ModelCart')->addWithLogin($data,$_SESSION['id']);		
            } else {
                $this->model('ModelCart')->addWithoutLogin($data);	
            }
            $this->model('ModelProduct')->decStock($data);		
            header("location:".BASEURL."/product");
        }

        public function sumPrice($data) {
            $sum = 0;
            foreach ($data as $c) { 
                $sum += $c['jumlah'] * $c['harga']; 
            }
            return $sum;
        }

        public function deleteItem($id){      
            $data = $this->model('ModelCart')->getByIdCart($id);
            $this->model('ModelProduct')->upStock($data);
            $this->model('ModelCart')->deleteItem($id);	
            header("location:".BASEURL."/cart");
        }
    }
?>