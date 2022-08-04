<?php 
    class Order extends Controller {
        public function index() {		
            if (isset($_SESSION['id'])) {
                $data['order'] = $this->model('ModelOrder')->getAllOrder($_SESSION['id']);
                if ($data['order']) {
                    for($i=0;$i<sizeof($data['order']);$i++) {
                        $idbefore = null;
                        if($i != 0) {
                            $idbefore = $data['order'][$i-1]['id_pesanan'];
                        }
                        $id = $data['order'][$i]['id_pesanan'];
                        if($idbefore != $id) {
                            $data['detail'][$i] = $this->model('ModelOrder')->getAllDetail($id);
                        }
                    }
                } else {
                    $data['detail'] = [];
                }
                $data['title'] = 'Product List';
                $this->view('pesanan/index', $data);
            } else {
                $this->viewWithoutTemplates('login/index');
            }     
        }

        public function addOrder() {
            $data['cart'] = $this->model('ModelCart')->getAllWithLogin($_SESSION['id']);
            $data['kurir'] = $_POST['tkurir'];
            $data['total'] = $_POST['ttotal'];
            $data['alamat'] = $_POST['talamat'];
            $data['pembayaran'] = $_POST['pembayaran'];
            $this->model('ModelOrder')->add($data,$_SESSION['id']);
            $this->model('ModelCart')->deleteAll();
            header("location:".BASEURL."/order");
        }
    }
?>