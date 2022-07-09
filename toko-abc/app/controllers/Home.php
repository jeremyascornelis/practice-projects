<?php

class Home extends Controller {
    public function index() {
        if(isset($_SESSION["iduser"])) {
            $data['judul'] = 'Produk';
            $data['produk'] = $this->model('Produk_model')->getAllProduct();
            $data['user'] = $this->model('Login_model')->getUserById($_SESSION["iduser"]);
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