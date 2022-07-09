<?php

class Home extends Controller {
    public function index() {
        if(isset($_SESSION["id"])) {
            $data['judul'] = 'Produk';
            $data['produk'] = $this->model('Produk_model')->getAllProduct();
            $this->view('templates/header', $data);
            $this->view('home/index', $data);
            $this->view('templates/footer');
        } else {
            $data['judul'] = 'Login';
            $this->view('templates/header', $data);
            $this->view('login/index', $data);
            $this->view('templates/footer');
        }
    }
}