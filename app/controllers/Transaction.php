<?php 
    class Transaction extends Controller {
        public function index() {		
            if (isset($_SESSION['id'])) {
                if($_SESSION['status'] == 'admin'){
                    $data['order'] = $this->model('ModelOrder')->getAllAdmin();
                } else {
                    $data['order'] = $this->model('ModelOrder')->getAll($_SESSION['id']);
                }
                $data['cart'] = $this->model('ModelCart')->getAll($_SESSION['id']);
                $data['title'] = 'Product List';
                $data['price'] = $this->sumPrice();
                $this->viewFolder('order', 'index', $data);
            } else {
                $this->view('login/index');
            }     
        }

        public function checkOut() {
            $data['title'] = 'Check Out Product';
            $data['cart'] = $this->model('ModelCart')->getAll($_SESSION['id']);
            $data['member'] = $this->model('ModelMember')->getByID($_SESSION['id']);
            $data['price'] = $this->sumPrice();
            $data['stock'] = $this->sumStock();

            if($data['cart']) {
                $this->view('order/checkout', $data);
            } else {
                echo 
                "<script type='text/javascript'>
                if(!alert('Cart Kosong'))
                {
                    document.location = '".BASEURL."/transaction/';
                }
                ;
                </script>";
            }
        }

        public function addCart($id) {
            $data['barangid'] = $id;
            $data['jumlah'] = $_POST['jumlah'];
            $hasil=$this->model('ModelCart')->add($data,$_SESSION['id']);		
            $hasil=$this->model('ModelProduct')->decStock($data);		
            header("location:".BASEURL."/product");
        }

        public function addOrder() {
            $data['kurir'] = $_POST['tkurir'];
            $data['namabarang'] = $this->sumProduct();
            $data['jumlahbrg'] = $this->sumStock();
            $data['totalhrg'] = $this->sumPrice();
            $hasil=$this->model('ModelOrder')->add($data,$_SESSION['id']);
            $hasil=$this->model('ModelCart')->deleteAll();
            header("location:".BASEURL."/transaction");
        }

        public function sumPrice() {
            $data = $this->model('ModelCart')->getAll($_SESSION['id']);
            $sum = 0;
            foreach ($data as $c) { 
                $sum += $c['jumlah'] * $c['harga']; 
            }
            return $sum;
        }

        public function sumStock() {
            $data = $this->model('ModelCart')->getAll($_SESSION['id']);
            $total = 0;
            foreach ($data as $c) { 
                $total += $c['jumlah']; 
            }
            return $total;
        }

        public function sumProduct() {
            $data = $this->model('ModelCart')->getAll($_SESSION['id']);
            $nama = array();
            foreach ($data as $c) { 
                array_push($nama,$c['nama']); 
            }
            return implode(", ",$nama);;
        }
    }
?>