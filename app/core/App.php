<?php 
    class App {
        protected $controller = 'Product';
        protected $method = 'index';
        protected $params = [];
        protected $cookie_name = 'keranjang';
        protected $cookie_value;

        public function __construct() {
            $url = $this->parseURL();
            $this->cookie_value = rand();
            if(!isset($_COOKIE[$this->cookie_name])) {
                setcookie($this->cookie_name, $this->cookie_value, time() + (86400 * 30), "/");
            } 

            if(is_null($url)) {
                $url = array("Product");
            }

            if(file_exists('../app/controllers/' . $url[0] . '.php')) {
                $this->controller = $url[0];
                unset($url[0]);
            }

            require_once '../app/controllers/' . $this->controller . '.php';
            $this->controller = new $this->controller;

            if(isset($url[1])) {
                if(method_exists($this->controller, $url[1])) {
                    $this->method = $url[1];
                    unset($url[1]);
                }
            }

            if(!empty($url)) {
                $this->params = array_values($url);
            }

            call_user_func_array([$this->controller, $this->method] , $this->params);
        }

        public function parseURL() {
            if (isset($_GET['url'])) {
                $url = rtrim($_GET['url']);
                $url = filter_var($url, FILTER_SANITIZE_URL);
                $url = explode("/", $url);
                return $url;
            }
        }
    }
?>